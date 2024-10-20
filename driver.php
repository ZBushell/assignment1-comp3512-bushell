<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once './includes/config.inc.php';
require './includes/queries.inc.php';

$db = new F1Database("./data/f1.db");


if (isset($_GET['driverId']) && $_GET['driverId'] != null) {
    // Pull driver stuff
    $args = [$_GET['driverId']];
    $details = $db->preparedQuery($dvrDetails, $args);
    $recentRaces = $db->preparedQuery($dvrRaces, $args);

    // Get driver's age
    $today = new DateTime('today');

    if (isset($details[0])) {
        $dvrDob = new DateTime($details[0]['dob']);
        $dvrAge = $today->diff($dvrDob);
    } else {
        $dvrAge = "Details Not Found";
    }
} else {
    $details    = "Details Not Found";
    $recentRaces    = "Details Not Found";
}
$db->dropConnection();

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
    <article class="overlay">
    <div class="article-content">
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
    </div>
    </article>
</main>
</body>
<?php   try{require_once "./includes/footer.inc.php";}
        catch(Exception $e){print("Footer not Found");} ?>
</html>