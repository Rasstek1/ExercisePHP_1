<?php

require 'UserProfile.php'; // Inclut le fichier contenant la classe UserProfile pour manipuler les objets de profil d'utilisateur.

$profileKey = $_POST['profile_key']; // Récupère la clé du profil à modifier à partir du formulaire (généralement un champ caché dans le formulaire).
$interets = $_POST['interets'] ?? []; // Récupère les centres d'intérêt mis à jour ou un tableau vide si non défini.

$profile = $_SESSION['userProfiles'][$profileKey]; // Récupère le profil d'utilisateur correspondant à partir de la session à l'aide de la clé récupérée.

$profile->setInterets($interets); // Met à jour les centres d'intérêt du profil avec les valeurs reçues.

$_SESSION["userProfiles"][$profileKey] = $profile; // Met à jour le profil dans la session avec les nouvelles valeurs.

header("Location: profile.php"); // Redirige l'utilisateur vers la page des profils, probablement pour afficher les modifications.
exit;
?>

/*Ce code est utilisé pour traiter un formulaire qui permet à un utilisateur de mettre à jour
les centres d'intérêt d'un profil spécifique. Il récupère le profil correspondant de la session,
met à jour les centres d'intérêt avec les nouvelles valeurs, puis enregistre le profil mis à jour dans la session
avant de rediriger l'utilisateur vers une page qui affiche probablement les profils.*/
