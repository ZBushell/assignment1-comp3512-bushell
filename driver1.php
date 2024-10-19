<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once './includes/config.inc.php';
require './includes/queries.inc.php';

$db = new F1Database("./data/f1.db");


    $details = $db->preparedQuery($dvrDetails, 4);
    $recentRaces = $db->preparedQuery($dvrRaces, 4);
   
    
    //get driver's age
    $today = new DateTime('today');
    $dvrDob = new DateTime($details[0]['dob']);
    $dvrAge= $today->diff($dvrDob);

    print("<h1>".$dvrAge."</h1>");


?>