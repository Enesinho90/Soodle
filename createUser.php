<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Soodle | Créer un utilisateur</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
    <link href="style/createUE.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4162108d67.js" crossorigin="anonymous"></script>
</head>
<body>

<form>
    <div class="title">
        <h1> Formulaire de création d'utilisateur</h1>
    </div>

    <div class="form-input">
        <div><label for="nom"> Nom :</label></div>
        <input type="text" id="nom">

    </div>
    <br>

    <div class="form-input" >
        <div> <label for="prenom"> Prénom : </label> </div>
        <input type="text" id="prenom">
        </label>
    </div>
    <br>

    <div class="form-input" >
        <div> <label for="mail"> Mail : </label> </div>
        <input type="email" id="mail">
        </label>
    </div>
    <br>

    <div class="form-input" >
        <div><label for="role"> Role :</label></div>
        <select id="role" name="role">
            <option value="all">Tout</option>
            <option value="admin">Administrateur</option>
            <option value="student">Etudiant</option>
            <option value="teacher">Professeur</option>
        </select>

    </div>
    <br>

    <div class="form-input" >
        <div> <label for="mdp"> Mot de passe : </label> </div>
        <input type="password" id="mdp">
        </label>
    </div>
    <br>


    <br>
    <button type="submit">Créer un utilisateur</button>
</form>
</body>
<script>

</script>
</html>