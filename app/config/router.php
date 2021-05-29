<?php

$router = $di->getRouter();

$router->add("/api/get", "API::get", ["GET"]);
$router->add("/api/post", "API::post", ["POST"]);
$router->add("/api/put", "API::put", ["PUT"]);
// $router->add("/api/delete", "API::delete", ["DEL"]);

$router->handle($_SERVER['REQUEST_URI']);