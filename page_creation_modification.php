<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="css/page_creation_modification.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4162108d67.js" crossorigin="anonymous"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body id="page_creation_modification">
<main> <?php include("initialize.php"); ?>
    <section id="creation_modification">
        <button class = "button-style" type="button">Retour</button>
        <h1>Créer / Modifier un post</h1>
        <div class = "message-file-button">
            <button class = "button-style" type="button">
                <i class="fa-regular fa-comments"></i>
                Message Text
            </button>
            <button class = "button-style" type="button">
                <i class="fa-regular fa-file"></i>
                Partage de fichier
            </button>
        </div>
    </section>
    <section class="message-file-content">
        <form id="message-file"> 
            <label for="titre-input">Titre</label>
            <input id="titre-input" type="text" placeholder="TD1 - Validation/Remise à Niveau">

            <label for="file-input">File</label>
            <input id="file-input" type="file" multiple >

            <label for="message-input">Contenue du message</label>
            <input id="message-input" type="text" placeholder="Entrez le contenue du message">

            <button id="submit-message-file" type="submit">
                <i class="fa-regular fa-paper-plane"></i>
                Publier
            </button>
        </form>
    </section>
        
</body>
</html>