window.addEventListener('load', event => {
  console.log('page is fully loaded');
});
const customerForm = document.getElementById('customerForm');
customerForm.addEventListener('submit', function (event) {
  event.preventDefault();
  const nombreInput = document.getElementById('nnombre');
  const numTienda = document.getElementById('ntienda').value;
  const apellido = document.getElementById('napellido').value;
  const correo = document.getElementById('ncorreo').value;
  const activo = document.getElementById('nactivo').value;
  // Validar los campos del formulario
  if (nombreInput.value.trim() === '' || nombreInput.value.length < 3 ) return alert('Por favor ingrese un nombre valido.');
  if (numTienda < 1 || numTienda > 2) return alert('El ID de tienda debe ser un número entre 1 y 2.');
  if (apellido.trim() === '' || apellido.length < 3) return alert('Por favor ingrese un apellido valido');
  if (correo.trim() === '' || correo.length < 5 || !/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ .test(correo) ) return alert('El correo no es válido.');
  if (activo !== '0' && activo !== '1') return alert('El valor de activo debe ser 0 o 1.');
  // Enviar el formulario al servidor
  customerForm.submit();
});
