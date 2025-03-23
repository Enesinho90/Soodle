<!-- includes/navbar.php -->
<div class="navbar">
    <div class="navbar-left">
        <img class="logo-navbar" src="img/soodle-s-nobg.png" alt="logo Soodle">
        <p class="pages-navbar"><a class="link-to-page" href="cours.php">Mes cours</a></p>
        <p class="pages-navbar"><a class="link-to-page" href="admin.php">Admin</a></p>
    </div>
    <div class="navbar-right">
        <i class="fa-regular fa-bell"></i>
        <img onclick="displayProfil()" class="avatar" src="img/avatar.jpg" alt="avatar">
    </div>
</div>
<div id="profil-popup">
    <div class="profil-informations">
        <img class="avatar-onclick" src="avatar.jpg" alt="avatar">
        <div class="person">
            <p class="username">Nom Prédsdsdsdsdnom</p>
            <p class="usermail">mail@mail.fr</p>
            <p class="userrole">Administrateur</p>
        </div>
    </div>
    <hr>
    <p class="acces-profil"><a href="profil.php"><i class="fa-regular fa-user"></i>Accéder à mon profil</a></p>
    <hr>
    <p class="disconnect"><i class="fa-solid fa-arrow-right-to-bracket"></i>Déconnexion</p>
</div>
