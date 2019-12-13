<?php
use SimpleMVC\Controller;

return [
    'GET /' => Controller\Home::class,
    'GET /article' => Controller\Article::class,
    'GET /register' => Controller\Register::class,
    'GET /login' => Controller\Login::class,
    'GET /logout' => Controller\Login::class,
    'POST /register' => Controller\Register::class, 
    'POST /login' => Controller\Login::class,
    'GET /userarticles' => Controller\UserArticles::class,
    'GET /addarticle' => Controller\AddArticle::class,
    'GET /modify' => Controller\Modify::class,
    'POST /modify' => Controller\Modify::class,
];