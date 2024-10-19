<?php

require_once './includes/config.inc.php';
require './includes/queries.inc.php';

$db = new F1Database("./data/f1.db");


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
    <title>Browse</title>
</head>
<?php   try{require_once "./includes/header.inc.php";}
        catch(Exception $e){print("Header not Found");} 
?>
<body>
        <main>
        <aside class="about">
            <h2>2022 Races</h2>
        <?php
            $races = $db->pdoQuery($racesIn2022);
            //print all of the races for 2022
            print('<form action="browse.php" method="GET">');
            print("<ul>");
            foreach ($races as $i) {
                print('<li>');
                print('<label>');
                print('<input type="radio" name="raceId" value="' . $i['raceId'] . '" required> ' . $i['name']);
                print('</label>');
                print('</li>');
            }
            print("</ul>");
            print('<button type="submit">Submit</button>');
            print('</form>');
            
        ?>
        </aside>
        <article class="results">
            <?php
                
                if(isset($_GET['raceId']) && $_GET['raceId'] != null){
                    
                    $args = [$_GET['raceId']];
                    $qaliResults = $db->preparedQuery($browseQuali, $args); 
                    $gridResults = $db->preparedQuery($browseRace,$args);

                    print('<div class="browse-results browse-qualifying">');
                    print('<table class="table">');
                    print('<thead><tr><th>Position</th><th>Name</th><th>Team</th><th>Q1</th><th>Q2</th><th>Q3</th></tr></thead>');
                    //print out qualifying table
                    foreach ($qaliResults as $x => $result) {
                        
                        print('<tr>');
                        print('<td>' .$result['pos'] . '</td>');
                        print('<td><a href="driver.php?driverId=' . $result['driverId'] . '">' . $result['Name'] . '</a></td>');
                        print('<td><a href="constructor.php?constructorId=' . $result['constructorId'] . '">' . $result['Team'] . '</a></td>');
                        print('<td>' . $result['Q1']) . '</td>';
                        print('<td>' . $result['Q2']) . '</td>';
                        print('<td>' . $result['Q3']) . '</td>';
                        print('</tr>');
                    }

                    print('</table>');
                    print('<div class="browse-results browse-grid">');
                    print('<table class="table">');
                    print('<thead><tr><th>Position</th><th>Name</th><th>Team</th><th>Laps</th><th>Pts</th></tr></thead>');
                    //print out results table
                    foreach ($gridResults as $x => $result) {
                        print('<tr>');
                        print('<td>' . $result['position']. '</td>'); 
                        print('<td>' . $result['Name']. '</td>');
                        print('<td>' . $result['Team']. '</td>');
                        print('<td>' . $result['laps']. '</td>');
                        print('<td>' . $result['points'] . '</td>');
                        print('</tr>');
                    }

                    print('</table>');
                    print('</div>');
                }
                elseif (!isset($_GET['ref']) || $_GET['ref'] == null) {
                    print('<div class="select-a-race"><b>Select a race to view the results</b></div>');
                }
                $db->dropConnection();
            ?>
        </article>
        </main>
           
</body>
<?php   try{require_once "./includes/footer.inc.php";}
        catch(Exception $e){print("Footer not Found");} 
?>
</html>