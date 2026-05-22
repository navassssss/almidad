<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$compiler = app('blade.compiler');
$path1 = resource_path('views/vendor/filament/components/pagination/index.blade.php');
$path2 = resource_path('views/vendor/filament-tables/components/selection/indicator.blade.php');

echo "Pagination: " . basename($compiler->getCompiledPath($path1)) . "\n";
echo "Indicator: " . basename($compiler->getCompiledPath($path2)) . "\n";
