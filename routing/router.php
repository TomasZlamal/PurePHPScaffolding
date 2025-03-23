<?php

require "../utils/Route.php";

Route::setErrorDirectory("../views/error/");
Route::setRenderDirectory("../controllers/");
Route::GET("/")->render("home.php");
Route::POST("/home")->render("home.php");

$uri = parse_url($_SERVER["REQUEST_URI"]);
Route::routeURL($uri);
