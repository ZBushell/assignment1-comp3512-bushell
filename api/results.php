<?php
    //been having issues with pathing on my php install. this is here to fix that.
    //sql queries and dababase object
    require_once "../includes/config.inc.php";
    require "../includes/queries.inc.php";


    //make sure php knows what its outputting
    header("Content-Type: application/json; charset=UTF-8");

    //variables 
    $db = new F1Database("../data/f1.db");
    $queryResults = [];
    $args = [];
    
    // check if we're returning everything or just one circuit
    if(isset($_GET['ref']) && $_GET['ref'] != null){
        
        $args = [$_GET['ref']];
        $queryResults = $db->preparedQuery($resultsForSpecificRace, $args);
    }
    else if(isset($_GET['driver']) && $_GET['driver'] != null) {
        
        $args = [$_GET['driver']];
        $queryResults = $db->preparedQuery($resultsForGivenDriver, $args);
    } 
    else 
    {
        $queryResults = null;
    }

    //close db session
    $db->dropConnection();
    
    //encode and print
    echo json_encode($queryResults);
?>