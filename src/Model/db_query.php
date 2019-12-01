<?php

declare(strict_types=1);

namespace SimpleMVC\Model;

$sql = [
      'article' => "SELECT * FROM articles WHERE art_date like '$today'",
      'article_of_writer' => "SELECT * FROM articles WHERE iduser = '$user' ORDER BY art_date",
      'user_mail' => "SELECT id FROM users WHERE name = '$mail'", // find if user is register
      'user_pwd' => "SELECT pwd FROM users WHERE id = '$id'", // find user pwd

      // in ONE query: 'user_check' => "SELECT pwd FROM user WHERE name = '$mail'"
];

// $sth = $pdo->prepare(??);
