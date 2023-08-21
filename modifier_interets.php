<?php


require 'UserProfile.php';

$profileKey = $_POST['profile_key'];
$interets = $_POST['interets'] ?? [];

$profile = $_SESSION['userProfiles'][$profileKey];

$profile->setInterets($interets);

$_SESSION["userProfiles"][$profileKey] = $profile;

header("Location: profile.php");
exit;


