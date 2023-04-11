
<?php
print_r($_POST);
if (!isset($_POST["rental_id"])){
  header("Location: tabla.php?mensaje=error");
}
if (empty($_POST["inventory_id"]) || empty($_POST["customer_id"]) || empty($_POST["return_date"]) || empty($_POST["staff_id"])){
  header("Location: tabla.php?mensaje=falta"); 
}
include_once "../includes/databaseconnect.php";

$rental_id =  $_POST["rental_id"];
$inventory_id = $_POST["inventory_id"];
$customer_id = $_POST["customer_id"];
$return_date = $_POST["return_date"];
$staff_id = $_POST["staff_id"];

// //$sql = $conn->prepare("UPDATE tipo_usuario set (nombre, nivel, n2) VALUES (?, ?, ?);");
$sql = $conn->prepare("UPDATE rental set inventory_id=?, customer_id=?, return_date=?, staff_id=?, last_update = current_timestamp where rental_id=?;");
$result = $sql-> execute([$inventory_id, $customer_id, $return_date, $staff_id, $rental_id]);

if ($result == true){
  header("Location: tabla.php?mensaje=registrado"); 
}else{
  header("Location: tabla.php?mensaje=error"); 
  exit();
}
?>

