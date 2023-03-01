<?php
  // Récupération des données du formulaire
  $prenom = $_POST['prenom'];
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Vérification du format des champs
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Adresse e-mail invalide");
  }

  // Envoi du mail
  $to = $email
  ;
  $subject = "Confirmation de votre message";
  $headers = "From: no-reply@monsite.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
  $message = "
  <html>
  <head>
  <title>Confirmation de votre message</title>
  </head>
  <body>
  <p>Merci pour votre message, $prenom $nom !</p>
  <p>Nous vous répondrons dans les plus brefs délais.</p>
  <p>Voici un récapitulatif de votre message :</p>
  <p>$message</p>
  </body>
  </html>
  ";
  if (mail($to, $subject, $message, $headers)) {
  echo "Message envoyé avec succès ! Un mail de confirmation vous a été envoyé à l'adresse $email";
  } else {
  echo "Erreur lors de l'envoi du message";
  }