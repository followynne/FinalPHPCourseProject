<?php
use SimpleMVC\Controller;

return [
    'GET /' => Controller\Home::class, // "SimpleMVC\Controller\Home"
    'GET /login' => Controller\Index::class, // "SimpleMVC\Controller\Index"
    'GET /register' => Controller\Register::class,
    'POST /register' => Controller\Register::class, // add post metod to register page
    'GET /article' => Controller\Article::class,
    'POST /login' => Controller\Login::class,
];
