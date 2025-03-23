document.addEventListener("DOMContentLoaded", () => {


    if (document.body.id === "page-contenu-ue") {
      console.log("Tu es sur la page contenu UE");
      const btn = document.getElementById("test");
      console.log(btn);
      // Mets ici ton code spécifique à cette page
    }
  });
  

function displayProfil() {
    let state = document.getElementById("profil-popup");
    if (state.style.display === "none" || state.style.display === "") {
        state.style.display = "block";
    } else {
        state.style.display = "none";
    }
}
