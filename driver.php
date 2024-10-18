<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
chdir("/home/n0x/git-repos/assignment1-comp3512-bushell/");
require_once './includes/config.inc.php';
require './includes/queries.inc.php';

$db = new F1Database("./data/f1.db");


if (isset($_GET['$driverId']) && $_GET['driverId'] != null){
    
    //pull driver stuff
    $args = [$_GET['driverId']];
    $details = $db->preparedQuery($dvrDetails, $args);
    $recentRaces = $db->preparedQuery($dvrRaces, $args);
   
    
    //get driver's age
    $today = new DateTime('today');
    $dvrDob = new DateTime($details[0]['dob']);
    $dvrAge= $today->diff($dvrDob);

 
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
    <link rel="stylesheet" href="./css/browse.css">
    <title><?php print($details[0]['forename'] .' '. $details[0]['surname']); ?></title>
</head>
<?php 
            try {require_once './includes/header.inc.php';}
            catch (Exception $e){print("Header not Found");}
?>
<body>

<main>
    <aside class="about">
        <ul class="driver-info">
            <?php
                foreach ($details as $x => $d){
                    print("<li>Name: <span>".$d['forename']." ".$d['surname'] ."</span></li>");
                    print("<li>DoB: <span>".$d['dob']."</span><span>(".$dvrAge->y.")</span></li>");
                    print("<li>Nationality: <span>".$d['nationality']."</span></li>");
                    print('<li>Wikipedia: <a href="'.$d['url'].'">'. '<span>'.$d['forename']." ".$d['surname'] .'</a></span></li>');
                }

            ?>
        </ul>
    </aside>
    <article class="results">
    <table class="table">
    <thead>
        <tr>
            <th>Round</th>
            <th>Circuit</th>
            <th>Position</th>
            <th>Points</th>
        </tr>
    </thead>
    <tbody>
        <?php
       
         foreach ($recentRaces as $race) {
            print( '<tr>');
            print('<td>' . $race['round'] . '</td>');
            print( '<td>' . $race['Name'] . '</td>');
            print( '<td>' . $race['position'] . '</td>');
            print( '<td>' . $race['points'] . '</td>');
            print( '</tr>');
        }
        ?>
    </thbody>
    </table>
    </article>
</main>
</body>
<?php   try{require_once "./includes/footer.inc.php";}
        catch(Exception $e){print("Footer not Found");} ?>
</html>