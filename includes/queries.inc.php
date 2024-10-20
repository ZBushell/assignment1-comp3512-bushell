<?php
/* api queries */

// Drivers in 2022
$driversIn2022 = "SELECT DISTINCT d.* FROM drivers d LEFT JOIN qualifying q ON d.driverId = q.driverId LEFT JOIN races r ON q.raceId = r.raceId WHERE r.year IN(2022);";

// Specific driver in 2022
$specificDriverIn2022 = "SELECT DISTINCT d.* FROM drivers d LEFT JOIN qualifying q ON d.driverId = q.driverId LEFT JOIN races r ON q.raceId = r.raceId WHERE r.year IN(2022) AND d.driverRef = ? ;";

// Constructors in 2022
$constructorsIn2022 = "SELECT DISTINCT c.* FROM constructors c LEFT JOIN qualifying q ON c.constructorId = q.constructorId LEFT JOIN races r ON q.raceId = r.raceId WHERE r.year IN(2022);";

// Specific constructor from 2022
$specificConstructorIn2022 = "SELECT DISTINCT c.* FROM constructors c LEFT JOIN qualifying q ON c.constructorId = q.constructorId LEFT JOIN races r ON q.raceId = r.raceId WHERE r.year IN(2022) AND c.constructorRef = ? ;";

// Circuits in 2022
$circuitsIn2022 = "SELECT DISTINCT c.* FROM circuits c LEFT JOIN races r ON c.circuitID = r.circuitID WHERE r.year IN(2022) ORDER BY r.date DESC;";

// Only one circuit
$singleCircuit = "SELECT DISTINCT c.* FROM circuits c LEFT JOIN races r ON c.circuitID = r.circuitID WHERE r.year IN(2022) AND c.circuitRef = ?  ORDER BY r.date DESC;";

// Driver with a specific race ID
$driversInSpecificRace = "SELECT DISTINCT d.* FROM drivers d LEFT JOIN qualifying q ON d.driverId = q.driverId LEFT JOIN races r ON q.raceId = r.raceId WHERE r.raceId = ? ;";

// Races in 2022
$racesIn2022 = "SELECT * FROM races r WHERE r.year IN(2022) ORDER BY round;";

// Specific race
$specificRace = "SELECT DISTINCT r.name, c.name, c.location, c.country FROM races r LEFT JOIN results re ON r.raceId = re.raceId LEFT JOIN circuits c ON r.circuitID = c.circuitId WHERE r.raceId = ? ;";


//api qualifying results
$apiQualifying = "SELECT q.number, q.position, q.q1, q.q2, q.q3, d.driverRef, d.code, d.forename, d.surname, rc.name, rc.round, rc.year, rc.date, c.name, c.nationality, c.constructorRef  FROM qualifying q LEFT JOIN races rc ON q.raceId = rc.raceId LEFT JOIN drivers d ON d.driverId = q.driverId LEFT JOIN constructors c ON c.constructorId = q.constructorId WHERE rc.raceId = ? ORDER BY q.position ASC;";



// Results for a specific race
$resultsForSpecificRace = "SELECT d.driverRef, d.code, d.forename, d.surname, ra.name, ra.round, ra.year, ra.date, c.name, c.constructorRef, c.nationality , r.number, r.grid, r.position, r.positionText, r.positionOrder, r.points, r.laps, r.time, r.milliseconds, r.fastestLap, r.rank, r.fastestLapTime, r.fastestLapSpeed FROM drivers d LEFT JOIN results r ON d.driverID = r.driverID LEFT JOIN constructors c ON c.constructorId = r.constructorId LEFT JOIN races ra ON ra.raceId = r.raceId WHERE r.raceId = ? ORDER BY r.grid ASC;";


// Results for a given driver
$resultsForGivenDriver = "SELECT r.number, r.grid, r.position, r.positionText, r.positionOrder, r.points, r.laps, r.time, r.milliseconds, r.fastestLap, r.rank, r.fastestLapTime, r.fastestLapSpeed FROM results r LEFT JOIN drivers d ON r.driverId = d.driverId WHERE d.driverRef = ?;";

/* non API queries */

//browse qualifying
$browseQuali = "SELECT q.position as 'pos', CONCAT(d.forename, ' ', d.surname) AS 'Name', c.name AS Team, q.q1 AS Q1, q.q2 AS Q2, q.q3 AS Q3, c.constructorId, d.driverId FROM qualifying q LEFT JOIN drivers d ON q.driverId = d.driverId LEFT JOIN constructors c ON q.constructorId = c.constructorId LEFT JOIN races r ON r.raceId = q.raceId WHERE r.raceId IN( ? ) ORDER BY q.position ASC ;";

//return specific race results
$browseRace = "SELECT r.*, CONCAT(d.forename, ' ', d.surname) AS 'Name', x.name AS 'Team' FROM results r LEFT JOIN drivers d ON d.driverId = r.driverId LEFT JOIN races c ON c.raceId = r.raceId LEFT JOIN constructors x ON x.constructorId = r.constructorId WHERE c.year = 2022 AND c.raceId = ? ORDER BY r.position;";

//driver details
$dvrDetails = "SELECT * from drivers WHERE driverId = ? ;";

//races in 2022 for x driver 
$dvrRaces = "SELECT c.round AS 'round', r.* , c.name as 'Name' from results r LEFT JOIN drivers d ON d.driverId = r.driverId LEFT JOIN races c ON r.raceId = c.raceId WHERE c.year IN(2022) AND d.driverId = ? ORDER BY c.round ASC;";

//constructor details
$ctrDetails = "SELECT c.name as 'name', c.url as 'url', c.nationality as 'country' FROM constructors c WHERE constructorId = ?";

//constructor race results 
$ctrRaces = "SELECT DISTINCT rc.name as 'name', rc.round as 'round', r.* , CONCAT(d.forename, ' ', d.surname) AS 'Driver' FROM results r LEFT JOIN qualifying q ON r.driverId = q.driverId LEFT JOIN drivers d ON d.driverId = r.driverId LEFT JOIN constructors c ON r.constructorId = c.constructorId LEFT JOIN races rc ON rc.raceId = r.raceId WHERE rc.year = 2022 AND r.constructorId = ?; ";
?>