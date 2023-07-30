document.getElementById("contact-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Empêche l'envoi par défaut du formulaire

    // Récupérer les données du formulaire
    const formData = new FormData(event.target);

    // Envoyer les données en AJAX
    fetch("mail.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(message => {
        // Afficher le message de confirmation
        document.getElementById("confirmation-message").innerHTML = message;

        // Réinitialiser le formulaire
        document.getElementById("contact-form").reset();
    })
    .catch(error => {
        // En cas d'erreur
        console.error("Une erreur s'est produite : ", error);
    });
});