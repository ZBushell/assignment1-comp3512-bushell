<?php

require_once './includes/config.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/Max_Verstappen_Leeuwenkop_logo_unleash_the_lion.png" type="image/x-icon">
    <!-- 
[1] Logospot, "Het verhaal achter de logos van Max Verstappen," Logospot.nl, 2023. [Online]. Available: https://www.logospot.nl/het-verhaal-achter-de-logos-van-max-verstappen/. [Accessed: 19-Oct-2024].
-->

    
    <link rel="stylesheet" href="./css/normalize.css">
    <!-- 
[1] N. Miller, "normalize.css v8.0.1," GitHub, 2020. [Online]. Available: https://github.com/necolas/normalize.css. [Accessed: Oct. 19, 2024].
-->

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
        <article class="overlay">
        <div class="article-content">
        <ul class="API_LIST">
           <li><a href="./api/circuits.php" class="api-link">api/circuits.php</a><span>          All 2022 Circuits</span></li>
           <li><a href="./api/circuits.php?ref=spa" class="api-link">api/circuits.php?ref=spa</a><span>          Spa Circuit</span></li>
           <li><a href="./api/constructors.php" class="api-link">api/constructors.php</a><span>          All 2022 Constructors</span></li>
           <li><a href="./api/constructors.php?ref=red_bull" class="api-link">api/constructors.php?ref=red_bull</a><span>          Red Bull</span></li>
           <li><a href="./api/drivers.php" class="api-link">api/drivers.php</a><span>          All 2022 Drivers</span></li>
           <li><a href="./api/drivers.php?ref=verstappen" class="api-link">api/drivers.php?ref=verstappen</a><span>          SUPER MAX</span></li>
           <li><a href="./api/drivers.php?race=1106" class="api-link">api/drivers.php?race=1106</a><span>          Race Details of the Canadian GP</span></li>
           <li><a href="./api/races.php" class="api-link">api/races.php</a><span>All 2022 Races</span></li>
           <li><a href="./api/races.php?ref=1106" class="api-link">          Specific Race</a><span></span></li>
           <li><a href="./api/qualifying.php?ref=1106" class="api-link">          Qualifying for Specific Race</a><span></span></li>
           <li><a href="./api/results.php?ref=1106" class="api-link">api/results.php?ref=1106</a><span>          Results for Canadian GP</span></li>
           <li><a href="./api/results.php?driver=verstappen" class="api-link">          Max Verstappen's Results</a><span></span></li>
        </ul> 
        </div>
        </article>
    </main>
    
    
</body>
<?php   try{require_once "./includes/footer.inc.php";}
        catch(Exception $e){print("Footer not Found");} 
?>
</html>