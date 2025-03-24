<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Contenu UE</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/navbar.css">
  <script src="https://kit.fontawesome.com/4162108d67.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

</head>
<body id="page-contenu-ue">
<main> <?php include("initialize.php"); ?>
  <!-- ====== Section : contenu-ue ====== -->
  <section id="contenu-ue">
    <!-- Bouton de retour -->
    <button class="button-style" type="button">Retour</button>
    <!-- Titre principal -->
    <h1>WE4A - Développement Web</h1>
    <!-- Sous-titre participants -->
    <p class="participants">Participants</p>
    <!-- Titre des publications -->
    <h2 class="publications">Publications</h2>
    <!-- Zone de recherche + bouton d'ajout -->
    <div class="barre-recherche-ajouter">
      <!-- Barre de recherche -->
      <div class="barre-recherche-container">
        <input class="barre-recherche" type="text" placeholder="Recherche un post">
        <button class="recherche-btn">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
      <!-- Bouton d'ajout -->
      <button class="button-add" type="button">
        <i class="fa-solid fa-plus"></i>
      </button>
    </div>
  </section>
  <!-- ====== Fin section : contenu-ue ====== -->
  
  
  
  <!-- ====== Section : Posts ====== -->
  <section id="posts">
    <!-- Un post -->
    <div class="post">
      <div class="titre-logo">
        <i class="fa-regular fa-message"></i>
        <h3>TD1 - Validation/Remise à Niveau</h3>
      </div>
      <p>Posté par M.Dupont il y a 2j</p>
      <div class="contenu-message"> Le prochain cours se déroulera en B204 </div>
      <div class="ajouter-modifier">
        <button class="button-ajouter" type="button">Ajouter</button>
        <button class="button-modifier" type="button">Modifier</button>
      </div>
      <hr>
    </div>
    <!-- Deuxième post identique pour l'exemple -->
    <div class="post">
      <div class="titre-logo">
        <i class="fa-regular fa-message"></i>
        <h3>TD1 - Validation/Remise à Niveau</h3>
      </div>
      <p>Posté par M.Dupont il y a 2j</p>
      <div class="contenu-message"> Le prochain cours se déroulera en B204 </div>
      <div class="ajouter-modifier">
        <button class="button-ajouter" type="button">Ajouter</button>
        <button class="button-modifier" type="button">Modifier</button>
      </div>
      <hr>
    </div>
  </section>
  <!-- ====== Fin section : Posts ====== -->
</main>


  <script src="js/script.js"></script>
</body>
</html>
