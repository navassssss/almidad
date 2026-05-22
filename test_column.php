<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$columns = \Illuminate\Support\Facades\DB::select("SHOW COLUMNS FROM articles WHERE Field = 'topic'");
print_r($columns);
