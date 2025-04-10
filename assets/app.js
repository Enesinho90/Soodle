document.addEventListener("DOMContentLoaded", () => {


    if (document.body.id === "page-contenu-ue") {
        console.log("Tu es sur la page contenu UE");
        const btn = document.getElementById("test");
        console.log(btn);
        // Mets ici ton code spécifique à cette page
    }
    if(document.body.id === "page_creation_modification") {
        console.log("Tu es sur la page création / modification");
        const btnDeMessage = document.getElementById("btnMessage");
        const btnDePartage = document.getElementById("btnPartage");
        const fileUploadContent = document.querySelectorAll(".visibleFile");

        function toggleButtons(activeBtn, inactiveBtn) {
            activeBtn.classList.add("select");
            inactiveBtn.classList.remove("select");
        }

        btnDeMessage.addEventListener("click", () => {
            toggleButtons(btnDeMessage, btnDePartage);
            fileUploadContent.forEach( (elementCourant) => {
                elementCourant.classList.add("hiddenFile");
            });
        })

        btnDePartage.addEventListener("click", () => {
            toggleButtons(btnDePartage, btnDeMessage);
            fileUploadContent.forEach( (elementCourant) => {
                elementCourant.classList.remove("hiddenFile");
            });

        })
    }
    if(document.body.id === "page-login") {


        const inputMotDePasse = document.getElementById("motdepasse-input")
        const closeEye = document.querySelector(".fa-eye-slash")
        const openEye = document.querySelector(".fa-eye")

        openEye.addEventListener("click",() => {
            inputMotDePasse .type = "text"
            openEye.classList.remove("fa-regular")
            closeEye.classList.add("fa-regular")
        })

        closeEye.addEventListener("click",() => {
            inputMotDePasse .type = "password"
            closeEye.classList.remove("fa-regular")
            openEye.classList.add("fa-regular")
        })
    }
});
document.addEventListener('DOMContentLoaded', function () {
    function displayProfil() {
        const state = document.getElementById("profil-popup");
        const profilePic = document.getElementById("profil-picture");

        profilePic.addEventListener("click", () => {
            const displayStyle = window.getComputedStyle(state).display;
            if (displayStyle === "none") {
                state.style.display = "block";
            } else {
                state.style.display = "none";
            }
        });
    }

    displayProfil();
});

document.addEventListener('DOMContentLoaded', function () {
    function displayUEs() {
        let buttonUE = document.getElementById("ueButton")
        buttonUE.classList.add("active")
        let buttonUser = document.getElementById("userButton")
        buttonUser.classList.remove("active")

        let tableUes = document.getElementById("ues")
        tableUes.classList.remove("hide")
        let tableUsers = document.getElementById("users")
        tableUsers.classList.add("hide")

        let buttonAdd = document.getElementById("add")
        buttonAdd.innerHTML = '<button class="add">Créer</button>'
        buttonAdd.onclick = function () {
            window.open(createUEUrl, "_blank");
        };
    }

    function displayUsers() {
        let buttonUE = document.getElementById("ueButton")
        buttonUE.classList.remove("active")
        let buttonUser = document.getElementById("userButton")
        buttonUser.classList.add("active")

        let tableUsers = document.getElementById("users")
        tableUsers.classList.remove("hide")
        let tableUes = document.getElementById("ues")
        tableUes.classList.add("hide")

        let buttonAdd = document.getElementById("add")
        buttonAdd.innerHTML = '<button class="add">Ajouter</button>'
        buttonAdd.onclick = function () {
            window.open(createUserUrl, "_blank");
        };
    }

    document.getElementById("ueButton").addEventListener("click", displayUEs)
    document.getElementById("userButton").addEventListener("click", displayUsers)
});

import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
