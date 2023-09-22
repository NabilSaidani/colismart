<?php
// Connexion à la base de données MySQL
$serveur = "localhost"; // Adresse du serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$base_de_donnees = "bootcamp"; // Nom de la base de données

 

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $base_de_donnees);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id_colis'])) {
        $id_colis = $_POST["id_colis"];
    }
    else{
        echo 'null';
    }

    if (isset($_POST['lieu'])) {
        $lieu = $_POST["lieu"];
    }
    else{
        echo 'null';
    }

    if (isset($_POST['etat'])) {
        $etat = $_POST["etat"];
    }
    else{
        echo 'null';
    }
}



 

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

 

// Préparer et exécuter la requête SQL pour insérer les données
$sql = "INSERT INTO formulairecolis (id_colis, lieu, etat) VALUES ('$id_colis', '$lieu', '$etat')";

 

if ($connexion->query($sql) === TRUE) {
    echo "Enregistrement réussi.";
} else {
    echo "Erreur : " . $sql . "<br>" . $connexion->error;
}

 

// Fermer la connexion à la base de données
$connexion->close();
?>