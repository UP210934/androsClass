 <!-- comienza pop-up para agregar -->
 <div class="container">
     <div class="modal fade" id="ventana1">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">¡REGISTRAR!</h4>
                     <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">X</button>

                 </div>
                 <div class="modal-body">
                     <div class="overflow-scroll">
                         <div class="card p-3">
                             <div class="card-header">
                                 Ingresar nuevo cliente
                             </div>
                             <form class="p-4" method="POST" id="customerForm" action="register.php">
                                 <div class="row g-2">
                                     <div class="col md">
                                         <div class="mb-3">
                                             <label class="form-label"> ID Tienda: </label>
                                             <input type="number" class="form-control" name="numTienda" id="ntienda" autofocus max="2" min="1" step="1" required>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="mb-3">
                                     <label class="form-label"> Nombre: </label>
                                     <input type="text" class="form-control" name="txtNombre" id="nnombre" autofocus required>
                                 </div>
                                 <div class="mb-3">
                                     <label class="form-label"> Apellido: </label>
                                     <input type="text" class="form-control" name="txtApellido" id="napellido" autofocus required>
                                 </div>
                                 <div class="mb-3">
                                     <label class="form-label"> Correo: </label>
                                     <input type="text" class="form-control" name="txtCorreo" id="ncorreo" autofocus required>
                                 </div>
                                 <div class="mb-3">
                                     <label class="form-label"> Activo: </label>
                                     <input type="number" class="form-control" name="numActivo" id="nactivo" autofocus max="1" min="0" step="1" pattern="\d+" required>
                                 </div>
                                 <div class="d-grid">
                                     <input type="hidden" name="oculto" value="1">
                                     <button type="submit" class="btn btn-primary">Registrar</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <script src="../js/validacionesNombre.js"></script>