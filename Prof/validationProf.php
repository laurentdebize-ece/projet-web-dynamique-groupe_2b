<?php
    session_start();
    require_once '../bdd.php';

    $idUtilisateur = $_SESSION['idUtilisateur'];

    $requetesCompetencesValidation = $bdd->prepare("SELECT Competence.nomCompetence, Eleve.nomEleve FROM Competence INNER JOIN Note ON Competence.idCompetence = Note.idCompetence INNER JOIN Matiere ON Matiere.idMatiere = Note.idMatiere INNER JOIN Eleve ON Eleve.idEleve = Note.idEleve WHERE Matiere.idProf = :idProf AND Note.Validation = 1");
    $requetesCompetencesValidation->bindParam(':idProf', $_SESSION['idProfesseur']);
    $requetesCompetencesValidation->execute();

    $competencesValidation = $requetesCompetencesValidation->fetchAll(PDO::FETCH_ASSOC);


    print_r($competencesValidation);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>