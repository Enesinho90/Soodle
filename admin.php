
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>Soodle | Admin</title>
    <link href="style/admin.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4162108d67.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include('navbar.php'); ?>
    <div class="title">
        <h1> Mes cours</h1>
    </div>
    <div class="container">
        <div class="informations">
            <p>Il y a actuellement <span class="green">1609</span> étudiants et <span class="green">72</span> unités
                d'enseignement</p>
        </div>
        <div class="buttons">
            <button class="active" id="userButton" onclick="displayUsers()">Utilisateurs</button><button
                onclick="displayUEs()" id="ueButton">Unités
                d'enseignement</button>
        </div>
        <div id="add">
            <button onclick = 'window.open("createUser.php", "_blank")' class="add">Ajouter</button>
        </div>
        <table id="users">
            <tr>
                <td><img class=image-table src="assets/avatar.jpg"></td>
                <td>Jean-Luc DUPONT</td>
                <td>Administrateur</td>
                <td>mail@mail.fr</td>
                <td class="interact-buttons">
                    <i class="fa-solid fa-book"></i>
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td><img class=image-table src="assets/avatar.jpg"></td>
                <td>John Snow</td>
                <td>Etudiant</td>
                <td>mailmail@mail.fr</td>
                <td class="interact-buttons">
                    <i class="fa-solid fa-book"></i>
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td><img class=image-table src="assets/avatar.jpg"></td>
                <td>Walter White</td>
                <td>Professeur, Administrateur</td>
                <td>mailmailmail@mail.fr</td>
                <td class="interact-buttons">
                    <i class="fa-solid fa-book"></i>
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td><img class=image-table src="assets/avatar.jpg"></td>
                <td>Arya Stark</td>
                <td>Etudiant</td>
                <td>mailmailmail@mail.fr</td>
                <td class="interact-buttons">
                    <i class="fa-solid fa-book"></i>
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td><img class=image-table src="assets/avatar.jpg"></td>
                <td>Jean-Luc DUPONT</td>
                <td>Adminstrateur</td>
                <td>mail@mail.fr</td>
                <td class="interact-buttons">
                    <i class="fa-solid fa-book"></i>
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td><img class=image-table src="assets/avatar.jpg"></td>
                <td>John Snow</td>
                <td>Etudiant</td>
                <td>mailmail@mail.fr</td>
                <td class="interact-buttons">
                    <i class="fa-solid fa-book"></i>
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td><img class=image-table src="assets/avatar.jpg"></td>
                <td>Walter White</td>
                <td>Professeur, Administrateur</td>
                <td>mailmailmail@mail.fr</td>
                <td class="interact-buttons">
                    <i class="fa-solid fa-book"></i>
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td><img class=image-table src="assets/avatar.jpg"></td>
                <td>Arya Stark</td>
                <td>Etudiant</td>
                <td>mailmailmail@mail.fr</td>
                <td class="interact-buttons">
                    <i class="fa-solid fa-book"></i>
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
        </table>

        <table class="hide" id="ues">
            <tr>
                <td><img class=image-table src="assets/background-cours1.jpg"></td>
                <td>WE4A</td>
                <td>Technologies et programmation WEB</td>
                <td class="interact-buttons">
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td><img class=image-table src="assets/background-cours1.jpg"></td>
                <td>SY43</td>
                <td>Android development</td>
                <td class="interact-buttons">
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td><img class=image-table src="assets/background-cours1.jpg"></td>
                <td>RS40</td>
                <td>Réseaux et Cybersécurité niveau 1</td>
                <td class="interact-buttons">
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td><img class=image-table src="assets/background-cours1.jpg"></td>
                <td>SI40</td>
                <td>Systèmes d'information</td>
                <td class="interact-buttons">
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td><img class=image-table src="assets/background-cours1.jpg"></td>
                <td>WE4A</td>
                <td>Technologies et programmation WEB</td>
                <td class="interact-buttons">
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td><img class=image-table src="assets/background-cours1.jpg"></td>
                <td>SY43</td>
                <td>Android development</td>
                <td class="interact-buttons">
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td><img class=image-table src="assets/background-cours1.jpg"></td>
                <td>RS40</td>
                <td>Réseaux et Cybersécurité niveau 1</td>
                <td class="interact-buttons">
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>

        </table>

    </div>

</body>

<script>

    function displayUEs() {
        let buttonUE = document.getElementById("ueButton")
        buttonUE.classList.add("active")
        let buttonUser = document.getElementById("userButton")
        buttonUser.classList.remove("active")


        let tableUes = document.getElementById("ues")
        tableUes.classList.remove("hide")
        let tableUsers = document.getElementById("users")
        tableUsers.classList.add("hide")


        let buttonAdd = document.getElementById("add")
        buttonAdd.innerHTML = '<button class="add">Créer</button>'
        buttonAdd.onclick = function () {
            window.open("createUE.php", "_blank");
        };
    }

    function displayUsers() {
        let buttonUE = document.getElementById("ueButton")
        buttonUE.classList.remove("active")
        let buttonUser = document.getElementById("userButton")
        buttonUser.classList.add("active")


        let tableUsers = document.getElementById("users")
        tableUsers.classList.remove("hide")
        let tableUes = document.getElementById("ues")
        tableUes.classList.add("hide")

        let buttonAdd = document.getElementById("add")
        buttonAdd.innerHTML = '<button class="add">Ajouter</button>'
        buttonAdd.onclick = function () {
            window.open("createUser.php", "_blank");
        };
    }

</script>

</html>