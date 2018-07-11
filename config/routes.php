<?php

use Cake\Routing\RouteBuilder;
use Vamshop\Core\Router;

Router::plugin('Surveys', ['path' => '/'], function (RouteBuilder $route) {
    $route->prefix('admin', function(RouteBuilder $route) {
        $route->scope('/surveys', [], function(RouteBuilder $route) {
            $route->fallbacks('DashedRoute');
        });
    });

    $route->scope('/surveys', [], function(RouteBuilder $route) {
        $route->fallbacks('DashedRoute');
    });
});
