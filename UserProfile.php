<?php
//Creation de la classe UserProfile avec ses propriétés et ses méthodes

class UserProfile {
    // Propriétés privées de la classe
    private string $nom;
    private string $prenom;
    private string $age;
    private $dateNaissance; // Utilisation correcte du type "date"

    private $photo; // Utilisation correcte du type "photo"

    private $interets; // Utilisation correcte du type "interets"

    // Constructeur de la classe
    public function __construct(string $nom, string $prenom, string $age, $dateNaissance, $photo) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->dateNaissance = $dateNaissance;
        $this->photo = $photo;
    }

    // Méthodes pour accéder aux propriétés privées
    public function getNom(): string {
        if ($this->nom == "") {
            return "Nom non défini";
        }
        return $this->nom;
    }

    public function getPrenom(): string {

        if ($this->prenom == "") {
            return "Prénom non défini";
        }
        return $this->prenom;
    }

    public function getAge(): string {
        if ($this->age == "") {
            return "Âge non défini";
        }
        return $this->age;
    }

    public function getDateNaissance() {
        if ($this->dateNaissance == "") {
            return "Date de naissance non définie";
        }
        return $this->dateNaissance;
    }

    public function getPhoto() {
        if ($this->photo == "") {
            return "Photo non définie";
        }
        return $this->photo;
    }

    public function getInterets() {
        if (empty($this->interets)) {
            return "Interets non définis";
        }
        return implode(", ", $this->interets);  // Convertir le tableau en chaîne pour l'affichage
    }


    public function setInterets($interets) {
        $this->interets = $interets;
    }
}

/*Exemple d'utilisation Default
$photoUtilisateur = "lien_vers_photo.jpg";
$dateNaissanceUtilisateur = "2000-01-01"; // Format de date "AAAA-MM-JJ"
$userProfile = new UserProfile("Doe", "John", "30", $dateNaissanceUtilisateur, $photoUtilisateur);

 Accéder aux informations de l'utilisateur
echo "Nom: " . $userProfile->getNom() . "<br>";
echo "Prénom: " . $userProfile->getPrenom() . "<br>";
echo "Âge: " . $userProfile->getAge() . "<br>";
echo "Date de naissance: " . $userProfile->getDateNaissance() . "<br>";
echo "Photo: " . $userProfile->getPhoto() . "<br>";
*/