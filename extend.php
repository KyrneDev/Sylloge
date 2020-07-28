<?php

namespace Kyrne\Sylloge;

use Flarum\Api\Event\Serializing;
use Flarum\Extend;
use Flarum\Foundation\Application;
use Flarum\User\Event\Saving;
use Kyrne\Sylloge\Api\Controllers;
use Kyrne\Sylloge\Console\SendDigest;
use Kyrne\Sylloge\Listeners\InjectSettings;
use Kyrne\Sylloge\Listeners\SaveDigestSettings;
use Kyrne\Sylloge\Provider\ConsoleProvider;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__ . '/js/dist/forum.js')
        ->css(__DIR__ . '/resources/less/forum.less'),
    new Extend\Locales(__DIR__ . '/resources/locale'),
    (new Extend\Console())
        ->command(SendDigest::class),
    (new Extend\Routes('api'))
        ->post('/sylloge', 'sylloge.digest.subscribe', Controllers\SendInvitesController::class),
    (new Extend\Routes('forum'))
        ->get('/sylloge', 'sylloge.digest.unsubscribe', Controllers\CreateDoorkeyController::class),
    (new Extend\Event())
        ->listen(Serializing::class, InjectSettings::class)
        ->listen(Saving::class, SaveDigestSettings::class),
    function (Application $application) {
        $application->register(ConsoleProvider::class);
    },
];
