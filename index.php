<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Soodle | Login</title>

    <link rel="stylesheet" href="style/login.css">
    <script src="https://kit.fontawesome.com/4162108d67.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

</head>

<body id="page-login">


<img class="Soodle-logo" src="assets/page-login/logo.png">


<main>

    <!-- <== section : Formulaire de connexion > -->
    <section class="login">
        <p class="slogan">Ta plateforme, ton savoir, ton avenir.</p>
        <h1>Connecte-toi à Soodle</h1>

        <form id="login-form">

            <!-- <== Champ identifiant > -->
            <label for="login-input">Identifiant</label>
            <div class="login-input-container">
                <input id="login-input" type="text" placeholder="eem.eup@soodle.fr">
                <i class="fa-regular fa-envelope"></i>
            </div>
            <!-- <== fin de Champ identifiant > -->

            <!-- <== Champ mot de passe > -->
            <label for="motdepasse-input">Mot de Passe</label>
            <div class="motdepasse-input-container">
                <input id="motdepasse-input" type="password" placeholder="Mot de Passe">
                <i class="fa-regular fa-eye"></i>
                <i class="fa-eye-slash hiddeneye"></i>
            </div>
            <!-- <== fin de Champ mot de passe > -->

            <!-- <== Bouton de connexion > plutard submit-->
            <a href="/Soodle/cours.php" class="button-style" id="submit-login-form">
                Connexion
            </a>
            <!-- <== fin de Bouton de connexion > -->

        </form>
    </section>
    <!-- <== fin de section Formulaire de connexion > -->

    <!-- <== section :  background > -->
    <div class="background">
        <img src="assets/page-login/background.png">
    </div>
    <!-- <== fin de section Fond d'écran > -->

</main>


<script src="js/script.js"></script>


</body>
</html>
