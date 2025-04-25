document.addEventListener("DOMContentLoaded", () => {

    if (document.body.id === "page-contenu-ue") {
        const buttons = document.querySelectorAll('.delete-post-btn');

        buttons.forEach(button => {
            button.addEventListener('click', async (e) => {
                e.preventDefault();

                const postId = button.dataset.id;
                const ueId = button.dataset.ue;
                const token = button.dataset.token;

                const confirmation = confirm("Es-tu sûr de vouloir supprimer ce post ?");
                if (!confirmation) return;

                const response = await fetch(`/post/${postId}/${ueId}/delete`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `_token=${encodeURIComponent(token)}`
                });

                if (response.ok) {
                    // Supprime le post du DOM
                    const postElement = button.closest('.post');
                    if (postElement) {
                        postElement.remove();
                    }
                } else {
                    alert("Erreur lors de la suppression du post.");
                }
            });
        });
    }

    if(document.body.id === "page_creation_modification") {
        const btnDeMessage = document.getElementById("btnMessage");
        const btnDePartage = document.getElementById("btnPartage");
        const fileUploadContent = document.querySelectorAll(".visibleFile");
        const inputPostType = document.getElementById('post_type');
        const inputFile = document.getElementById('post_fichier');
        const fileName = document.getElementById('file-name');
        fileName.style.display ="none";
        //valeur initial
        inputFile.style.display = "none"
        inputFile.required = true;
        inputPostType.value = "1";


        function toggleButtons(activeBtn, inactiveBtn) {
            activeBtn.classList.add("select");
            inactiveBtn.classList.remove("select");
        }
        btnDeMessage.addEventListener("click", () => {
            toggleButtons(btnDeMessage, btnDePartage);
            fileUploadContent.forEach( (elementCourant) => { //pour enlever le label + le champ
                elementCourant.classList.add("hiddenFile");
            });
            inputPostType.value = "0"; // valeur envoyer à symfony pour avoir le bon type de fichier
            inputFile.required = false;
        })
        btnDePartage.addEventListener("click", () => {
            toggleButtons(btnDePartage, btnDeMessage);
            fileUploadContent.forEach( (elementCourant) => {
                elementCourant.classList.remove("hiddenFile");
            });
            inputPostType.value = "1"; // valeur envoyer à symfony pour avoir le bon type de fichier
            inputFile.required = true;
        })

        inputFile.addEventListener('change', () => {
            inputFile.style.display = "block";
            fileName.style.display = "block";
            document.getElementById('file-name-text').textContent = inputFile.files[0].name;
        });
    }
    if(document.body.id === "page-login") {


        const inputMotDePasse = document.getElementById("motdepasse-input")
        const closeEye = document.querySelector(".fa-eye-slash")
        const openEye = document.querySelector(".fa-eye")

        openEye.addEventListener("click",() => {
            inputMotDePasse .type = "text"
            openEye.classList.remove("fa-regular")
            closeEye.classList.add("fa-regular")
        })

        closeEye.addEventListener("click",() => {
            inputMotDePasse .type = "password"
            closeEye.classList.remove("fa-regular")
            openEye.classList.add("fa-regular")
        })
    }


    function displayProfil() {
        const state = document.getElementById("profil-popup");
        const profilePic = document.getElementById("profil-picture");

        profilePic.addEventListener("click", () => {
            const displayStyle = window.getComputedStyle(state).display;
            if (displayStyle === "none") {
                state.style.display = "block";
            } else {
                state.style.display = "none";
            }
        });
    }

    displayProfil();


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
            window.open(createUEUrl, "_blank");
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
            window.open(createUserUrl, "_blank");
        };
    }

    document.getElementById("ueButton").addEventListener("click", displayUEs)
    document.getElementById("userButton").addEventListener("click", displayUsers)

    $(document).on('click', '.delete-ue', function(event) {
        event.preventDefault();

        const button = $(this);
        const ueId = button.data('id');
        const row = button.closest('tr');

        const confirmation = confirm('Êtes-vous sûr de vouloir supprimer cette unité d\'enseignement ?');

        if (confirmation) {
            $.ajax({
                url: '/admin/delete/ue/' + ueId,
                type: 'POST',
                success: function(response) {
                    if (response.status === 'success') {
                        // Remove the row from the table
                        row.fadeOut(300, function() {
                            $(this).remove();
                        });
                    } else {
                        alert('Erreur: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erreur AJAX:', error);
                    alert('Une erreur est survenue lors de la suppression.');
                }
            });
        }
    });

    // User deletion handler
    $(document).on('click', '.delete-user', function(event) {
        event.preventDefault();

        const button = $(this);
        const userId = button.data('id');
        const row = button.closest('tr');

        const confirmation = confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');

        if (confirmation) {
            $.ajax({
                url: '/admin/delete/user/' + userId,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === 'success') {
                        // Remove the row with animation
                        row.fadeOut(300, function() {
                            $(this).remove();
                        });
                    } else {
                        alert('Erreur: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erreur AJAX:', error);
                    alert('Une erreur est survenue lors de la suppression de l\'utilisateur.');
                }
            });
        }
    });
});



import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
