<?php
// Drivers in 2022
$driversIn2022Query = "SELECT DISTINCT d.* FROM drivers d 
                        LEFT JOIN qualifying q ON d.driverId = q.driverId 
                        LEFT JOIN races r ON q.raceId = r.raceId 
                        WHERE r.year IN(2022);";

// Specific driver in 2022
$specificDriverIn2022Query = "SELECT DISTINCT d.* FROM drivers d 
                                LEFT JOIN qualifying q ON d.driverId = q.driverId 
                                LEFT JOIN races r ON q.raceId = r.raceId 
                                WHERE r.year IN(2022) AND d.driverRef IN('hamilton');";

// Constructors in 2022
$constructorsIn2022Query = "SELECT DISTINCT c.* FROM constructors c 
                             LEFT JOIN qualifying q ON c.constructorId = q.constructorId 
                             LEFT JOIN races r ON q.raceId = r.raceId 
                             WHERE r.year IN(2022);";

// Specific constructor from 2022
$specificConstructorIn2022Query = "SELECT DISTINCT c.* FROM constructors c 
                                     LEFT JOIN qualifying q ON c.constructorId = q.constructorId 
                                     LEFT JOIN races r ON q.raceId = r.raceId 
                                     WHERE r.year IN(2022) AND c.constructorRef IN('red_bull');";

// Circuits in 2022
$circuitsIn2022Query = "SELECT DISTINCT c.* FROM circuits c 
                         LEFT JOIN races r ON c.circuitID = r.circuitID 
                         WHERE r.year IN(2022) 
                         ORDER BY r.date DESC;";

// Only one circuit
$singleCircuitQuery = "SELECT DISTINCT c.* FROM circuits c 
                       LEFT JOIN races r ON c.circuitID = r.circuitID 
                       WHERE r.year IN(2022) AND c.circuitRef IN('spa') 
                       ORDER BY r.date DESC;";

// Driver with a specific race ID
$driverWithSpecificRaceIdQuery = "SELECT DISTINCT d.* FROM drivers d 
                                   LEFT JOIN qualifying q ON d.driverId = q.driverId 
                                   LEFT JOIN races r ON q.raceId = r.raceId 
                                   WHERE r.year IN(2022) AND r.raceId IN (1106);";

// Races in 2022
$racesIn2022Query = "SELECT * FROM races r 
                     WHERE r.year IN(2022) 
                     ORDER BY round;";

// Specific race
$specificRaceQuery = "SELECT r.name, c.name, c.location, c.country 
                      FROM races r 
                      LEFT JOIN results re ON r.raceId = re.raceId 
                      LEFT JOIN circuits c ON r.circuitID = c.circuitId 
                      WHERE r.raceId IN (1106);";

// Results for a specific race
$resultsForSpecificRaceQuery = "SELECT d.driverRef, d.code, d.forename, d.surname, 
                                 ra.name, ra.round, ra.year, ra.date, 
                                 c.name, c.constructorRef, c.nationality 
                                 FROM drivers d 
                                 LEFT JOIN results r ON d.driverID = r.driverID 
                                 LEFT JOIN constructors s ON s.constructorId = r.constructorId 
                                 LEFT JOIN races ra ON ra.raceId = r.raceId 
                                 WHERE r.raceId IN (1106) 
                                 ORDER BY r.grid ASC;";

// Results for a given driver
$resultsForGivenDriverQuery = "SELECT r.* FROM results r 
                               LEFT JOIN drivers d ON r.driverID = d.driverID 
                               WHERE d.driverRef IN ('verstappen');";

?>