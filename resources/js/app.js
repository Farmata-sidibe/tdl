import "./bootstrap";
import Alpine from "alpinejs";
import Datepicker from 'flowbite-datepicker/Datepicker';

window.Alpine = Alpine;
Alpine.start();
// Get all navigation links
const btnLinks = document.querySelectorAll(".btn-link");
const btns = document.querySelectorAll(".btns");


// Function to handle click event
function handleClick(event) {
    // Remove 'active' class from all links
    btnLinks.forEach((link) => {
        link.classList.remove("active");
    });

    btns.forEach((link) => {
        link.classList.remove("active");
    });

    // Add 'active' class to the clicked link
    event.target.classList.add("active");
}

// Add click event listener to all navigation links
btnLinks.forEach((link) => {
    link.addEventListener("click", handleClick);
});

btns.forEach((link) => {
    link.addEventListener("click", handleClick);
});



// const datepickerEl = document.getElementById('datepickerId');
// new Datepicker(datepickerEl, {
//     // options
// });

// SHOW params
let btnProfile = document.getElementById("profile");
let btnDescription = document.getElementById("description");
let btnBancaire = document.getElementById("bancaire");
let btnCagnotte = document.getElementById("cagnotte");
let btnHistorique = document.getElementById("historique");







let blocDescription = document.querySelector(".description");
let blocProfile = document.querySelector(".profile");
let blocBancaire = document.querySelector(".bancaire");
let blocCagnotte = document.querySelector(".cagnotte");
let blocHistorique = document.querySelector(".historique");








btnProfile.onclick = function () {
    console.log('click')
    blocProfile.style.display = "flex";
    blocDescription.style.display = "none";
    blocBancaire.style.display = "none";

};



btnProfile.onclick = function () {
    console.log('click')
    blocProfile.style.display = "flex";
    blocDescription.style.display = "none";
    blocBancaire.style.display = "none";

};

btnDescription.onclick = function () {
    blocProfile.style.display = "none";
    blocDescription.style.display = "flex";
    blocBancaire.style.display = "none";
    blocHistorique.style.display = "none";
    blocCagnotte.style.display = "none";

};
btnBancaire.onclick = function () {
    blocProfile.style.display = "none";
    blocDescription.style.display = "none";
    blocHistorique.style.display = "none";
    blocCagnotte.style.display = "none";
    blocBancaire.style.display = "flex";
};

btnCagnotte.onclick = function () {
    blocProfile.style.display = "none";
    blocDescription.style.display = "none";
    blocBancaire.style.display = "none";
    blocHistorique.style.display = "none";
    blocCagnotte.style.display = "flex";

};

btnHistorique.onclick = function () {
    blocProfile.style.display = "none";
    blocDescription.style.display = "none";
    blocBancaire.style.display = "none";
    blocCagnotte.style.display = "none";
    blocHistorique.style.display = "flex";


};


// Fonction pour afficher/cacher un bloc
// function displayBloc(id) {
//     const bloc = document.getElementsByClassName(id);
//     const otherBlocs = document.querySelectorAll('.bloc');

//     // Rendre tous les autres blocs invisibles
//     otherBlocs.forEach((autreBloc) => {
//         if (autreBloc !== bloc) {
//             autreBloc.style.display = 'none';
//         }
//     });

//     // Afficher ou cacher le bloc actuel
//     if (bloc.style.display === 'none') {
//         bloc.style.display = 'flex';
//     } else {
//         bloc.style.display = 'none';
//     }
// }

