<?php

chdir('/home/n0x/git-repos/assignment1-comp3512-bushell/');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Zach Bushell">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Assignment 1 for Mount Royal University. Actual F1 statistics may not be up to date. Use at own risk.">
    <title>Zach's F1 Addiction</title>

    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
     
    <?php 
        try {
            
            require './php/header.inc.php';

        }catch (Exception $e){

        }
    ?>

    <main>
        <aside class="about">
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit neque ad unde dolorem ea aliquid dignissimos culpa, adipisci deserunt rem ratione itaque incidunt quis alias ipsum voluptatibus ipsa, sint voluptates.
            </p>
            <button>Browse 2022 season</button>
        </aside>
        <article class="results">
            <img src="images/Max_Verstappen_Leeuwenkop_logo_unleash_the_lion.png" alt="Well this is embarrasing isn't it. This was supposed to be an image of Max Verstappen's helmet design">            
        </article>

    </main>
    
    <?php 
        try {
            
            require './php/footer.inc.php';

        }catch (Exception $e){

        }
    ?>

</body>
</html>