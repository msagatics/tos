<?php

declare(strict_types=1);

$services = [
    'categories/category_functions.php',
    'products/product_functions.php'
];

foreach ($services as $service) {
    require_once MODULES_PATH . '/' . $service;
}
