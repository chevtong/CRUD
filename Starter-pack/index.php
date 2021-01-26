<?php

// Require the correct variable type to be used (no auto-converting)
declare(strict_types = 1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

// Load you classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/CardRepository.php';

echo "<b>POST</b><br>";
echo "<pre>";
var_dump($_POST);
echo "</pre>";
echo "<b>GET</b><br>";
echo "<pre>";
var_dump($_GET);
echo "</pre>";

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

if(!empty($_GET["delete"])){
    $cardRepository->delete();

    echo $id;
    //$cards=$cardRepository->get();
}

// if(!empty($_POST["edit"])){
     
//     $cardRepository->prepareUpdate();
   
  
// }

// if(!empty($_POST["update"])){
  
//     $cardRepository->update();
// }


// Load your view
// Tip: you can load this dynamically and based on a variable, if you want to load another view
require 'overview.php';
