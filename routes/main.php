<?php

#Use the router module
use Cube\Router\Router;

#Create instance of router
$router = new Router();

#Add routes
$router->any('/', 'CubeController.home');