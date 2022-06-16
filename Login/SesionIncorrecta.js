let boton= document.getElementById("formulario")
boton.onclick=function(){
  validarFormulario()
}


/*document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("formulario")
    .addEventListener("submit", validarFormulario);
});
*/
function validarFormulario() {
  
  
  let email = document.getElementById("email").value;
  if (email.length == 0) {
    alert("No has escrito nada en el usuario");
    
  }
  let contraseña = document.getElementById("contraseña").value;
  if (contraseña.length < 2) {
    alert("La contraseña no es válida");
    
  }
  this.submit();
}

