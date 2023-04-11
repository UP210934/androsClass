
<?php
print_r($_POST);
if (!isset($_POST["numID"])){
  header("Location: tabla.php?mensaje=error");
}
if (empty($_POST["oculto"]) || empty($_POST["store"])){
    header("Location: tabla.php?mensaje=falta"); 
}

include_once "../includes/databaseconnect.php";

$id = $_POST["numID"];
$film = $_POST["film"];
$store = $_POST["store"];

// //$sql = $conn->prepare("UPDATE tipo_usuario set (nombre, nivel, n2) VALUES (?, ?, ?);");
$sql = $conn->prepare("UPDATE inventory set film_id=?, store_id=?, last_update = current_timestamp where inventory_id=?;");
$result = $sql-> execute([$film, $store, $id]);

if ($result == true){
  header("Location: tabla.php?mensaje=registrado"); 
}else{
  header("Location: tabla.php?mensaje=error"); 
  exit();
}
?>

