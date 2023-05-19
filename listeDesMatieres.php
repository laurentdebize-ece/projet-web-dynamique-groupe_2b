<?php
    session_start();
    require_once 'bdd.php';

    
    $idUtilisateur = $_SESSION['idUtilisateur'];

    $requeteInfoAdmin = $bdd->prepare("SELECT * FROM Admin WHERE idUtilisateur = :idUtilisateur");
    $requeteInfoAdmin->bindParam(':idUtilisateur', $idUtilisateur);
    $requeteInfoAdmin->execute();

    $infoAdmin = $requeteInfoAdmin->fetch(PDO::FETCH_ASSOC);


    $requeteIdAdmin = $bdd->prepare("SELECT idAdmin FROM Admin WHERE idUtilisateur = :idUtilisateur");
    $requeteIdAdmin->bindParam(':idUtilisateur', $idUtilisateur);

    $idAdmin = $requeteIdAdmin->fetch(PDO::FETCH_ASSOC);


    $_SESSION['nom'] = $infoAdmin['nomAdmin'];
    $_SESSION['prenom'] = $infoAdmin['prenomAdmin'];
    $_SESSION['mail'] = $infoAdmin['mail'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="listeDesMatieres.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestion des utilisateurs</title>
    <a class="home-link" href="accueilAdmin.php">    <i class="fa-solid fa-house"></i></a>
    <div class= account-info>
    <h1 class="page-title">Liste des Matieres</h1>
</div>
</head>
<body>

<div class="container">
  <div class="col">
    <h3 class="title">Liste des matières de l'ECE</h3>
    <h1 class="username">    
        <?php
        ?>
</h1>

  </div>
  <div class="col">
    <h3 class="title">Liste des matières de HEIP</h3>
  </div>
  <div class="col">
    <h3 class="title">Liste des matières de l'INSEEC</h3>
  </div>
  <div class="col">
    <h3 class="title">Liste complète</h3>
  </div>
</div>

</body>
</html>