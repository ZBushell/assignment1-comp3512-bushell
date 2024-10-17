<?php

chdir('/home/n0x/git-repos/assignment1-comp3512-bushell/');

require_once "./includes/config.inc.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Zach Bushell">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/Max_Verstappen_Leeuwenkop_logo_unleash_the_lion.png" type="image/x-icon">
    <meta name="description" content="Assignment 1 for Mount Royal University. Actual F1 statistics may not be up to date. Use at own risk.">
    <title>Zach's F1 Addiction</title>
    
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
     
    <?php 
        try {
            
            require './includes/header.inc.php';

        }catch (Exception $e){
            throw $e;
            //lazy, yes i know
        }
    ?>

    <main>
        <aside class="about">
            <h3>About</h3>
            <p>
            This page is a php excersize for a web development course I'm taking at Mount Royal University in the Fall Semester of 2024. Specifically,  COMP3512 Assignment 1. It pulls the results of the 2022 f1 season from an sqlite3 database and displays the results in various different ways. It offers a Restful API which can be found in the API section of the website. It exports in json format.
            </p>
            <p>Github Repo can be found <a href"https://github.com/ZBushell/assignment1-comp3512-bushell">here</a></p>
            <h3>Disclaimer</h3>
            <p>This website may or may not be programmed to only return Max Verstappen in his rightful position, first. Any #TeamLewis fans still crying over 2021 can kindly leave. So keep raging that Mercedes can't compete, internalize the fact that you belong below Williams, and realize Adrian Newey and his cars are the greatest thing since sliced bread.</p>
            <div class="nav-buttons"><a href="./browse.php">Browse 2022 Season</a></div>
        </aside>
        <article class="results">
            <img src="./images/verstappen.png" alt="Well this is embarrasing isn't it. This was supposed to be an image of Max Verstappen's helmet design">            
        </article>

    </main>
    
    <?php 
        try {
            
            require './includes/footer.inc.php';

        }catch (Exception $e){
            throw $e;
        }
    ?>

</body>
</html>
