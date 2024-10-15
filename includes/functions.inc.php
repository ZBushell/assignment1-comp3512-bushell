<?php
function preparedQuery($pdo, $sql, $params = []) {
    try {
        // prepare execute and fetch results.
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //more try catch stuff
    } catch (Exception $e) {
        // Handle error (logging, displaying a message, etc.)
        die("Query failed: " . $e->getMessage());
    }
}
function pdoQuery($pdo, $sql){
    try{
        $result = $pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (Exception $e){
        die("Query Failed:" . $e->getMessage());
    }
}


?>
