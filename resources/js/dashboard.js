import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

let btnEnvie = document.getElementById("envies");
let btnParticipant = document.getElementById("donateurs");

let blocEnvie = document.querySelector(".envies");
let blocParticipant = document.querySelector(".donateurs");

btnEnvie.onclick = function () {
    console.log('click')

    blocEnvie.style.display = "flex";
    blocParticipant.style.display = "none";

};

btnParticipant.onclick = function () {
    console.log('click')

    blocParticipant.style.display = "flex";
    blocEnvie.style.display = "none";

};
