<?php

chdir('/home/n0x/git-repos/assignment1-comp3512-bushell/');
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
<body>
    <?php 
            try {

                require './includes/header.inc.php';

            }catch (Exception $e){

            }
        ?>
    <main>
        <aside class="about">
            <h2>2022 Races</h2>

        </aside>
        <article class="results">
           <a href="./api/circuits.php" class="api-link">placeholder</a>
           <a href="./api/circuits.php?ref=?" class="api-link">placeholder</a>
           <a href="./api/constructors.php" class="api-link">placeholder</a>
           <a href="./api/constructors.php?ref=?" class="api-link">placeholder</a>
           <a href="./api/drivers.php" class="api-link">placeholder</a>
           <a href="./api/drivers.php?ref=?" class="api-link">placeholder</a>
           <a href="./api/drivers.php?race=?" class="api-link">placeholder</a>
           <a href="./api/races.php" class="api-link">placeholder</a>
           <a href="./api/races.php?ref=?" class="api-link">placeholder</a>
           <a href="./api/qualifying.php?ref=?" class="api-link">placeholder</a>
           <a href="./api/results.php?ref=?" class="api-link">placeholder</a>
           <a href="./api/results.php?driver=?" class="api-link">placeholder</a> 
        
        </article>
    </main>
    <?php 
            try {

                require './includes/footer.inc.php';

            }catch (Exception $e){

            }
        ?>
    
</body>
</html>