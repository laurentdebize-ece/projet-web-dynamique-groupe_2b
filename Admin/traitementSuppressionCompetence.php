<?php

    session_start();
    require_once"../bdd.php";

    if(isset($_POST['competence']) && !empty($_POST['competence'])){
        $idCompetence = $_POST['competence'];
        $reqSuppressionCompetence = $bdd->prepare("DELETE FROM Competence WHERE idCompetence = :idCompetence");
        $reqSuppressionCompetence->bindParam(':idCompetence', $idCompetence);
        $reqSuppressionCompetence->execute();
        header('Location: ./gestionDesCompetences.php');
    }else{
        header('Location: ./gestionDesCompetences.php');
    }

?>