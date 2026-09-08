<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::create('/cart', 'GET');
$response = $kernel->handle($request);
echo 'STATUS=' . $response->getStatusCode() . PHP_EOL;
$kernel->terminate($request, $response);
