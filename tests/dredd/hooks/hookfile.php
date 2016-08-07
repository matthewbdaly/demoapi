<?php

use Dredd\Hooks;
use Illuminate\Support\Facades\Artisan;
use YFD\User;

require __DIR__ . '/../../../vendor/autoload.php';

$app = require __DIR__ . '/../../../bootstrap/app.php';

$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

Hooks::beforeAll(function (&$transaction) use ($app) {
    putenv('DB_CONNECTION=sqlite');
    putenv('DB_DATABASE=:memory:');
	Artisan::call('migrate:refresh');
	Artisan::call('db:seed');
});
Hooks::beforeEach(function (&$transaction) use ($app) {
	Artisan::call('migrate:refresh');
	Artisan::call('db:seed');
    $user = User::first();
    $token = JWTAuth::fromUser($user);
    $transaction->request->headers->Authorization = 'Bearer ' . $token;
});
