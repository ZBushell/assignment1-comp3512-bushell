<?php
/* api queries */

// Drivers in 2022
$driversIn2022 = "SELECT DISTINCT d.* FROM drivers d 
                        LEFT JOIN qualifying q ON d.driverId = q.driverId 
                        LEFT JOIN races r ON q.raceId = r.raceId 
                        WHERE r.year IN(2022);";

// Specific driver in 2022
$specificDriverIn2022 = "SELECT DISTINCT d.* FROM drivers d 
                                LEFT JOIN qualifying q ON d.driverId = q.driverId 
                                LEFT JOIN races r ON q.raceId = r.raceId 
                                WHERE r.year IN(2022) AND d.driverRef IN( ? );";

// Constructors in 2022
$constructorsIn2022 = "SELECT DISTINCT c.* FROM constructors c 
                             LEFT JOIN qualifying q ON c.constructorId = q.constructorId 
                             LEFT JOIN races r ON q.raceId = r.raceId 
                             WHERE r.year IN(2022);";

// Specific constructor from 2022
$specificConstructorIn2022 = "SELECT DISTINCT c.* FROM constructors c 
                                     LEFT JOIN qualifying q ON c.constructorId = q.constructorId 
                                     LEFT JOIN races r ON q.raceId = r.raceId 
                                     WHERE r.year IN(2022) AND c.constructorRef IN( ? );";

// Circuits in 2022
$circuitsIn2022 = "SELECT DISTINCT c.* FROM circuits c 
                         LEFT JOIN races r ON c.circuitID = r.circuitID 
                         WHERE r.year IN(2022) 
                         ORDER BY r.date DESC;";

// Only one circuit
$singleCircuit = "SELECT DISTINCT c.* FROM circuits c 
                       LEFT JOIN races r ON c.circuitID = r.circuitID 
                       WHERE r.year IN(2022) AND c.circuitRef IN( ? ) 
                       ORDER BY r.date DESC;";

// Driver with a specific race ID
$driverWithSpecificRaceId = "SELECT DISTINCT d.* FROM drivers d 
                                   LEFT JOIN qualifying q ON d.driverId = q.driverId 
                                   LEFT JOIN races r ON q.raceId = r.raceId 
                                   WHERE r.year IN(2022) AND r.raceId IN ( ? );";

// Races in 2022
$racesIn2022 = "SELECT * FROM races r 
                     WHERE r.year IN(2022) 
                     ORDER BY round;";

// Specific race
$specificRace = "SELECT r.name, c.name, c.location, c.country 
                      FROM races r 
                      LEFT JOIN results re ON r.raceId = re.raceId 
                      LEFT JOIN circuits c ON r.circuitID = c.circuitId 
                      WHERE r.raceId IN ( ? );";

// Results for a specific race
$resultsForSpecificRace = "SELECT d.driverRef, d.code, d.forename, d.surname, 
                                 ra.name, ra.round, ra.year, ra.date, 
                                 c.name, c.constructorRef, c.nationality 
                                 FROM drivers d 
                                 LEFT JOIN results r ON d.driverID = r.driverID 
                                 LEFT JOIN constructors s ON s.constructorId = r.constructorId 
                                 LEFT JOIN races ra ON ra.raceId = r.raceId 
                                 WHERE r.raceId IN ( ? ) 
                                 ORDER BY r.grid ASC;";

// Results for a given driver
$resultsForGivenDriver = "SELECT r.* FROM results r 
                               LEFT JOIN drivers d ON r.driverID = d.driverID 
                               WHERE d.driverRef IN ( ? );";


/* non API queries */

$browseQuali = "SELECT CONCAT(d.forename, ' ', d.surname) AS 'Name', c.name AS Team, q.q1 AS Q1, q.q2 AS Q2, q.q3 AS Q3 FROM qualifying q LEFT JOIN drivers d ON q.driverId = d.driverId LEFT JOIN constructors c ON q.constructorId = c.constructorId LEFT JOIN races r ON r.raceId = q.raceId WHERE r.raceId IN( ? ) ORDER BY q.q3 ASC;";


$dvrDetails = "SELECT * from drivers WHERE driverId = ? ;";

$dvrRaces = "SELECT r.* , c.name as 'Name' from results r LEFT JOIN drivers d ON d.driverId = r.driverId LEFT JOIN races c ON r.raceId = c.raceId WHERE c.year IN(2022) AND d.driverId = ? ;";

$ctrDetails = "SELECT * FROM constructors WHERE constructorId = ?";

$ctrRaces = "SELECT r.* , CONCAT(d.forename, ' ', d.surname) AS 'Driver' FROM results r LEFT JOIN qualifying q ON r.driverId = q.driverId LEFT JOIN drivers d ON d.driverId = r.driverId LEFT JOIN constructors c ON r.constructorId = c.constructorId LEFT JOIN races c ON c.raceId = r.raceId WHERE c.year = 2022 AND r.constructorId = ?; ";


?>