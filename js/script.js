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

  });
  
//Navbar
function displayProfil() {
    let state = document.getElementById("profil-popup");
    if (state.style.display === "none" || state.style.display === "") {
        state.style.display = "block";
    } else {
        state.style.display = "none";
    }
}
