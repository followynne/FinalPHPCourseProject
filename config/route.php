<?php
use SimpleMVC\Controller;

return [
    'GET /' => Controller\Home::class, // "SimpleMVC\Controller\Home"
    'GET /login' => Controller\Index::class, // "SimpleMVC\Controller\Index"
    'GET /register' => Controller\Register::class,
    'GET /article' => Controller\Article::class,
    'POST /login' => Controller\Login::class,
];
