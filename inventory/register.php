<?php
print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["film"])){
    header("Location: tabla.php?mensaje=falta"); 
}
include_once "../includes/databaseconnect.php";


$film = $_POST["film"];
$store = $_POST["store"];
$sql = $conn->prepare("insert into inventory (film_id, store_id, last_update) 
values(?, ?, current_timestamp);");
//$result = $sql-> execute([$nombre,$nivel,$n2]);
$result = $sql-> execute([$film, $store]);

if ($result == true){
    header("Location: tabla.php?mensaje=registrado"); 
}else{
    header("Location: tabla.php?mensaje=error"); 
    exit();
}
?>