<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="style/navbar.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4162108d67.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="navbar">
        <div class="navbar-left">
            <img class=logo-navbar src="assets/soodle-s-nobg.png" alt="logo Soodle">
            <p class="pages-navbar"> <a class="link-to-page" href="cours.php"> Mes cours </a> </p>
            <p class="pages-navbar"> <a class="link-to-page" href="admin.php"> Admin </a> </p>
        </div>
        <div class="navbar-right">
            <i class="fa-regular fa-bell"></i>
            <img onclick="displayProfil()" class="avatar" src="assets/avatar.jpg" alt="avatar">
        </div>
    </div>
    <div id="profil-popup">
        <div class="profil-informations">
            <img class="avatar-onclick" src="assets/avatar.jpg" alt="avatar">
            <div class="person">
                <p class="username"> Nom Prénom</p>
                <p class="usermail"> mail@mail.fr</p>
                <p class="userrole"> Administrateur</p>
            </div>

        </div>
        <hr>
        <p class="acces-profil"> <a href="profil.php"><i class="fa-regular fa-user"></i>Accéder a mon profil</a></p>
        <hr>
        <p class="disconnect"><i class="fa-solid fa-arrow-right-to-bracket"></i>Deconnexion</p>
    </div>


</body>
<script>
    function displayProfil() {
        let state = document.getElementById("profil-popup");
        if (state.style.display == "none") {
            state.style.display = "block"
        } else {
            state.style.display = "none"
        }
    }
</script>