<?php

require_once './includes/config.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/Max_Verstappen_Leeuwenkop_logo_unleash_the_lion.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>APIs</title>
</head>
<?php   try{require_once "./includes/header.inc.php";}
        catch(Exception $e){print("Header not Found");} 
?>
<body>
    
    <main>
        <aside class="about">
            <h2>2022 Races</h2>
            <p> Note that the apis require manual inputting of the query string value. If you just click on them, your browser will not render the content. This is meant to export json data, not display a page.</p>
        </aside>
        <article class="results">
           <a href="./api/circuits.php" class="api-link">All Circuits</a>
           <a href="./api/circuits.php?ref=spa" class="api-link">Specific Circuit</a>
           <a href="./api/constructors.php" class="api-link">All Constructors</a>
           <a href="./api/constructors.php?ref=red_bull" class="api-link">Specific Constructor</a>
           <a href="./api/drivers.php" class="api-link">All Drivers</a>
           <a href="./api/drivers.php?ref=verstappen" class="api-link">Specific Driver</a>
           <a href="./api/drivers.php?race=1106" class="api-link">Driver Specific Race</a>
           <a href="./api/races.php" class="api-link">All Races</a>
           <a href="./api/races.php?ref=?" class="api-link">Specific Race</a>
           <a href="./api/qualifying.php?ref=?" class="api-link">Qualifying for Specific Race</a>
           <a href="./api/results.php?ref=?" class="api-link">All Results</a>
           <a href="./api/results.php?driver=?" class="api-link">Sepcific Results</a> 
        </article>
    </main>
    
    
</body>
<?php   try{require_once "./includes/footer.inc.php";}
        catch(Exception $e){print("Footer not Found");} 
?>
</html>