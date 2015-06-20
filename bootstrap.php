<?php


include_once(__DIR__ . '/app/config/routes.php');
include_once(__DIR__ . '/vendor/Components/routing.php');

use Vendor\Components\Router;

try {
    $rooting = new Router($routes);
} catch (Exception $e) {
    var_dump($e->getMessage());
}
