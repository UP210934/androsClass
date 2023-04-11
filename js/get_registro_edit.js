//function editar(){
   
    $(document).ready(function(){
        $(document).on('click', '#editbtn', function(){
      var id=jQuery(this).val();
    
    
       //var id=(document).getElementById("editbtn").value
    console.log(id)
    
            var ide= jQuery('#id'+id).text();
            //var ide=(document).getElementById("id"+id).value
            console.log(ide);
            var nombre= jQuery('#nombre'+id).text();
            var nivel= jQuery('#nivel'+id).text();
            var n2= jQuery('#n2'+id).text();
    
           
            jQuery('#edit_tipo_usuario').modal('show')
            jQuery('#mid').val(ide);
            jQuery('#mnombre').val(nombre);
            jQuery('#mnivel').val(nivel);
            jQuery('#mn2').val(n2);
        } )
    })
//}
