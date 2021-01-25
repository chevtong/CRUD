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

echo "<b>POST</b> <br>";
var_dump($_POST);
echo " <br>";
echo "<b>SESSION</b> <br>";
var_dump($_SESSION);
echo " <br>";


//TODO: need too move the pwd n username in config
$database= new DatabaseManager($config["host"],$config["user"], $config["password"]);
echo "<b>DATABASE</b> <br>";
var_dump($database);
echo " <br>";


$card = new CardRepository($config["host"],$config["user"], $config["password"]);
echo "<b>CARD</b> <br>";
var_dump($card);
echo "<br>";
$card->get();



if(!empty($_POST["submit"]) && !empty($_POST["name"]) && !empty($_POST["origin"])){
    $card->create();
}

if(!empty($_POST["delete"])){
    $card->delete();
}

if(!empty($_POST["edit"])){
    $card->update();
}

if(!empty($_POST["update"])){
   $card->update2();
 }



// Load your view
// Tip: you can load this dynamically and based on a variable, if you want to load another view
require 'overview.php';
