<?php

require 'setup.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password']);
$databaseManager->connect();

$cardRepository = new CardRepository($databaseManager);
$cards = $cardRepository->get();

if(!empty($_POST["submit"]) && !empty($_POST["name"]) && !empty($_POST["origin"])){
    $cardRepository->create();
    $cards=$cardRepository->get();
}

require 'overview.php';
