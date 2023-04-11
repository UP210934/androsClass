<?php
if (empty($_POST["inventory_id"]) || empty($_POST["customer_id"]) || empty($_POST["return_date"]) || empty($_POST["staff_id"])){
    header("Location: tabla.php?mensaje=falta"); 
}
include_once "../includes/databaseconnect.php";


$inventory_id = $_POST["inventory_id"];
$customer_id = $_POST["customer_id"];
$return_date = $_POST["return_date"];
$staff_id = $_POST["staff_id"];

$sql = $conn->prepare("insert into rental (rental_date, inventory_id, customer_id, return_date, staff_id) 
values(current_timestamp, ?, ?, ?, ?);");
//$result = $sql-> execute([$nombre,$nivel,$n2]);
$result = $sql-> execute([$inventory_id,$customer_id,$return_date,$staff_id]);

if ($result == true){
    header("Location: tabla.php?mensaje=registrado"); 
}else{
    header("Location: tabla.php?mensaje=error"); 
    exit();
}
?>