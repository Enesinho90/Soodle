feather.replace();
function switchEyes(){
    let mdp = document.getElementById("mdp");
    let eye = document.getElementById("eye");
    if(eye.classList.contains("fa-eye-slash")){
        eye.classList.replace("fa-eye-slash", "fa-eye");
        mdp.type="text";
    }else if(eye.classList.contains("fa-eye")){
        eye.classList.replace("fa-eye", "fa-eye-slash");
        mdp.type="password";
    }

}