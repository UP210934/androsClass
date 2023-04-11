<?php
require_once 'pdoconfig.php';
 
try { 
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username);
    //echo "Connected to $dbname at $host successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}

?>

