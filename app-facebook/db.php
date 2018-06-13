<?php

$host = "192.168.0.110";
$user = "user";
$pass = "9kw5Y9wS";

try {
    $pdo = new PDO("mysql:host=$host;dbname=social_app", $user, $pass);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    exit;
}

$pdo->exec("set names utf8");