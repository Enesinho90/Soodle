<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Soodle | Créer une UE</title>
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
        <h1> Formulaire de création d'UE</h1>
    </div>
    <div class="form-input">
        <div><label for="code"> Code :</label></div>
        <input type="text" id="code">

    </div>

    <br>
    <div class="form-input" >
        <div> <label for="intitule"> Intitulé : </label> </div>
        <input type="text" id="intitule">
        </label>
    </div>

    <br>
    <div class="form-input" >
        <div>
            <label for="image">Image</label>
        </div>
        <div>
            <input class="file" type="file" id="image">
            <label for="image"><p class="televerse" id="upload-text"> <i class="fa-solid fa-upload"></i> Televerser votre image</p></label>
        </div>

    </div>

    <br>
    <button type="submit">Créer une UE</button>
</form>
</body>
<script>

</script>
</html>