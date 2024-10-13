<?php

chdir('/home/n0x/git-repos/assignment1-comp3512-bushell/php/');
require_once '../php/includes/config.inc.php';
try{

// Set up Database pdo connection string.
$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
$pdo->setAttrbute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (Exception $e){
    throw $e;
}
finally{
    $pdo=null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/Max_Verstappen_Leeuwenkop_logo_unleash_the_lion.png">

    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>Browse</title>
</head>
<body>
        <?php 
            try {

                require '../php/includes/header.inc.php';

            }catch (Exception $e){

            }
        ?>
        <main>
        <aside class="about">
            <h2>2022 Races</h2>

        </aside>
        <article class="results">
            
        
        </article>
        </main>
        <?php 
            try {

                require '../php/includes/footer.inc.php';

            }catch (Exception $e){

            }
        ?>    
</body>
</html>