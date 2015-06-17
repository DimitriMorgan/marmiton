<?php


include_once(__DIR__ . '/app/config/routes.php');
include_once(__DIR__ . '/vendor/Components/routing.php');

use Vendor\Components\Routing;


try {
    $rooting = new Routing($routes);
} catch (Exception $e) {
    var_dump($e->getMessage());
}
