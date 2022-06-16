document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("formulario")
    .addEventListener("submit", validarFormulario);
});

function validarFormulario(evento) {
  evento.preventDefault();
  var email = document.getElementById("email").value;
  if (email.length == 0) {
    alert("No has escrito nada en el usuario");
    return;
  }
  var contraseña = document.getElementById("contraseña").value;
  if (contraseña.length < 2) {
    alert("La contraseña no es válida");
    return;
  }
  this.submit();
}
