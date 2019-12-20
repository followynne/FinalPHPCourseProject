<?php
chdir(dirname(__DIR__));
require 'vendor/autoload.php';
use DI\ContainerBuilder;

$builder = new ContainerBuilder();
$builder->addDefinitions('config/container.php');
$container = $builder->build();

try {
    $pdo = $container->get(PDO::class);
    modifyArticle(4, $pdo);
    modifyArticle(8, $pdo);
    modifyArticle(11, $pdo);
} catch (PDOException $ex) {
    echo 'Error operating with Database. Please check your info.';
}

function modifyArticle(int $val, $pdo)
{
    $today = new DateTime('now');
    $format = $today->format('Y-m-d');
    try {
        $query = 'update articles set art_date = :art_date where id = :id;';
        $q = $pdo->prepare($query);
        $q->bindValue(':id', $val);
        $q->bindValue(':art_date', $format);
        $q->execute();
    } catch (PDOException $ex) {
        throw new PDOException;
    }
}
