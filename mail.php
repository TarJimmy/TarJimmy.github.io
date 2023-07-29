<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Envoi d'un message par formulaire</title>
</head>

<body>
    <?php
    if (isset($_POST['message'])) {
        $entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From: webmaster@monsite.fr' . "\r\n";
        $entete .= 'Reply-to: ' . $_POST['email'];

        $message = 
        '<h1>Envoi de mail depuis mon site</h1>
        <p><b>Nom : </b>' . $_POST['nom'] . '<br>
        <p><b>Prénom : </b>' . $_POST['prenom'] . '<br>
        <p><b>Société : </b>' . $_POST['societe'] . '<br>
        <p><b>Email : </b>' . $_POST['email'] . '<br>
        <p><b>Téléphone : </b>' . $_POST['telephone'] . '<br>
        <p><b>Rappel : </b>' . $_POST['day-call'] . ' à '. $_POST['hour-call'] .'<br><br>
        
        <b>Message : </b>' . htmlspecialchars($_POST['message']) . '</p>';

        
        $retour = mail('tardyjim26@gmail.com', 'Envoi depuis page Contact', $message, $entete);
        if($retour)
            echo '<p>Votre message a bien été envoyé.</p>';
    }
    ?>
</body>
</html>