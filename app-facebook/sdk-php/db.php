<?php

$host = "192.168.0.110";
$user = "sdd";
$pass = "881ezo";

try {
    $pdo = new PDO("mysql:host=$host;dbname=social_app", $user, $pass);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    exit;
}

$pdo->exec("set names utf8");