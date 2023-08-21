<?php
session_start(); // Démarre la session pour accéder aux données stockées entre les pages.

require 'UserProfile.php'; // Inclut le fichier contenant la classe UserProfile.

// Vérifie si les centres d'intérêt sont définis dans la requête POST.
if (!isset($_POST['interets'])) {
    die('Les données POST pour les centres d\'intérêt ne sont pas définies.');
}

// Vérifie si l'objet UserProfile est stocké dans la session.
if (!isset($_SESSION['currentUserProfile'])) {
    die('L\'objet UserProfile n\'est pas dans la session.');
}

$profile = $_SESSION['currentUserProfile']; // Récupère l'objet UserProfile de la session.

$profile->setInterets($_POST['interets']); // Met à jour les centres d'intérêt de l'objet UserProfile avec les valeurs POST.

$_SESSION['currentUserProfile'] = $profile; // Met à jour l'objet UserProfile dans la session.

header("Location: profile.php"); // Redirige vers la page de profil où les informations mises à jour peuvent être affichées.
exit;
?>


/*Ce code est destiné à mettre à jour les centres d'intérêt d'un profil utilisateur dans la session.
Il commence par vérifier si les données POST nécessaires et l'objet UserProfile sont disponibles.
i l'un de ces éléments n'est pas trouvé, le script termine son exécution avec un message d'erreur.
Si tout est en ordre, le code récupère l'objet UserProfile de la session, met à jour ses centres
d'intérêt avec les valeurs fournies dans la requête POST, puis sauvegarde l'objet mis à jour dans la session.
Enfin, il redirige l'utilisateur vers la page de profil où les informations mises à jour peuvent être visualisées.

