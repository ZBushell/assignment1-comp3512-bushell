<?php

chdir('/home/n0x/git-repos/assignment1-comp3512-bushell/');
require_once './includes/config.inc.php';
require './includes/queries.inc.php';

$db = new F1Database("./data/f1.db");


if (isset($_GET['$driverId']) && $_GET['driverId'] != null){
    
    $args = $_GET['constructorId'];
    $details = $db->preparedQuery($ctrDetails, $args);
    $recentRaces = $db->preparedQuery($ctrRaces, $args);
    
}
else {

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/Max_Verstappen_Leeuwenkop_logo_unleash_the_lion.png" type="image/x-icon">

    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/index.css">
    <title><?php print($details['Name']); ?></title>
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
        <ul class="driver-info">
            <li class="driver"><?php print ($details['name']); ?></li>
            <li class="driver"><?php print ($details['nationality']); ?></li>
            <li class="driver"><?php print ($details['url']); ?></li>2
        </ul>
    </aside>
    <article class="results">
    <table class="table">
    <thead>
        <tr>
            <th>Round</th>
            <th>Circuit</th>
            <th>Driver</th>
            <th>Position</th>
            <th>Points</th>
        </tr>
    </thead>
    <tbody>
        <?php
       
        foreach ($recentRaces as $race) {
            print( '<tr>');
            print( '<td>' . $race['name'] . '</td>');
            print( '<td>' . $race['Driver'] . '</td>');
            print( '<td>' . $race['position'] . '</td>');
            print( '<td>' . $race['points'] . '</td>');
            print( '</tr>');
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