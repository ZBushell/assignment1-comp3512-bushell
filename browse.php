<?php

chdir('/home/n0x/git-repos/assignment1-comp3512-bushell/');
require_once './includes/config.inc.php';
require './includes/functions.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/Max_Verstappen_Leeuwenkop_logo_unleash_the_lion.png" type="image/x-icon">

    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>Browse</title>
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
            <?php
                
            ?>
        </aside>
        <article class="results">
            <?php
                if(isset($_GET['race']) && $_GET['race'] != null){
                    
                }
                else
                {
                    print("<h2>Please select a race</h2>");
                }
            ?>
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