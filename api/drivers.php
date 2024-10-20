<?php
    //been having issues with pathing on my php install. this is here to fix that.
    //chdir('/home/n0x/git-repos/assignment1-comp3512-bushell/');
    //sql queries and dababase object
    require_once "../includes/config.inc.php";
    require "../includes/queries.inc.php";


    //make sure php knows what its outputting
    header("Content-Type: application/json; charset=UTF-8");

    //variables 
    $db = new F1Database("../data/f1.db");
    $queryResults = [];
    
    // check if we're returning everything or just one circuit
    if(isset($_GET['ref']) && $_GET['ref'] != null){

        $args = [$_GET['ref']];
        $queryResults = $db->preparedQuery($specificDriverIn2022, $args);
    }
    else if(isset($_GET['race']) && $_GET['race'] != null) {
        
        $args = [$_GET['race']];
        $queryResults = $db->preparedQuery($driversInSpecificRace , $args);
        
    }
    else {
        $queryResults = $db->pdoQuery($driversIn2022);
    } 

    //close db session
    $db->dropConnection();
    
    //encode and print
    echo json_encode($queryResults);
?>