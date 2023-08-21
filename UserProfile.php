<?php
session_start(); // Démarrage de la session PHP

/*******************************CLASSE*************************************/
// Création de la classe UserProfile avec ses propriétés et ses méthodes
class UserProfile {
    // Propriétés privées de la classe
    private string $nom;
    private string $prenom;
    private string $age;
    private $dateNaissance; // Type non spécifié pour la date de naissance
    private $photo;         // Type non spécifié pour la photo
    private $interets;      // Type non spécifié pour les intérêts sera specifie plus tard dans le html


    /*******************************CONSTRUCTEUR*************************************/
    // Initialisation des propriétés avec les valeurs passées en paramètre
    public function __construct(string $nom, string $prenom, string $age, $dateNaissance, $photo) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->dateNaissance = $dateNaissance;
        $this->photo = $photo;
    }


    /*******************************METHODES*************************************/
    // Méthodes d'accès (getters) pour les propriétés privées
    // Les méthodes retournent la valeur de la propriété ou une valeur par défaut si elle est vide

    //Fonction pour afficher les données du profil que je me sert pas en ce moment
    //car je les ai fais separement en bas pour avoir le controle sur l'affichage
   /* public function __toString(){
        return $this->getNom() . " " .
            $this->getPrenom() . " " .
            $this->getAge() . " " .
            $this->getDateNaissance() . " " .
            $this->getPhoto() . " " .
            $this->getInterets();

}*/
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
            return "Intérêts non définis";
        }
        return implode(", ", $this->interets); // Convertir le tableau en chaîne pour l'affichage
    }

    // Méthode d'accès (setter) pour définir les intérêts
    public function setInterets($interets) {
        $this->interets = $interets;
    }
}


/*La classe UserProfile est une représentation d'un profil utilisateur avec les propriétés privées pour le nom,
 le prénom, l'âge, la date de naissance, la photo et les centres d'intérêt. Le constructeur est utilisé pour
 initialiser ces propriétés lors de la création d'une instance de la classe.

Les méthodes d'accès (getters) permettent d'accéder aux valeurs des propriétés privées,
avec des vérifications pour fournir une valeur par défaut si la propriété est vide.
Une méthode supplémentaire (setter) est utilisée pour définir les centres d'intérêt.

La propriété $interets n'est pas initialisée dans le constructeur, et elle peut être définie plus tard à
l'aide de la méthode setInterets. La méthode getInterets utilise la fonction implode pour convertir le tableau
d'intérêts en une chaîne de caractères pour l'affichage.

Note : Les types de $dateNaissance, $photo, et $interets ne sont pas spécifiés dans ce code. Selon les besoins,
 il peut être utile de les définir explicitement pour assurer une meilleure robustesse et clarté du code.
*/