<?php
include_once '../includes/databaseconnect.php';
?>


    <?php include '../template/header.php' ?>
    <!-- <link rel="stylesheet" href="search_style.css" />   -->
    <?php
    //conexión a base de datos
    include_once "../includes/databaseconnect.php";

    //query para tabla principal
    $sql = $conn->query("select distinct r.rental_id id, r.rental_date rental_date, r.inventory_id inventory_id,
                               c.customer_id customer_id, r.return_date return_date, r.staff_id staff_id, 
                               r.last_update last_update, c.first_name c_first_name, c.last_name c_last_name,
                               s.first_name s_first_name, s.last_name s_last_name,
                               f.film_id film_id, f.title film_title,
                               r.inventory_id inventory_id
                        from rental r inner join customer c on r.customer_id = c.customer_id
                        inner join staff s on r.staff_id = s.staff_id
                        inner join inventory i on i.inventory_id = r.inventory_id
                        inner join film f on f.film_id = i.film_id
                        order by r.rental_id desc
                        limit 50;");
    $result = $sql->fetchAll(PDO::FETCH_OBJ);

    //Query para dropdown

    $sql_customer = $conn->query("select customer_id, first_name, last_name from customer order by first_name;");
    $result_customer = $sql_customer->fetchAll(PDO::FETCH_OBJ);

    $sql_staff = $conn->query("select staff_id, first_name, last_name from staff order by first_name;");
    $result_staff = $sql_staff->fetchAll(PDO::FETCH_OBJ);

    $sql_inventory = $conn->query("select i.inventory_id inventory_id, f.film_id film_id, f.title title
                                    from inventory i inner join film f on i.film_id = f.film_id
                                    order by f.title;");
    $result_inventory = $sql_inventory->fetchAll(PDO::FETCH_OBJ);

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
            <h2>Rentas</h2>
            <br>
          </div>
          <div style="max-height:500px;" class="overflow-scroll">
            <table WIDTH="1000" class="table table-striped table-bordered align-middle tabla_busqueda" id="registros_rental">

              <thead class="sticky-top bg-white">
                <tr>
                  <div class="sticky-left"></div>
                  <th scope="col"><input class="form-check-input" id="SelectAll" type="checkbox" onchange="SeleccionarTodo();"></th>
                  <th scope="col">ID</th>
                  <th scope="col">Película</th>
                  <th scope="col">ID de inventario</th>
                  <th scope="col">Fecha de renta</th>
                  <th scope="col">Cliente</th>
                  <th scope="col">Staff</th>
                  <th scope="col">Fecha de devolución</th>
                  <th scope="col">Última actualización</th>
                  <th scope="col" colspan="2">Acciones</th>
                </tr>
              </thead>
              <tbody>

                <?php
                 $cont = 1;
                foreach ($result as $results) {

                 
                ?>
                  <tr>
                    <th scope="row"><input class="form-check-input" type="checkbox" id="CheckGroup_rental<?=$cont;?>"></th>
                    <td id="id<?php echo $results->id; ?>"><?php echo $results->id;
                                                                      ?></td>
                    <td id="film<?php echo $results->id; ?>"><?php echo $results->film_title;
                      ?></td>
                    <td id="inventory_id<?php echo $results->id; ?>" ><?php echo $results->inventory_id;
                                                                      ?></td>
                    <td id="rental_date<?php echo $results->id; ?>"><?php echo $results->rental_date;
                                                                          ?></td>
                    <td id="client<?php echo $results->id; ?>" value="<?php echo $results->customer_id; ?>"><?php echo $results->c_first_name . " " . $results->c_last_name;
                                                            ?></td>
                    <td id="staff<?php echo $results->id; ?>" value="<?php echo $results->staff_id; ?>"><?php echo $results->s_first_name . " " . $results->s_last_name;
                      ?></td>
                    <td id="return_date<?php echo $results->id; ?>" value="<?php echo $results->return_date; ?>"><?php echo $results->return_date;
                                                              ?></td>
                    <td id="last_update<?php echo $results->id; ?>"><?php echo $results->last_update;
                                                                ?></td>
                    <td>
                      <button type="button" id="editbtn_rental" class="btn btn-primary btn-sm bi bi-pencil-square" value="<?php echo $results->id; ?>">
                        EDITAR
                      </button>
                    </td>
                    <td>
                      <button type="button" id="deletebtn" class="btn btn-danger btn-sm bi bi-pencil-square" value="<?php echo $results->id; ?>">
                        ELIMINAR
                      </button>
                    </td>
                  </tr>
                  <!--Ventana Modal para Actualizar--->
                  <?php  
                  $cont = $cont + 1;
                    } 
                  include('modal_edit_register.php');
                  include('modal_add.php');?>
              </tbody>
            </table>
          </div>
          <div>
            <br>
            <a id="add_button" class="btn btn-primary btn-md">Registrar nuevo</a>
            <button type="button" class="btn btn-danger btn-SM" onclick="DeleteUsers()">Eliminar seleccionados</button>
          </div>
        </div>
      </div>
    </div>
    <div>

    </div>

<script src="index_rental.js?v=<?php echo (rand()); ?>"></script>