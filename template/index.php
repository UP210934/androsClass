<?php
//conexión a base de datos
include './header.php';
?>
<style>
  /* Estilo personalizado para el contenedor */
  .container-custom {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }

  /* Estilo personalizado para los botones */
  .btn-custom {
    width: 200px;
    height: 100px;
    font-size: 2em;
    margin: 10px;
  }
</style>
<br>
<div class="container container-custom">
  <div class="container">
    <div class="row">
      <div class="col">
        <p class="h2">Juan Lopez Miguel Escalera
        </p>
      </div>
      <div class="row">
        <p class="h2">Derek Ramirez Isaac Vazquez
        </p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <a type="button" href="../customers/tabla.php" class="btn btn-primary btn-custom">Inventario</a>
    </div>
    <div class="col">
      <a type="button" href="../customers/tabla.php" class="btn btn-success btn-custom">Clientes</a>
    </div>
    <div class="col">
      <a type="button" href="../rental/tabla.php" class="btn btn-danger btn-custom">Rental</a>
    </div>
  </div>
</div>