<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once './includes/config.inc.php';
require './includes/queries.inc.php';

$db = new F1Database("./data/f1.db");

$details = [];
$recentRaces = [];

if (isset($_GET['constructorId']) && $_GET['constructorId'] != null) {
    $args = [$_GET['constructorId']];
    $details = $db->preparedQuery($ctrDetails, $args);
    $recentRaces = $db->preparedQuery($ctrRaces, $args);
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
    <title><?php print_r($details['name']); ?></title>
</head>

<?php   try{require_once "./includes/header.inc.php";}
        catch(Exception $e){print("Header not Found");} 
?>
<body>
<main>
    <aside class="about">
        <ul class="driver-info">
            <?php
                foreach($details as $deets){
                    print('<li class="driver">Name: '.$deets['name'].'</li>');
                    print('<li class="driver">Nationaliy: '.$deets['country'].'</li>');
                    print('<li class="driver">URL: <a href="'.$deets['url'].'">'.$deets['name'].'</a></li>');
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
            <th>Driver</th>
            <th>Position</th>
            <th>Points</th>
        </tr>
    </thead>
    <tbody>
        <?php
       
        foreach ($recentRaces as $race) {
            print( '<tr>');
            print('<td>'.$race['round'].'</td>');
            print('<td>' . $race['name'] . '</td>');
            print('<td>' . $race['Driver'] . '</td>');
            print('<td>' . $race['position'] . '</td>');
            print('<td>' . $race['points'] . '</td>');
            print( '</tr>');
        }
        ?>
    </tbody>
    </table>
    </article>
</main>
</body>
<?php   try{require_once "./includes/footer.inc.php";}
        catch(Exception $e){print("Footer not Found");} 
?>
</html>