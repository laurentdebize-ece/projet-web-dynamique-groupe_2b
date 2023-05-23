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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <a href="./validationProf.php">Validez les competences de mes eleves</a>
    <div class="menu-icon">
                <a href="../traitementLogout.php" class="icon-link"><i class="fa-solid fa-right-from-bracket"></i> </a>
                        
            </div>
</body>
</html>