<?php
//Here are all the requirements for all the html pages, index/delete/edit.php
//When gathering everything together, it is easier to require just 1 file instead of 20 lines in each files. 


// Require the correct variable type to be used (no auto-converting)
declare(strict_types = 1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/CardRepository.php';

// To help to build functions
// echo "<b>POST</b><br>";
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
// echo "<b>GET</b><br>";
// echo "<pre>";
// var_dump($_GET);
// echo "</pre>";