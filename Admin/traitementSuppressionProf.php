<?php
    session_start();
    require_once '../bdd.php';

    $idProfesseur = $_POST['prof'];
    
    $requeteId = $bdd->prepare("SELECT idUtilisateur FROM Prof WHERE idProf = :id");
    $requeteId->bindParam(':id', $idProfesseur);
    $requeteId->execute();
    $id = $requeteId->fetch(PDO::FETCH_ASSOC);

    $requeteSuppression = $bdd->prepare("DELETE FROM Utilisateur WHERE idUtilisateur = :id");
    $requeteSuppression->bindParam(':id', $id['idUtilisateur']);
    $requeteSuppression->execute();

    header('Location: ./gestionDesProfs.php');

    
    

    

?>