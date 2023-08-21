<?php
session_start();
require 'UserProfile.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    $dateNaissance = $_POST["dateNaissance"];
    $interets = $_POST["interets"] ?? [];  // Récupère les centres d'intérêt ou un tableau vide si non défini

    $targetDir = "uploads/";

    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    if ($_FILES["photo"]["error"] > 0) {
        $_SESSION["error"] = "Erreur lors du téléchargement : " . $_FILES["photo"]["error"];
        header("Location: confirmation.php");
        exit;
    }

    $photoName = basename($_FILES["photo"]["name"]);
    $targetPath = $targetDir . $photoName;

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetPath)) {
        $userProfile = new UserProfile($nom, $prenom, $age, $dateNaissance, $photoName);
        $userProfile->setInterets($interets);

        $_SESSION["userProfiles"] = $_SESSION["userProfiles"] ?? [];
        $_SESSION["userProfiles"][] = $userProfile;
        $_SESSION["targetPath"] = $targetPath;
        $_SESSION["currentUserProfile"] = $userProfile;
    } else {
        $_SESSION["error"] = "Erreur lors du déplacement du fichier téléchargé.";
    }
}

header("Location: confirmation.php");
exit;
?>



