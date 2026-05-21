<?php
require __DIR__ . '/vendor/autoload.php';

if (class_exists('NumberFormatter')) {
    echo "NumberFormatter exists!\n";
    $formatter = new NumberFormatter('en_US', NumberFormatter::DECIMAL);
    echo "Formatted: " . $formatter->format(12345.67) . "\n";
} else {
    echo "NumberFormatter DOES NOT EXIST.\n";
}
