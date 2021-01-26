<?php

require 'setup.php';



$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password']);
$databaseManager->connect();

// This example is about a Pokémon card collection
// Update the naming if you'd like to work with another collection
$cardRepository = new CardRepository($databaseManager);
$cards = $cardRepository->get();

if(!empty($_POST["submit"]) && !empty($_POST["name"]) && !empty($_POST["origin"])){
    $cardRepository->create();
    $cards=$cardRepository->get();
}



// Load your view
// Tip: you can load this dynamically and based on a variable, if you want to load another view
require 'overview.php';
