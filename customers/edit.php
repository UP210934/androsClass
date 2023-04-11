
<?php
print_r($_POST);
if (!isset($_POST["numID"])){
  header("Location: tabla.php?mensaje=error");
}
if (empty($_POST["oculto"]) || empty($_POST["txtNombre"])){
    header("Location: tabla.php?mensaje=falta"); 
}

include_once "../includes/databaseconnect.php";

$id = $_POST["numID"];
$tienda = $_POST["txtTienda"];
$nombre = $_POST["txtNombre"];
$apellido = $_POST["txtApellido"];
$correo = $_POST["txtCorreo"];
$activo = $_POST["txtActivo"];

// //$sql = $conn->prepare("UPDATE tipo_usuario set (nombre, nivel, n2) VALUES (?, ?, ?);");
$sql = $conn->prepare("UPDATE customer set store_id=?, first_name=?, last_name=?, email=?, active=?, last_update = current_timestamp where customer_id=?;");
$result = $sql-> execute([$tienda, $nombre, $apellido, $correo, $activo, $id]);

if ($result == true){
  header("Location: tabla.php?mensaje=registrado"); 
}else{
  header("Location: tabla.php?mensaje=error"); 
  exit();
}
?>

