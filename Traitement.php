


<?php

//Traiter les données du formulaire de création de profil et les stocker dans la session utilisateur (userProfiles)

//Demarrer la session
session_start();

// Path: Traitement.php
// Inclure la définition de la classe UserProfile
require 'UserProfile.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs des champs du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    $dateNaissance = $_POST["dateNaissance"];

    // Gérer le téléchargement de la photo de profil
    $targetDir = "uploads/"; // Dossier où stocker les photos

    // Créer le dossier "uploads" s'il n'existe pas déjà
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $photoName = basename($_FILES["photo"]["name"]);
    $targetPath = $targetDir . $photoName;

    // Déplacer le fichier téléchargé vers le dossier "uploads"
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetPath)) {
        echo "Photo de profil téléchargée avec succès.";

        // Créer un nouvel objet UserProfile avec les données récupérées
        $userProfile = new UserProfile($nom, $prenom, $age, $dateNaissance, $photoName);

        //Si le tableau de session n'existe pas, le créer
        if (!isset($_SESSION["userProfiles"])) {
            $_SESSION["userProfiles"] = [];
        }

        // Ajoutez le nouvel objet UserProfile au tableau dans la session
        $_SESSION["userProfiles"][] = $userProfile;

        /*******************************AFFICHAGE************************************/


        echo '<!DOCTYPE html>';
        echo '<html lang="en">';
        echo '<head>';
        echo '    <meta charset="UTF-8">';
        echo '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '    <title>Confirmation de la création du profil</title>';
        echo '    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">';
        echo '</head>';
        echo '<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">';

        echo '<div class="container mt-5">';

// Si l'image a été téléchargée avec succès
        $moved = move_uploaded_file($_FILES["photo"]["tmp_name"], $targetPath);
        if ($moved) {
            echo '<div class="alert alert-success" role="alert">Photo de profil téléchargée avec succès.</div>';
        } else {
            echo '<div class="alert alert-danger mt-5" role="alert">';
            echo '    Erreur lors du téléchargement de la photo de profil.';
            echo '</div>';
        }

// Affichage des informations du profil
        echo '<div class="card mt-3">';
        echo '    <div class="card-header">Informations du profil créé</div>';
        echo '    <div class="card-body">';
        echo '        <h5 class="card-title">' . $userProfile->getNom() . ' ' . $userProfile->getPrenom() . '</h5>';
        echo '        <p class="card-text">Âge : ' . $userProfile->getAge() . '</p>';
        echo '        <p class="card-text">Date de naissance : ' . $userProfile->getDateNaissance() . '</p>';
        echo '        <img src="' . $targetPath . '" alt="Photo de profil" class="img-thumbnail" style="max-width: 200px;">';
        echo '    </div>';
        echo '</div>';

        echo '<div class="mt-5 text-center">';
        echo '    <a href="index.html" class="btn btn-primary">Créer un nouvel utilisateur</a>';
        echo '    <a href="profile.php" class="btn btn-secondary ml-3">Voir les profils</a>';
        echo '</div>';

        echo '</div>'; // fin du container


        echo '</body>';
        echo '</html>';

    }
}
?>


