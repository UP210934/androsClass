function SeleccionarTodo() {
  if (document.getElementById("SelectAll").checked) {
    let renglones = document.getElementById("registros").rows.length;
    for (let i = 1; i < renglones; i++) {
      document.getElementById("CheckGroup" + i).checked = true;
    }
  }
  else {
    let renglones = document.getElementById("registros").rows.length;
    for (let i = 1; i < renglones; i++) {
      document.getElementById("CheckGroup" + i).checked = false;
    }
  }
}
function DeleteUsers() {
  let simon = confirm("¿Estas seguro que quieres borrar todos los seleccionados?");
  if (simon) {
    let renglones = document.getElementById("registros").rows.length;
    let registers = [];
    let flag_check = false;
    for (let i = 1; i < renglones; i++) {
      if (document.getElementById("CheckGroup" + i).checked) {
        var x = document.getElementById("registros").rows[i].cells;
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
  $(document).on('click', '#editbtn', function () {
    jQuery('#cbx_pais option:selected').removeAttr("selected");
    // jQuery('#cbx_estado option:selected').removeAttr("selected");
    var id = jQuery(this).val();
    console.log(id);
    //var id=(document).getElementById("editbtn").value
    var ide = jQuery('#id' + id).text();
    console.log(ide);
    //var ide=(document).getElementById("id"+id).value

    var nombre = jQuery('#nombre' + id).text();
    var tienda = jQuery('#tienda' + id).text();
    var apellido = jQuery('#apellido' + id).text();
    var email = jQuery('#email' + id).text();
    var active = jQuery('#active' + id).text();

    console.log(nombre);

    jQuery('#edit_cliente').modal('show')
    jQuery('#mid').val(ide); //id
    jQuery('#mtienda').val(tienda);
    jQuery('#mnombre').val(nombre);
    jQuery('#mapellido').val(apellido);
    jQuery('#mcorreo').val(email);
    jQuery('#mactivo').val(active);
    // console.log(mpais);

  })
})

//referencia a jquery

src = "../js/jquery-3.6.1.min.js?v=<?php echo (rand()); ?>"

//enviar id_pais a getEstado para obtener estados correspondientes   ,,,,, edita

$(document).ready(function () {
  // console.log("hey queondaa estoy en jquery");
  $("#cbx_pais").change(function () {
    // console.log("Hizo change")
    $("#cbx_pais option:selected").each(function () {
      id_pais = $(this).val();
      //console.log("despues de option selected")
      // console.log(id_pais)
      $.post("getEstado.php", {
        id_pais: id_pais
      }, function (data) {
        $("#cbx_estado").html(data);
      });
    });
  })
});

//enviar id_pais a getEstado para obtener estados correspondientes ,,, para agregar

$(document).ready(function () {
  // console.log("hey queondaa estoy en jquery");
  $("#cbx_paises").change(function () {
    // console.log("Hizo el cambio");
    $("#cbx_paises option:selected").each(function () {
      id_pais = $(this).val();
      //console.log("despues de option selected")
      // console.log(id_pais)

      $.post("getEstado.php", {
        id_pais: id_pais
      }, function (data) {
        $("#cbx_estados").html(data);
      });
    });
  })
});

$(document).ready(function () {
  $(document).on('click', '#add_button', function () {

    jQuery('#ventana1').modal('show');
  })
})


//search bar
