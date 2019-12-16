<?php

use SimpleMVC\Controller;

return [
    'GET /' => Controller\Home::class,
    'GET /article' => Controller\Article::class,
    'GET /login' => Controller\Login::class,
    'GET /logout' => Controller\Login::class,
    'POST /login' => Controller\Login::class,
    'GET /register' => Controller\Register::class,
    'POST /register' => Controller\Register::class,
    'GET /addarticle' => Controller\AddArticle::class,
    'POST /addarticle' => Controller\AddArticle::class,
    'GET /userarticles' => Controller\UserArticles::class,
    'GET /modify' => Controller\Modify::class,
    'POST /modify' => Controller\Modify::class,
    'GET /delete' => Controller\Delete::class,
    'POST /delete' => Controller\Delete::class,

];
