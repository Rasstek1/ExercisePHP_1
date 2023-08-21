<?php



require_once 'UserProfile.php'; // Si la classe UserProfile est définie dans un fichier séparé


if (isset($_SESSION["error"])) {
    echo '<div class="alert alert-danger" role="alert">';
    echo $_SESSION["error"];
    echo '</div>';
    unset($_SESSION["error"]); // pour effacer le message d'erreur après l'avoir affiché
}

// Vérification de la présence des données de session
if (!isset($_SESSION["targetPath"]) || !isset($_SESSION["currentUserProfile"])) {
    die("Erreur: Les données de session sont manquantes.");
}

// Récupération des données de la session
$targetPath = $_SESSION["targetPath"];
$userProfile = unserialize($_SESSION["currentUserProfile"]); // Désérialisez l'objet ici



echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '    <meta charset="UTF-8">';
echo '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '    <title>Confirmation de la création du profil</title>';
echo '    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">';
echo '</head>';



echo '<div class="container mt-5">';

echo '<h1>Confirmation de la création du profil</h1>';



if (file_exists($targetPath)) {
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
echo '        <p class="card-text mt-3"><strong>Centres d\'intérêt :</strong> ' . $userProfile->getInterets() . '</p>'; // Affichage des centres d'intérêt
echo '    </div>';
echo '</div>';


echo '<div class="mt-5 text-center">';
echo '    <a href="index.php" class="btn btn-primary">Créer un nouvel utilisateur</a>';
echo '    <a href="profile.php" class="btn btn-secondary ml-3">Voir les profils</a>';
echo '</div>';

echo '</div>'; // fin du container
echo '</body>';
echo '</html>';




