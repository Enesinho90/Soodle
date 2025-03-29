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
  <!-- ====== Section : création / modification ====== -->
   <section id="creation_modification">
        <!-- Bouton retour -->
        <button class="button-style" type="button">Retour</button>

        <!-- Titre principal -->
        <h1>Créer / Modifier un post</h1>

        <!-- Boutons pour choisir le type de contenu -->
        <div class="message-file-button">
            <button id="btnPartage" class="button-style select" type="button">
                <i class="fa-regular fa-file"></i>
                Partage de fichier
            </button>

            <button id="btnMessage" class="button-style" type="button">
                <i class="fa-regular fa-comments"></i>
                Message Text
            </button>
            
        </div>
    </section>
    <!-- Fin : creation_modification -->


    <!-- ====== Section : message-file-content ====== -->
    <section id="message-file-content">
        <form id="message-file"> 

            <!-- Champ : Titre -->
            <label for="title-input">Titre</label>
            <input 
                id="title-input" 
                type="text" 
                placeholder="TD1 - Validation/Remise à Niveau"
            >

            <!-- Titre section fichiers -->
            <p class="file-upload-label  visibleFile ">Fichier</p>

            <!-- Zone custom d'upload de fichiers -->
            <div class="custom-file-upload  visibleFile">
                <label for="file-input">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <span>Choisissez un fichier ou glissez-le ici</span>
                </label>
                <input 
                id="file-input" 
                type="file" 
                multiple
                >
            </div>

            <!-- Champ : Contenu du message -->
            <label for="message-input">Contenu du message</label>
            <textarea 
                id="message-input" 
                placeholder="Entrez le contenu du message"
            ></textarea>


            <!-- Bouton de soumission -->
            <button id="submit-message-file" type="submit">
                <i class="fa-regular fa-paper-plane"></i>
                Publier
            </button>

        </form>
    </section>
     <!-- Fin : message-file-content -->

    <script src="js/script.js"></script>    
</body>
</html>