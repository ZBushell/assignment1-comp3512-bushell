<?php
// Fixing path issues with PHP
require_once "../includes/config.inc.php";
require "../includes/queries.inc.php";

error_reporting(E_ALL); // Report all PHP errors
ini_set('display_errors', 1);

// Make sure PHP knows what it's outputting
header("Content-Type: application/json; charset=UTF-8");

// Variables
$db = new F1Database("../data/f1.db");
$queryResults = [];


// don't need an if statement for this one
if(isset($_GET['ref']) && $_GET['ref'] != null){
    $args = [$_GET['ref']];
    $queryResults = $db->preparedQuery($apiQualifying, $args);
}

// Close db session
$db->dropConnection();

// Encode and print JSON directly
echo json_encode($queryResults, JSON_PRETTY_PRINT);
?>
