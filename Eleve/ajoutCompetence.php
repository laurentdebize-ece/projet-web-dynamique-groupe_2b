<?php
    session_start();
    require_once '../bdd.php';

    $note = 2;

    $idCompetence = $_GET['id'];

    $requeteMatiere = $bdd->prepare("SELECT idMatiere FROM Competence WHERE idCompetence = :idCompetence");
    $requeteMatiere->bindParam(':idCompetence', $idCompetence);
    $requeteMatiere->execute();

    $matieres = $requeteMatiere->fetchAll(PDO::FETCH_ASSOC);

    $ajoutCompetence = $bdd->prepare("INSERT INTO Note (idEleve, idMatiere, idCompetence, note) VALUES (:idEleve, :idMatiere, :idCompetence, :note)");
    $ajoutCompetence->bindParam(':idEleve', $_SESSION['idEleve']);
    $ajoutCompetence->bindParam(':idMatiere', $matieres[0]['idMatiere']);
    $ajoutCompetence->bindParam(':idCompetence', $idCompetence);
    $ajoutCompetence->bindParam(':note', $note);
    $ajoutCompetence->execute();

    header('Location: ./competencesGlobal.php');


?>