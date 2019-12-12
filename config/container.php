<?php

use League\Plates\Engine;
use Psr\Container\ContainerInterface;
use Dotenv\Dotenv;
use SimpleMVC\Model\ReadOnlyOpt;

return [
    'view_path' => 'src/View',
    Engine::class => function(ContainerInterface $c) {
        return new Engine($c->get('view_path'));
    },
    'Dotenv' => function(ContainerInterface $c){
        try {
          return $dotenv = DotEnv::createImmutable(__DIR__);
        } catch (InvalidArgumentException $ex){
          print("Error retrieving personal information.");
          die(print_r($ex));
        }
      },
    'PDO' => function(ContainerInterface $c) {
        $c->get('Dotenv')->load();
        try {
            $db = $_ENV['db'];
            $host = $_ENV['host'];
            $user = $_ENV['user'];
            $pw = $_ENV['password'];
            return new PDO("mysql:dbname=$db;host=$host", $user, $pw);
          } catch (Exception $ex){
            print("Error connecting to Database ciao.");
            die(print_r($ex));
          }
    },
    ReadOnlyOpt::class => DI\autowire()
        ->constructorParameter('pdo', DI\get('PDO_readOnly')),
    'PDO_readOnly' => function(ContainerInterface $c) {
        $c->get('Dotenv')->load();
        try {
            $db = $_ENV['db_readOnly'];
            $host = $_ENV['host_readOnly'];
            $user = $_ENV['user_readOnly'];
            $pw = $_ENV['password_readOnly'];
            return new \PDO("mysql:dbname=$db;host=$host", $user, $pw);
          } catch (Exception $ex){
            print("Error connecting to Database.");
            die(print_r($ex));
          }
    }
];
