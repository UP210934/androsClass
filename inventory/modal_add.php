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
                         <div class="card">
                             <div class="card-header">
                                 Ingresar nuevo cliente
                             </div>
                             <form class="p-4" method="POST" action="register.php">
                                 <div class="row g-2">
                                     <div class="col md">
                                         <div class="mb-3">
                                             <label class="form-label"> ID Film: </label>
                                             <input type="number" class="form-control" name="film" id="mfilm" autofocus min="1" step="1" required>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row g-2">
                                     <div class="col md">
                                         <div class="mb-3">
                                             <label class="form-label"> ID Store: </label>
                                             <input type="number" class="form-control" name="store" id="mstore" autofocus max="2" min="1" step="1" required>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="d-grid">
                                     <input type="hidden" name="oculto" value="1">
                                     <button type="submit" class="btn btn-primary">Registrar</button>
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