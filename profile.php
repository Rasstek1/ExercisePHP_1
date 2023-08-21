<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profils</title>
    <!-- Intégration du CSS de Bootstrap via CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container mt-5">
    <h1>Profiles</h1>
    <div class="card p-3 shadow">
        <div class="profile-section">

            <?php


            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);


            require 'UserProfile.php';

            if (isset($_SESSION["userProfiles"]) && !empty($_SESSION["userProfiles"])):
                foreach ($_SESSION["userProfiles"] as $profileKey => $profile): ?>
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="uploads/<?php echo $profile->getPhoto(); ?>" class="card-img"
                                     alt="Photo de profil">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $profile->getNom() . ' ' . $profile->getPrenom(); ?></h5>
                                    <p class="card-text">Âge : <?php echo $profile->getAge(); ?></p>
                                    <p class="card-text">Date de naissance
                                        : <?php echo $profile->getDateNaissance(); ?></p>

                                    <!-- AFFICHAGE DES CENTRES D'INTERETS -->
                                    <p class="card-text">Centres d'intérêt :
                                        <?php
                                        $interets = $profile->getInterets(); // Récupère les centres d'intérêt du profil

                                        if (is_array($interets) && !empty($interets)): // Si les centres d'intérêt sont un tableau et non vides
                                            echo implode(', ', $interets); // Les convertit en une chaîne, séparée par des virgules, et les affiche
                                        elseif (!is_array($interets) && $interets !== ""): // Si les centres d'intérêt ne sont pas un tableau et ne sont pas une chaîne vide
                                            echo $interets; // Affiche directement les centres d'intérêt (peut être une chaîne déjà formatée)
                                        else:
                                            echo 'Aucun'; // Si les centres d'intérêt ne sont ni un tableau ni une chaîne non vide, affiche "Aucun"
                                        endif;
                                        ?>
                                    </p>

                                    <form action="modifier_interets.php" method="post">
                                        <input type="hidden" name="profile_key" value="<?php echo $profileKey; ?>">

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


                                            <input type="submit" value="Modifier">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun profil n'a été créé pour le moment.</p>
            <?php endif; ?>
        </div>


    </div>


</div>


<div class="mt-3">
    <a href="index.php" class="btn btn-primary">Création de profils</a>
</div>
<!-- Intégration du JS de Bootstrap via CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

