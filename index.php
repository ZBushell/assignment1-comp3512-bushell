<?php

chdir('/home/n0x/git-repos/assignment1-comp3512-bushell/');

require_once "./php/includes/config.inc.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Zach Bushell">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Assignment 1 for Mount Royal University. Actual F1 statistics may not be up to date. Use at own risk.">
    <title>Zach's F1 Addiction</title>

    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
     
    <?php 
        try {
            
            require './php/includes/header.inc.php';

        }catch (Exception $e){

        }
    ?>

    <main>
        <aside class="about">
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit neque ad unde dolorem ea aliquid dignissimos culpa, adipisci deserunt rem ratione itaque incidunt quis alias ipsum voluptatibus ipsa, sint voluptates.
            </p>
            <div class="nav-buttons"><a href="./php/pages/browse.php">Browse 2022 Season</a></div>
        </aside>
        <article class="results">
            <img src="./images/verstappen.png" alt="Well this is embarrasing isn't it. This was supposed to be an image of Max Verstappen's helmet design">            
        </article>

    </main>
    
    <?php 
        try {
            
            require './php/includes/footer.inc.php';

        }catch (Exception $e){

        }
    ?>

</body>
</html>