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
    },

    // I suggest to use two differt user for the DB connection: ONE only to read and ONE to modify

    'dsn_readOnly' => 'mysql:dbname=FinalCourse;host=127.0.0.1',
    'user_readOnly' => 'readOnly',
    'password_readOnly' => 'its2019',
    'PDO_readOnly' => function(ContainerInterface $c) {
        return new \PDO($c->get('dsn_readOnly'), $c->get('user_readOnly'), $c->get('password_readOnly'));
    }
];
