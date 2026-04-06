<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the Closures that will be called
| when running the `tinker` command. You are free to add commands here to
| your heart's content! This is a great place to interact with your code
| in real time as you're building and debugging your application.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quotes()->random());
})->purpose('Display an inspiring quote');
