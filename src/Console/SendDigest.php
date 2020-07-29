<?php
/**
 *
 *  This file is part of kyrne/sylloge
 *
 *  Copyright (c) 2020 Kyrne.
 *
 *  For the full copyright and license information, please view the license.md
 *  file that was distributed with this source code.
 *
 */

namespace Kyrne\Sylloge\Console;

use Carbon\Carbon;
use Flarum\Discussion\Discussion;
use Flarum\Extension\ExtensionManager;
use Flarum\Http\UrlGenerator;
use Flarum\Post\Post;
use Flarum\Settings\SettingsRepositoryInterface;
use Flarum\User\User;
use Illuminate\Console\Command;
use Illuminate\Contracts\View\Factory;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Translation\TranslatorInterface;
use Throwable;

class SendDigest extends Command
{
    /**
     * @var SettingsRepositoryInterface
     */
    private $settings;

    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * @var UrlGenerator
     */
    private $url;

    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * @var Factory
     */
    private $views;

    /**
     * @var ExtensionManager
     */
    private $extensions;

    public function __construct(
        SettingsRepositoryInterface $settings,
        TranslatorInterface $translator,
        UrlGenerator $url,
        Mailer $mailer,
        Factory $views,
        ExtensionManager $extensions
    ) {
        parent::__construct();

        $this->settings = $settings;
        $this->translator = $translator;
        $this->url = $url;
        $this->mailer = $mailer;
        $this->views = $views;
        $this->extensions = $extensions;
    }

    protected function configure()
    {
        $this
            ->setName('sylloge:send')
            ->setDescription('After a configurable number of days, notifies OP of discussions with no post selected as best answer to select one.')
            ->addOption(
                'interval',
                null,
                InputOption::VALUE_REQUIRED,
                'The digest to send'
            );
    }

    public function handle()
    {
        $intervalName = $this->input->getOption('interval');

        if (! $intervalName) {
            $this->error('No interval specified. Please check command syntax.');
            return;
        }

        if ($intervalName === 'weekly') {
            $time = Carbon::now()->subDays(800);
        } else {
            $time = Carbon::now()->subDays(1);
        }

        $this->info('Looking at discussions after ' . $time->toDateTimeString());

        $query = Discussion::query();

        $query->whereNull('discussions.hidden_at')
            ->where('discussions.comment_count', '>', 1)
            ->where('discussions.is_private', 0)
            ->whereDate('discussions.created_at', '>', $time);

        $count = $query->count();

        if ($count == 0) {
            $this->info('Nothing to do');

            return;
        }

        if ($this->extensions->isEnabled('reflar-gamification')) {
            $query->orderBy('discussions.votes');
        } else {
            $query->orderBy('discussions.comment_count');
        }

        $this->info('Preparing digest data');

        $content = [];

        foreach ($query->take(5)->get() as $discussion) {
            $user = User::find($discussion->user_id);
            $post = Post::find($discussion->first_post_id);
            array_push($content, [
                'title' => $discussion->title,
                'author' => $user->username,
                'avatar' => $user->avatar_url,
                'content' => substr($post->content, 0, 175) . (strlen($post->content) > 175 ? '...' : ''),
                'url' => $this->url->to('forum')->route('discussion',
                    ['id' => $discussion->id . '-' . trim($discussion->slug)])
            ]);
        }

        $errors = [];

        $users = User::query();

        if ($intervalName === 'weekly') {
            $users->where('digest_enabled', 2)
                ->where('is_email_confirmed', 1);
        } else {
            // Users who have daily enabled will never get the weekly
            // digest, but will get a digest on the same day the weekly's do
            $users->where('digest_enabled', 1)
                ->where('is_email_confirmed', 1);
        }

        if ($users->count() == 0) {
            $this->info('No users to send the ' .$intervalName . ' digest to. Cancelling...');
            return;
        }

        $this->views->addNamespace('sylloge', realpath(__DIR__ . '/../../resources/views/email'));

        $settings = app(SettingsRepositoryInterface::class);

        $title = $settings->get('forum_title');

        $logoPath = $settings->get('logo_path');

        $view = $this->views->make('sylloge::digest', [
            'content' => $content,
            'primaryColor' => $settings->get('theme_primary_color'),
            'secondaryColor' => $settings->get('theme_secondary_color'),
            'baseUrl' => app()->url(),
            'forumTitle' => $title,
            'forumLogo' => $logoPath ? $this->url->to('forum')->path('assets/'.$logoPath) : null,
            'adminMessage' => $settings->get('kyrne-sylloge.admin_message'),
            'unsubscribeURL' => $this->url->to('forum')->route('sylloge.digest.unsubscribe'),
            'date' => Carbon::now()
        ]);

        $users->chunk(20, function ($users) use (&$errors, $view, $title, $intervalName) {
            /*
             * @var $discussions Discussion[]
             */
            $this->output->write('<info>Sending ' . count($users) . ' notifications </info>');

            foreach ($users as $u) {
                try {
                    $this->mailer->html($view,
                        function (Message $message) use ($u, $title, $intervalName) {
                            $message->to($u->email)->subject($this->translator->trans('kyrne-sylloge.forum.email.subject_'.$intervalName, ['{forum}' => $title]));
                        });

                    $this->output->write('<info>#</info>');

                } catch (Throwable $e) {
                    $this->output->write('<error>#</error>');
                    $errors[] = $e;
                }
            }

            $this->line('');
        });

        $settings->set('kyrne-sylloge.admin_message', '');

        if (count($errors) > 0) {
            $this->line("\n");
            $this->alert('Failed to send ' . count($errors) . ' notifications');
            $this->warn('');

            foreach ($errors as $i => $e) {
                $n = $i + 1;

                $this->output->writeln("<warning>$n >>>>>></warning> <error>$e</error>");
                $this->line('');
            }
        }
    }
}
