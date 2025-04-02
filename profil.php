<?php include("initialize.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
    <link href="style/profil.css" rel="stylesheet">
    <title>Soodle | Profil</title>
    <script src="https://kit.fontawesome.com/4162108d67.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="title">
    <h1> Mon Profil</h1>
</div>
<div class="container-profil">
    <div class="left-profil">

        <img src="assets/avatar.jpg" class="profil-avatar">

        <label for="fileInput" class="upload-container">
         <i class="fa-solid fa-upload"></i>
        </label>
        <label for="fileInput" class="upload-container">
        <p>Changer d'avatar</p>
        </label>
        <input type="file" id="fileInput" class="hidden-input">
    </div>
    <div class="right-profil">
        <p>Nom : <span class="green"> DUPONT</span></p>
        <p>Prénom : <span class="green"> Jean-Luc</span></p>
        <p>Adresse mail : <span class="green"> mail@mail.fr</span></p>
        <p>Rôle : <span class="green"> Administrateur</span></p>
        <div>
        </div>
        <div class="buttons">
            <a href="modification_profil.php" target="_blank"><button><i class="fa-solid fa-gear"></i> Modifier mon profil</button></a>
            <a href="changer_mdp.php" target="_blank"><button><i class="fa-solid fa-key"></i> Changer de mot de passe</button></a>
        </div>
    </div>
</div>


</body>

</html>