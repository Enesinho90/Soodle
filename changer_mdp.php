<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Soodle | Changer de mot de passe</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
    <link href="style/changer_mdp.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4162108d67.js" crossorigin="anonymous"></script>
</head>
<body>

<form>
    <div class="title">
        <h1> Formulaire de changement de mot de passe</h1>
    </div>
    <div class="form-input">
        <div><label for="old-password"> Mot de passe actuel :</label></div>
        <input type="password" id="old-password">

    </div>

    <br>
    <div class="form-input" >
        <div> <label for="new-password"> Nouveau mot de passe :</label> </div>
        <input type="password" id="new-password">
        </label>
    </div>

    <br>
    <div class="form-input" >
        <div><label for="new-password-repeat"> Confirmer le mot de passe : </label></div>
        <input type="password" id="new-password-repeat">

    </div>

    <br>
    <button type="submit">Changer le mot de passe</button>
</form>
</body>
</html>