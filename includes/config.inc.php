<?php

class F1Database {
    private $pdo;

    public function __construct($dbFile) {
        try {
            $this->pdo = new PDO('sqlite:' . $dbFile);
            // Set error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "<h1>Connection failed: " . $e->getMessage() . "</h1>";
        }
    }

    // Method to get the PDO instance
    public function getConnection() {
        return $this->pdo;
    }

    // drops connection
    public function dropConnection(){
        $this->pdo = null;
    }

    // Prepared query method
    public function preparedQuery($sql, $params = []) {
        try {
            // Prepare, execute and fetch results
            $result = $this->pdo->prepare($sql);
            $result->execute($params);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (Exception $e) {
            // Handle error
            die("Query failed: " . $e->getMessage());
        }
    }

    // PDO query method
    public function pdoQuery($sql) {
        try {
            //query with sql arg
            $result = $this->pdo->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (Exception $e) {
            // Handle error
            die("Query Failed: " . $e->getMessage());
        }
    }
    
}

?>



