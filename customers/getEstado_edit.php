<?php 

include_once "../includes/databaseconnect.php";

$id_pais = $_POST['id_pais'];
$id_estado=$_POST['id_estado'];

if($id_pais==1){
    //header("Location: ../index.php");
}

// echo "Hola el id_pais es:"; echo $id_pais;
?>
<!-- <script>
    console.log("hola eddie")
</script> -->
<?php

$sql_estados = $conn->prepare("SELECT id, nombre from estados where id_pais = ? order by nombre asc;");
$result_estados = $sql_estados->execute([$id_pais]);
$result_estados = $sql_estados->fetchAll(PDO::FETCH_OBJ);

$html= "<option id='faul_estado' value='' selected disabled hidden>Seleccionar Municipio</option>";

foreach($result_estados as $results_estados){
    $nombre_estado=str_replace(" ","_",$results_estados->nombre);
    if($id_estado==$nombre_estado){
        $html = "<option value='".$results_estados->id."' id='mestado".$nombre_estado."' selected >".$results_estados->nombre."</option>";
    }else{
        $html = "<option value='".$results_estados->id."' id='mestado".$nombre_estado."'>".$results_estados->nombre."</option>";
    }
    
    ?>
    
    <?php
    echo $html;
}



?>