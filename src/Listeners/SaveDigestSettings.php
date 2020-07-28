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

namespace Kyrne\Sylloge\Listeners;

use Flarum\User\Event\Saving;

class SaveDigestSettings
{
    /**
     * @param Saving $event
     */
    public function handle(Saving $event)
    {
        $data = array_get($event->data, 'attributes.digestEnabled');
        if (!$event->user->exists) {
            if ($data) {
                $event->user->digest_enabled = 2;
            }
        } else {
            if (isset($data)) {
                $event->user->digest_enabled = $data;
            }
        }
    }
}
