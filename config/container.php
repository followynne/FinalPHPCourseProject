<?php

use League\Plates\Engine;
use Psr\Container\ContainerInterface;

return [
    'view_path' => 'src/View',
    Engine::class => function(ContainerInterface $c) {
        return new Engine($c->get('view_path'));
    },
    'dsn' => 'mysql:dbname=FinalCourse;host=127.0.0.1',
    'user' => 'marco',
    'password' => 'its2019',
    'PDO' => function(ContainerInterface $c) {
        return new \PDO($c->get('dsn'), $c->get('user'), $c->get('password'));
    }
];
