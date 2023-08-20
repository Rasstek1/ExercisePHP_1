<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profils</title>
    <!-- Intégration du CSS de Bootstrap via CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

<div class="container mt-5">
    <h1>Profiles</h1>
    <div class="card p-3 shadow">
        <div class="card-body">
            <?php
            require 'UserProfile.php';
            session_start();
            if (isset($_SESSION["userProfiles"]) && !empty($_SESSION["userProfiles"])):
                foreach ($_SESSION["userProfiles"] as $profile): ?>
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="uploads/<?php echo $profile->getPhoto(); ?>" class="card-img" alt="Photo de profil">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $profile->getNom() . ' ' . $profile->getPrenom(); ?></h5>
                                    <p class="card-text">Âge : <?php echo $profile->getAge(); ?></p>
                                    <p class="card-text">Date de naissance : <?php echo $profile->getDateNaissance(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun profil n'a été créé pour le moment.</p>
            <?php endif; ?>

            <div class="mt-3">
                <a href="index.html" class="btn btn-primary">Création de profils</a>
            </div>
        </div>
    </div>
</div>

<!-- Intégration du JS de Bootstrap via CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

