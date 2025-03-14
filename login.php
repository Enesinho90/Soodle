<!doctype html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/4162108d67.js" crossorigin="anonymous"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Se connecter | Soodle</title>
</head>
<body>
<div class="connexion">

    <form  onsubmit="return validateForm()">
        <input type="text" placeholder="Nom d'utilisateur" id="login" required > <br>
        <input type="password" placeholder="Mot de passe" id="mdp" required >
        <i id="eye" class=" fa-solid fa-eye-slash" onclick="switchEyes()" role="button" aria-label="Afficher/Masquer le mot de passe"></i>

        <input type="submit" value="Connexion">
    </form>

</div>


<script src="script.js"></script>
</body>

</html>
