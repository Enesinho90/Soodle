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