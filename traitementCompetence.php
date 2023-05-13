<?php
    session_start();
    require_once 'bdd.php';

    $idCompetence = $_GET['id'];

    if(isset($_POST['choix'])){
        $eval = $_POST['choix'];
    }else{
        header('Location: competenceEleve.php?id='.$idCompetence);
    }

    //update de la competence de l'utilisateur

    $requetUpdate = $bdd->prepare("UPDATE Note SET note = :evaluation WHERE idEleve = :idEleve AND idCompetence = :idCompetence");
    $requetUpdate->bindParam(':evaluation', $eval);
    $requetUpdate->bindParam(':idEleve', $_SESSION['idEleve']);
    $requetUpdate->bindParam(':idCompetence', $idCompetence);
    $requetUpdate->execute();


    header('Location: touteCompetenceEleve.php ')
?>