function SeleccionarTodo() {
  if (document.getElementById("SelectAll").checked) {
    let renglones = document.getElementById("registros_rental").rows.length;
    for (let i = 1; i < renglones; i++) {
      document.getElementById("CheckGroup_rental" + i).checked = true;
    }
  }
  else {
    let renglones = document.getElementById("registros_rental").rows.length;
    for (let i = 1; i < renglones; i++) {
      document.getElementById("CheckGroup_rental" + i).checked = false;
    }
  }
}
function DeleteUsers() {
  let simon = confirm("¿Estas seguro que quieres borrar todos los seleccionados?");
  if (simon) {
    let renglones = document.getElementById("registros_rental").rows.length;
    let registers = [];
    let flag_check = false;
    for (let i = 1; i < renglones; i++) {
      if (document.getElementById("CheckGroup_rental" + i).checked) {
        var x = document.getElementById("registros_rental").rows[i].cells;
        flag_check = true;
        registers.push(x[1].innerHTML);
      }
    }
    let id_to_delete = "";
    if (registers.length > 0) {
      id_to_delete = id_to_delete + registers[0];

      for (let i = 1; i < registers.length; i++) {
        id_to_delete = id_to_delete + ", " + registers[i]
      }
    }
    if (flag_check) {
      window.location.href = "delete_selected.php" + "?id_to_delete=" + id_to_delete;
    }
  } else {
    alert("Cancelando...");
  }
}

//Funcion para pasar id a delete.php
$(document).ready(function () {
  $(document).on('click', '#deletebtn', function () {
    let confirmacion = confirm('¿Estás seguro de que quieres borrar?');
    if (confirmacion) {
      let id_to_deletear = jQuery(this).val();
      window.location.href = "delete.php" + "?id_to_deletear=" + id_to_deletear;
      console.log(id_to_deletear)
    }
    else {
      alert("Eliminacion cancelada");
    }

  })
})

//Funcion para enviar datos a edit.php

$(document).ready(function () {
  $(document).on('click', '#editbtn_rental', function () {
    jQuery('#me_staff_id option:selected').removeAttr("selected");
    jQuery('#me_inventory_id option:selected').removeAttr("selected");
    jQuery('#me_customer_id option:selected').removeAttr("selected");
    const id = jQuery(this).val();
    const ide = jQuery('#id' + id).text();
    //var ide=(document).getElementById("id"+id).value

    const staff = jQuery('#staff' + id).attr('value');
    const inventory_id = jQuery('#inventory_id' + id).text();
    const customer_id = jQuery('#client' + id).attr('value');
    const return_date = jQuery('#return_date' + id).text().split(' ')
    jQuery('#edit_rental').modal('show')
    jQuery('#me_rental_id').val(ide); //id
    jQuery('#me_return_date').val(return_date[0])
    jQuery('#staff_edit_' + staff).attr('selected', 'selected');
    jQuery('#inv_edit' + inventory_id).attr('selected', 'selected');
    jQuery('#customer_edit' + customer_id).attr('selected', 'selected');

  })
})

//referencia a jquery

src = "../js/jquery-3.6.1.min.js?v=<?php echo (rand()); ?>"


//modal add new

$(document).ready(function () {
  $(document).on('click', '#add_button', function () {

    jQuery('#modal_add_rental').modal('show');
    jQuery('#m_staff_id').val('');
    jQuery('#m_customer_id').val('');
    jQuery('#m_return_date').val('');
    jQuery('#m_inventory_id').val('');
  })
})


