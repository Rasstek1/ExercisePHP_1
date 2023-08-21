<?php
session_start();
require 'UserProfile.php';

if (!isset($_POST['interets'])) {
    die('Les données POST pour les centres d\'intérêt ne sont pas définies.');
}

if (!isset($_SESSION['currentUserProfile'])) {
    die('L\'objet UserProfile n\'est pas dans la session.');
}

$profile = $_SESSION['currentUserProfile'];
$profile->setInterets($_POST['interets']);
$_SESSION['currentUserProfile'] = $profile;

header("Location: profile.php");
exit;


