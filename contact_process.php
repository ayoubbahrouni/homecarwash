<?php
    // Récupération des données du formulaire
    $to = "homecarwash.tn@gmail.com";
    $from = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
    $subject = isset($_REQUEST['subject']) ? $_REQUEST['subject'] : 'No subject';
    $number = isset($_REQUEST['number']) ? $_REQUEST['number'] : '';
    $cmessage = isset($_REQUEST['message']) ? $_REQUEST['message'] : '';

    // Validation de base pour l'email
    if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
        die("Adresse e-mail invalide");
    }

    // En-têtes de l'email
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: ". $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // Sujet de l'email
    $subject = "Vous avez un message de Home Car Wash";

    // Contenu de l'email
    $logo = 'img/logo.png';
    $link = '#';

    $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Home Car Wash Mail</title></head><body>";
    $body .= "<table style='width: 100%;'>";
    $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
    $body .= "<a href='{$link}'><img src='{$logo}' alt='Logo'></a><br><br>";
    $body .= "</td></tr></thead><tbody><tr>";
    $body .= "<td style='border:none;'><strong>Nom :</strong> {$name}</td>";
    $body .= "<td style='border:none;'><strong>Email :</strong> {$from}</td>";
    $body .= "</tr>";
    $body .= "<tr><td style='border:none;'><strong>Numéro :</strong> {$number}</td></tr>";
    $body .= "<tr><td style='border:none;'><strong>Sujet :</strong> {$subject}</td></tr>";
    $body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
    $body .= "</tbody></table>";
    $body .= "</body></html>";

    // Envoi de l'email
    $send = mail($to, $subject, $body, $headers);

    if($send) {
        echo "Email envoyé avec succès.";
    } else {
        echo "L'envoi de l'email a échoué.";
    }
?>
