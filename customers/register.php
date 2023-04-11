<?php
print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtNombre"])){
    header("Location: tabla.php?mensaje=falta"); 
}
include_once "../includes/databaseconnect.php";


$tienda = $_POST["numTienda"];
$nombre = $_POST["txtNombre"];
$correo = $_POST["txtCorreo"];
$apellido = $_POST["txtApellido"];
$activo = $_POST["numActivo"];

$sql = $conn->prepare("insert into customer (store_id, first_name, last_name, email, active, create_date, last_update, address_id) 
values(?, ?, ?, ?, ?, current_timestamp, current_timestamp, 1);");
//$result = $sql-> execute([$nombre,$nivel,$n2]);
$result = $sql-> execute([$tienda,$nombre,$apellido,$correo,$activo]);

if ($result == true){
    header("Location: tabla.php?mensaje=registrado"); 
}else{
    header("Location: tabla.php?mensaje=error"); 
    exit();
}
?>