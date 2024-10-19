<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once './includes/config.inc.php';
require './includes/queries.inc.php';

$db = new F1Database("./data/f1.db");

$details = [];
$recentRaces = [];

if (isset($_GET['constructorId']) && $_GET['constructorId'] != null) {
    $args = [$_GET['constructorId']];
    $details = $db->preparedQuery($ctrDetails, $args);
    $recentRaces = $db->preparedQuery($ctrRaces, $args);
}

print_r($details);
print_r($recentRaces);

?>