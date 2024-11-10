import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

// affichage des produits
let btnPoussette = document.getElementById("poussette");
let btnChambre = document.getElementById("chambre");
let btnMode = document.getElementById("mode");
let btnAllaitement = document.getElementById("allaitement");
let btnEveil = document.getElementById("eveil");
let btnAutre = document.getElementById("autres");
let btnToilette = document.getElementById("toilettes");



let blocPoussette = document.querySelector(".poussette");
let blocChambre = document.querySelector(".chambre");
let blocMode = document.querySelector(".mode");
let blocAllaitement = document.querySelector(".allaitement");
let blocEveil = document.querySelector(".eveil");
let blocAutre = document.querySelector(".autres");
let blocToilette = document.querySelector(".toilettes");



btnPoussette.onclick = function () {
    console.log('poussettes');
    blocPoussette.style.display = "flex";
    blocMode.style.display = "none";
    blocAllaitement.style.display = "none";
    blocEveil.style.display = "none";
    blocAutre.style.display = "none";
    blocChambre.style.display = "none";
    blocToilette.style.display = "none";


};


btnChambre.onclick = function () {
    console.log('poussettes');
    blocPoussette.style.display = "none";
    blocMode.style.display = "none";
    blocAllaitement.style.display = "none";
    blocEveil.style.display = "none";
    blocAutre.style.display = "none";
    blocToilette.style.display = "none";

    blocChambre.style.display = "flex";
};

btnMode.onclick = function () {
    blocPoussette.style.display = "none";
    blocChambre.style.display = "none";
    blocAllaitement.style.display = "none";
    blocEveil.style.display = "none";
    blocAutre.style.display = "none";
    blocToilette.style.display = "none";

    blocMode.style.display = "flex";
};
btnAllaitement.onclick = function () {
    blocPoussette.style.display = "none";
    blocChambre.style.display = "none";
    blocMode.style.display = "none";
    blocEveil.style.display = "none";
    blocAutre.style.display = "none";
    blocToilette.style.display = "none";

    blocAllaitement.style.display = "flex";
};

btnEveil.onclick = function () {
    console.log("eveil");
    blocPoussette.style.display = "none";
    blocChambre.style.display = "none";
    blocMode.style.display = "none";
    blocAllaitement.style.display = "none";
    blocAutre.style.display = "none";
    blocToilette.style.display = "none";

    blocEveil.style.display = "flex";
};

btnAutre.onclick = function () {
    blocPoussette.style.display = "none";
    blocChambre.style.display = "none";
    blocMode.style.display = "none";
    blocAllaitement.style.display = "none";
    blocAutre.style.display = "flex";
    blocToilette.style.display = "none";

    blocEveil.style.display = "none";
};

btnToilette.onclick = function () {
    blocPoussette.style.display = "none";
    blocChambre.style.display = "none";
    blocMode.style.display = "none";
    blocAllaitement.style.display = "none";
    blocEveil.style.display = "none";
    blocAutre.style.display = "none";
    blocToilette.style.display = "flex";
};


