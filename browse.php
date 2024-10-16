<?php

chdir('/home/n0x/git-repos/assignment1-comp3512-bushell/');
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
                $races = $db->pdoQuery($racesIn2022);
                
                print ("<ul>");
                foreach($races as $i){
                    print("<li>" .$i['name'].'<a href="browse.php?ref='.$i['raceId'].'" class="browse-link">Results</a></li>');

                }
                print ("</ul>");

            ?>
        </aside>
        <article class="results">
            <?php
                if(isset($_GET['ref']) && $_GET['ref'] != null){
                    
                    $qaliResults = $db->preparedQuery($browseQuali, $_GET['ref']);

                    print('<div class="browse-results browse-qualifying">');
                    print('<table border="1">');
                    print('<tr><th>Position</th><th>Name</th><th>Team</th><th>Q1</th><th>Q2</th><th>Q3</th></tr>');

                    foreach ($qaliResults as $x => $result) {
                        print('<tr>');
                        print('<td>' . $x . '</td>');
                        print('<td>' . htmlspecialchars($result['name']) . '</td>');
                        print('<td>' . htmlspecialchars($result['constructor']) . '</td>');
                        print('<td>' . htmlspecialchars($result['q1']) . '</td>');
                        print('<td>' . htmlspecialchars($result['q2']) . '</td>');
                        print('<td>' . htmlspecialchars($result['q3']) . '</td>');
                        print('</tr>');
                    }

                    print('</table>');
                    print('</div>');
                    

                }
                elseif (!isset($_GET['ref']) || $_GET['ref'] == null) {
                    print('<div class="select-a-race"><b>Select a race to view the results</b></div>');
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