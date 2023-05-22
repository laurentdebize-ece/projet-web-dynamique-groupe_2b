<?php
    $IdEleve = $_POST["IdEleve"];
    $nomEleve = $_POST["nomEleve"];
    $prenomEleve = $_POST["prenomEleve"];
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $IdUtilisateur = $_POST["IdUtilisateur"];
    $ecole = $_POST["ecole"];
    $promo = $_POST["promo"];
    $IdClasse = $_POST["IdClasse"];
    $nomClasse = $_POST["nomClasse"];

    $nouvelEleve = "INSERT INTO 'eleve' ('IdEleve', 'nomEleve', 'prenomEleve', 'mail', 'mdp', 'IdUtilisateur', 'ecole','promo','IdClasse','nomClasse') 
    VALUES ($IdEleve, $nomEleve, $prenomEleve, $mail, $mdp, $IdUtilisateur, $ecole, $promo, $IdClasse, $nomClasse)";
    if (!$nouvelEleve) {
        echo "Erreur. Une donnée est incorect";
    } else {
        echo "Nouvel eleve ajoute avec succes. <br>";
    }

?>