<?php
    session_start();
    require_once '../bdd.php';

    $idUtilisateur = $_SESSION['idUtilisateur'];

    $requeteInfoProf = $bdd->prepare("SELECT * FROM Prof WHERE idUtilisateur = :idUtilisateur");
    $requeteInfoProf->bindParam(':idUtilisateur', $idUtilisateur);
    $requeteInfoProf->execute();

    $infoProf = $requeteInfoProf->fetch(PDO::FETCH_ASSOC);

    $requeteIdProf = $bdd->prepare("SELECT idProf FROM Prof WHERE idUtilisateur = :idUtilisateur");
    $requeteIdProf->bindParam(':idUtilisateur', $idUtilisateur);
    $requeteIdProf->execute();

    $idProf = $requeteIdProf->fetch(PDO::FETCH_ASSOC);

    $_SESSION['idProfesseur'] = $idProf['idProf'];




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
    <a href="./validationProf.php">Validez les competences de mes eleves</a>
</body>
</html>