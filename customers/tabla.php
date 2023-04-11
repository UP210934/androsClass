
    <?php
    //conexión a base de datos
    include_once "../includes/databaseconnect.php";
    include '../template/header.php'; 

    //query para tabla principal
    $sql = $conn->query("select * from customer;");
    $result = $sql->fetchAll(PDO::FETCH_OBJ);

    ?>

    <br>


    <div class="container-fluid">
      <div class="row justify-content-center">
        <!-- <div class="container-sm"> -->
        <!-- inicio alerta -->
        <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
        ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Advertencia!</strong> Por favor rellena los campos requeridos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='tabla.php'"></button>
          </div>
        <?php
        }
        ?>
        <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='tabla.php'"></button>
          </div>
        <?php
        }
        ?>

        <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
        ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Accion correcta.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='tabla.php'"></button>
          </div>
        <?php
        }
        ?>

        <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
        ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='tabla.php'"></button>
          </div>
        <?php
        }
        ?>

        <!-- fin alerta -->
        <div class="card">
          <div class="card-header">
            <h2>Clientes</h2>
            <br>
          </div>
          <div style="max-height:500px;" class="overflow-scroll">
            <table WIDTH="1000" class="table table-striped table-bordered align-middle tabla_busqueda" id="registros">

              <thead class="sticky-top bg-white">
                <tr>
                  <div class="sticky-left"></div>
                  <th scope="col"><input class="form-check-input" id="SelectAll" type="checkbox" onchange="SeleccionarTodo();"></th>
                  <th scope="col">ID</th>
                  <th scope="col">ID Tienda</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Activo</th>
                  <th scope="col">Fecha de registro</th>
                  <th scope="col">Ultima modificación</th>
                  <th scope="col" colspan="2">Acciones</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $cont = 1;
                foreach ($result as $results) {
                ?>
                  <tr>
                    <th scope="row"><input class="form-check-input" type="checkbox" id="CheckGroup<?= $cont; ?>"></th>
                    <td id="id<?php echo $results->customer_id; ?>" value="5"><?php echo $results->customer_id;
                                                                      ?></td>
                    <td id="tienda<?php echo $results->customer_id; ?>" value="5"><?php echo $results->store_id;
                                                                          ?></td>
                    <td id="nombre<?php echo $results->customer_id; ?>"><?php echo $results->first_name;
                                                            ?></td>
                    <td id="apellido<?php echo $results->customer_id; ?>"><?php echo $results->last_name;
                                                              ?></td>
                    <td id="email<?php echo $results->customer_id; ?>"><?php echo $results->email;
                                                                ?></td>
                    <td id="active<?php echo $results->customer_id; ?>"><?php echo $results->active;
                                                                ?></td>
                    <td id="id<?php echo $results->customer_id; ?>"><?php echo $results->create_date;
                                                            ?></td>
                    <td id="colonia<?php echo $results->customer_id; ?>"><?php echo $results->last_update;
                                                                ?></td>
                    <td>
                      <button type="button" id="editbtn" class="btn btn-primary btn-sm bi bi-pencil-square" value="<?php echo $results->customer_id; ?>">
                        EDITAR
                      </button>
                    </td>
                    <td>
                      <button type="button" id="deletebtn" class="btn btn-danger btn-sm bi bi-pencil-square" value="<?php echo $results->customer_id; ?>">
                        ELIMINAR
                      </button>
                    </td>
                  </tr>
                  <!--Ventana Modal para Actualizar--->

                <?php
                  $cont = $cont + 1;
                }
                ?>
                <?php 
                include('modal_edit_register.php');
                include('modal_add.php');
                ?>

              </tbody>
            </table>
          </div>
          <div>
            <br>
            <a id="add_button" class="btn btn-primary btn-md">Registrar nuevo</a>
            <button type="button" class="btn btn-danger btn-SM" onclick="DeleteUsers()">Eliminar seleccionados</button>
            <br>
          </div>
        </div>
      </div>
    </div>
    <div>
    </div>

    <script src="index_cliente.js?v=<?php echo (rand()); ?>"></script>

    



   

    

    