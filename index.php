<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Création de Profil</title>
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href=style.css rel="stylesheet">
</head>
<body>

<?php
session_start();
?>

<div class="container mt-5">
    <div class="card p-4 shadow">
        <div class="card-body">
            <h1 class="text-center mb-4">Formulaire de Création de Profil</h1>
            <form action="traitement.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Âge</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                </div>
                <div class="mb-3">
                    <label for="dateNaissance" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" required>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo de profil</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Centres d'intérêt</label>
                    <?php
                    $interets = ["Sport", "Musique", "Lecture", "Voyage", "Cinéma"];
                    foreach ($interets as $interet) {
                        echo '<div class="form-check">';
                        echo ' <input class="form-check-input" type="checkbox" name="interets[]" value="' . $interet . '"
                                  id="' . $interet . '">';
                        echo ' <label class="form-check-label" for="' . $interet . '">' . $interet . '</label>';
                        echo '
                </div>
                ';
                    }
                    ?>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Créer le profil</button>
                    </div>

            </form>


            <div class="mt-3 text-center">
                <a href="profile.php" class="btn btn-outline-secondary">Afficher les profils</a>
            </div>
        </div>
    </div>
</div>


<!-- Inclure les fichiers JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
