<div class="container">
  <div class="modal fade" id="edit_rental">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">EDITAR</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">X</button>

          <?php
          include_once "../includes/databaseconnect.php";
          ?>

        </div>
        <div class="modal-body">
          <div class="p-4">
            <div class="card">
              <div class="card-header">
                Editar registro de renta
              </div>
              <form class="p-4" method="POST" action="edit.php">
                <div class="row g-2">
                  <div class="col md">
                    <div class="mb-3">
                      <label class="form-label"> ID: </label>
                      <input type="number" class="form-control"  id="me_rental_id" name="rental_id" autofocus readonly>
                    </div>
                    <div class="mb-3">
                      <label class="form-label"> Personal: </label>
                      <select class="form-select" id="me_staff_id" name="staff_id" required>
                        <option value="" selected disabled hidden>Personal</option>
                        <?php
                        foreach ($result_staff as $staff) :
                        ?>
                          <option id="staff_edit_<?= $staff->staff_id ?>" value="<?= $staff->staff_id ?>"><?= $staff->first_name . " " . $staff->last_name ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label"> Número de inventario: </label>
                  <select class=" form-select" role="menu" id="me_inventory_id" name="inventory_id" required>
                    <option value="" selected disabled hidden>Número - película</option>
                    <?php
                    foreach ($result_inventory as $inv) :
                    ?>
                      <option id="inv_edit<?= $inv->inventory_id ?>" value="<?= $inv->inventory_id ?>"><?= $inv->inventory_id . " " . $inv->title ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label"> Cliente: </label>
                  <select class=" form-select" role="menu" id="me_customer_id" name="customer_id" required>
                    <option value="" selected disabled hidden>Cliente</option>
                    <?php
                    foreach ($result_customer as $cliente) :
                    ?>
                      <option id="customer_edit<?= $cliente->customer_id ?>" value="<?= $cliente->customer_id ?>"><?= $cliente->first_name . " " . $cliente->last_name ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label"> Fecha de devolución: </label>
                  <input type="date" class="form-control" id="me_return_date" name="return_date" autofocus required>
                </div>
                <div class="d-grid">
                  <input type="hidden" name="oculto" value="1">
                  <button type="submit" class="btn btn-primary">Guardar cambios</button>
                  <br>
                  <!-- <input type="submit" class="btn-primary" value="Registrar"> -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>