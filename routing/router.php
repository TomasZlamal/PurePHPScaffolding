<?php

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

function routing_failed($code = 404)
{
    http_response_code($code);

    //require "views/{$code}.php";

    die();
}

function solveRoute($uri, $routes, $conn)
{

    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        routing_failed();
    }
}

$routes = [
    "/" => "../controllers/home.php",
];

solveRoute($uri, $routes, $conn);
