//esto nos dice que color preferido tiene el navegador del usuario
const TemaNavegador = window.matchMedia("(prefers-color-scheme: dark").matches
  ? "dark"
  : "light";
console.log(TemaNavegador);

const slider = document.getElementById("slider");

const elegirTema = (theme) => {
  document.documentElement.setAttribute("data-theme", theme); //primero es el atributo que buscamos el segunda variable es la que seteamos
  //documentElementes la raiz del documento
  localStorage.setItem("theme", theme);
};

slider.addEventListener("click", () => {
  let switchtema = localStorage.getItem("theme") === "dark" ? "light" : "dark";//? si : sino 
  elegirTema(switchtema);
});

//verificar si ya hay tema
elegirTema(localStorage.getItem("theme") || TemaNavegador);
