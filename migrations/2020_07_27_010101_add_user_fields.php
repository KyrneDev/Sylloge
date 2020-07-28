<?php

use Flarum\Database\Migration;

return Migration::addColumns('users', [
    'digest_enabled' => ['integer'],
]);
