console.log("hola")
function sentAlert() {
  alert('ass');
}

function setUser(userNmae) {
  window.localStorage.setItem(user, userNmae);
}

function readJson() {
  // fetch('test.json')
  // .then(response => response.json())
  // .then(json => console.log(json));
  // console.log(username, passw);
}

// Flow

const formulario = document.getElementById('miFormulario');

formulario.addEventListener('submit', evento => {
  evento.preventDefault();
  console.warn('hola');
  alert('hola');
  const usuario = document.getElementById('usuario').value;
  localStorage.setItem('usuario', usuario);

  // aquí puedes agregar el código necesario para procesar el inicio de sesión
});
