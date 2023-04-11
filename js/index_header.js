function CerrarSesion(){
    
        let confirmacion = confirm('¿Estás seguro de que quieres salir?');
        if (confirmacion) {
            
            window.location.href = "../template/logout.php"
        }
        else {
            
        }
}