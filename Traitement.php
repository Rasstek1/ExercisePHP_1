<?php

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
/*******************************AFFICHAGE************************************/


        // Afficher les informations du profil créé
        echo "<h2>Informations du profil créé :</h2>";
        echo "Nom : " . $userProfile->getNom() . "<br>";
        echo "Prénom : " . $userProfile->getPrenom() . "<br>";
        echo "Âge : " . $userProfile->getAge() . "<br>";
        echo "Date de naissance : " . $userProfile->getDateNaissance() . "<br>";
        echo "Photo de profil : <img src='$targetPath' alt='Photo de profil' width='100'>";
    } else {
        echo "Erreur lors du téléchargement de la photo de profil.";
    }
} else {
    echo "Accès non autorisé.";
}



?>

<a href="index.html" class="button">Aller vers la page Index</a>