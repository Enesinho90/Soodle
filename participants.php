
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>Soodle | Mes Cours | Participants </title>
    <link href="style/participants.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4162108d67.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include('initialize.php')?>
    <div class="container">
        <a href="cours.php"><button class="return">Retour</button></a>
    </div>
    <div class="title">
        <h1> WE4A - Développement Web</h1>
    </div>
    <p class="title2">Participants</p>
    <div class="container-participants">

    </div>
    <div class="filters">
        <label for="name"> Nom :
            <input type="text">
        </label>
        <label for="role"> Role :
            <select id="role" name="role">
            <option value="all">Tout</option>
                <option value="admin">Administrateur</option>
                <option value="student">Etudiant</option>
                <option value="teacher">Professeur</option>
            </select>
        </label>
        <button> Filtrer</button>
    </div>
    <table id="users">
        <tr>
            <td><img class=image-table src="assets/avatar.jpg"></td>
            <td>Jean-Luc DUPONT</td>
            <td>Administrateur</td>
            <td>mail@mail.fr</td>

        </tr>
        <tr>
            <td><img class=image-table src="assets/avatar.jpg"></td>
            <td>John Snow</td>
            <td>Etudiant</td>
            <td>mailmail@mail.fr</td>

        </tr>
        <tr>
            <td><img class=image-table src="assets/avatar.jpg"></td>
            <td>Walter White</td>
            <td>Professeur, Administrateur</td>
            <td>mailmailmail@mail.fr</td>

        </tr>
        <tr>
            <td><img class=image-table src="assets/avatar.jpg"></td>
            <td>Arya Stark</td>
            <td>Etudiant</td>
            <td>mailmailmail@mail.fr</td>

        </tr>
        <tr>
            <td><img class=image-table src="assets/avatar.jpg"></td>
            <td>Jean-Luc DUPONT</td>
            <td>Adminstrateur</td>
            <td>mail@mail.fr</td>

        </tr>
        <tr>
            <td><img class=image-table src="assets/avatar.jpg"></td>
            <td>John Snow</td>
            <td>Etudiant</td>
            <td>mailmail@mail.fr</td>

        </tr>
        <tr>
            <td><img class=image-table src="assets/avatar.jpg"></td>
            <td>Walter White</td>
            <td>Professeur, Administrateur</td>
            <td>mailmailmail@mail.fr</td>

        </tr>
        <tr>
            <td><img class=image-table src="assets/avatar.jpg"></td>
            <td>Arya Stark</td>
            <td>Etudiant</td>
            <td>mailmailmail@mail.fr</td>

        </tr>
    </table>
</body>
