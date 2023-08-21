<?php

session_start(); // Démarre la session pour stocker et récupérer des informations entre différentes pages.

require 'UserProfile.php'; // Inclut le fichier contenant la classe UserProfile qui est utilisée pour créer des objets de profil d'utilisateur.


//********************************VERIFICATION DES DONNEES******************************//
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Vérifie si la page a été appelée via une requête POST (typiquement un formulaire de création de profil).
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    $dateNaissance = $_POST["dateNaissance"];
    $interets = $_POST["interets"] ?? []; // Récupère les centres d'intérêt ou un tableau vide si non défini, peut-être depuis un champ de formulaire.

    $targetDir = "uploads/";// Initialise le répertoire cible pour le téléchargement des photos de profil.

    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true); // Crée le répertoire s'il n'existe pas.
    }

    if ($_FILES["photo"]["error"] > 0) {
        $_SESSION["error"] = "Erreur lors du téléchargement : " . $_FILES["photo"]["error"]; // Stocke l'erreur dans la session si le téléchargement échoue.
        header("Location: confirmation.php");
        exit;
    }

    $photoName = basename($_FILES["photo"]["name"]);
    $targetPath = $targetDir . $photoName;

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetPath)) { // Déplace le fichier téléchargé vers le répertoire cible.
        $userProfile = new UserProfile($nom, $prenom, $age, $dateNaissance, $photoName); // Crée un objet de profil avec les données récupérées.
        $userProfile->setInterets($interets);

        $_SESSION["userProfiles"] = $_SESSION["userProfiles"] ?? []; // Si non défini, initialise un tableau vide pour stocker les profils.
        $_SESSION["userProfiles"][] = $userProfile; // Ajoute le nouveau profil au tableau de profils dans la session.
        $_SESSION["targetPath"] = $targetPath; // Stocke le chemin vers la photo dans la session, utilisé dans le fichier de confirmation.
        $_SESSION["currentUserProfile"] = serialize($userProfile); // Sérialise l'objet de profil pour le stocker dans la session.
    } else {
        $_SESSION["error"] = "Erreur lors du déplacement du fichier téléchargé."; // Stocke un message d'erreur dans la session si le déplacement du fichier échoue.
    }
}

header("Location: confirmation.php"); // Redirige vers la page de confirmation où les données seront affichées.
exit;
?>

/*Ce code est un script PHP destiné à traiter la création d'un profil utilisateur à partir d'un formulaire. Voici une description détaillée de son fonctionnement:
1.	Démarrage de la session: session_start(); permet de démarrer une session afin de stocker et récupérer des informations entre différentes pages.
2.	Inclusion de la classe UserProfile: Le fichier UserProfile.php est requis, ce qui suppose qu'il contient la définition de la classe UserProfile, utilisée pour manipuler les profils d'utilisateurs.
3.	Vérification de la méthode de requête: Le code vérifie si la page a été appelée via une requête POST, généralement en réponse à la soumission d'un formulaire de création de profil.
4.	Récupération des données: Les données du profil (nom, prénom, âge, date de naissance et centres d'intérêt) sont récupérées à partir de la requête POST.
5.	Gestion du téléchargement de la photo: Le répertoire cible pour le téléchargement des photos de profil est défini, et le répertoire est créé s'il n'existe pas. Le code gère également les erreurs de téléchargement et stocke un message d'erreur dans la session si besoin.
6.	Déplacement de la photo: Si le fichier est téléchargé avec succès, il est déplacé vers le répertoire cible.
7.	Création de l'objet UserProfile: Un nouvel objet UserProfile est créé avec les données récupérées et les centres d'intérêt sont définis.
8.	Stockage des profils dans la session: Les profils d'utilisateurs sont stockés dans un tableau dans la session. Si c'est la première fois qu'un profil est créé, le tableau est initialisé.
9.	Sérialisation de l'objet UserProfile: L'objet de profil actuel est sérialisé et stocké dans la session pour être utilisé ultérieurement.
10.	Redirection: La page redirige l'utilisateur vers la page de confirmation, où les informations du profil nouvellement créé peuvent être affichées et confirmées.
11.	Gestion des erreurs: Si des erreurs se produisent lors du téléchargement ou du déplacement de la photo, des messages d'erreur sont stockés dans la session pour un traitement ultérieur.
En somme, ce code gère la création de profils d'utilisateurs, y compris le téléchargement de photos de profil, et stocke ces informations dans la session pour une utilisation ultérieure. La redirection vers la page de confirmation permet d'afficher et de vérifier les informations saisies par l'utilisateur.
Ce code est un script PHP destiné à traiter la création d'un profil utilisateur à partir d'un formulaire. Voici une description détaillée de son fonctionnement:
1.	Démarrage de la session: session_start(); permet de démarrer une session afin de stocker et récupérer des informations entre différentes pages.
2.	Inclusion de la classe UserProfile: Le fichier UserProfile.php est requis, ce qui suppose qu'il contient la définition de la classe UserProfile, utilisée pour manipuler les profils d'utilisateurs.
3.	Vérification de la méthode de requête: Le code vérifie si la page a été appelée via une requête POST, généralement en réponse à la soumission d'un formulaire de création de profil.
4.	Récupération des données: Les données du profil (nom, prénom, âge, date de naissance et centres d'intérêt) sont récupérées à partir de la requête POST.
5.	Gestion du téléchargement de la photo: Le répertoire cible pour le téléchargement des photos de profil est défini, et le répertoire est créé s'il n'existe pas. Le code gère également les erreurs de téléchargement et stocke un message d'erreur dans la session si besoin.
6.	Déplacement de la photo: Si le fichier est téléchargé avec succès, il est déplacé vers le répertoire cible.
7.	Création de l'objet UserProfile: Un nouvel objet UserProfile est créé avec les données récupérées et les centres d'intérêt sont définis.
8.	Stockage des profils dans la session: Les profils d'utilisateurs sont stockés dans un tableau dans la session. Si c'est la première fois qu'un profil est créé, le tableau est initialisé.
9.	Sérialisation de l'objet UserProfile: L'objet de profil actuel est sérialisé et stocké dans la session pour être utilisé ultérieurement.
10.	Redirection: La page redirige l'utilisateur vers la page de confirmation, où les informations du profil nouvellement créé peuvent être affichées et confirmées.
11.	Gestion des erreurs: Si des erreurs se produisent lors du téléchargement ou du déplacement de la photo, des messages d'erreur sont stockés dans la session pour un traitement ultérieur.
En somme, ce code gère la création de profils d'utilisateurs, y compris le téléchargement de photos de profil, et stocke ces informations dans la session pour une utilisation ultérieure. La redirection vers la page de confirmation permet d'afficher et de vérifier les informations saisies par l'utilisateur.




