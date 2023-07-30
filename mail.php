<?php
mail('tardyjim26@gmail.com', 'sujet test', 'body emaiuil', "From: test@ovh.net\r\n")
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $societe = $_POST["societe"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $message = $_POST["message"];
    $dayCall = $_POST["day-call"];
    $hourCall = $_POST["hour-call"];

    // Adresse e-mail où vous souhaitez recevoir le message
    $to = "jt@jimmy-tardy-informatique.fr";

    // Sujet de l'e-mail
    $subject = "[Site WEB]: Nouveau message de $lastname $firstname";

    // Corps du message
    $email_body = "Nom: $lastname\n";
    $email_body .= "Prénom: $firstname\n";
    $email_body .= "Société: $societe\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Téléphone: $telephone\n";
    $email_body .= "Date de rappel souhaitée: $dayCall\n";
    $email_body .= "Heure de rappel souhaitée: $hourCall\n";

    $email_body .= "Message:\n$message\n";

    // Entêtes de l'e-mail
    $headers = "From: no-reply@jimmy-tardy-informatique.fr\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=utf-8";

    // $myfile = fopen($email.".txt", "w")
    // fwrite($myfile, $txt);
    // fwrite($myfile, $email_body);
    // fclose($myfile);
    // Envoyer l'e-mail
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi de votre message.";
    }
}
?>


