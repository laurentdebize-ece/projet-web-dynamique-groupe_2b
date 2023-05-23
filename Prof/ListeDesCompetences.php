<?php
    session_start();
    require_once '../bdd.php';

  $listeCompetence = $bdd->prepare('SELECT * FROM Competence');
  $listeCompetence->execute();
  $listeCompetence = $listeCompetence->fetchAll(PDO::FETCH_ASSOC);

  $listeTransverses = $bdd->prepare('SELECT idCompetenceTransverse, nom, description FROM CompetenceTransverse');
  $listeTransverses->execute();
  $listeTransverse = $listeTransverses->fetchAll(PDO::FETCH_ASSOC);

  


?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="listeDesCompetences.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestion des utilisateurs</title>
    <a class="home-link" href="accueilProf.php">    <i class="fa-solid fa-house"></i></a>
    <div class= account-info>
    <h1 class="page-title">Liste des competences</h1>
</div>
</head>
<body>

<div class="container">

  <div class="col">
    <h3 class="title">Liste des competences "classiques"</h3>
    <?php
    foreach($listeCompetence as $competence)
    {
      echo '<div class="competence-item">';
      echo '<p class="competence">'.$competence['nomCompetence'].'</p>';
      echo '<p class="description">'.$competence['description'].'</p>';
      echo '<p class="matiere">'.$competence['nomMatiere'].'</p>';
      echo '<p class="ecole">'.$competence['ecole'].'</p>';
      echo '<p class="promo">'.$competence['promo'].'</p>';
      echo '</div>';
    }

    ?>
  </div>

  <div class="col">
    <h3 class="title">Liste des compétences transverses</h3>
    <?php
      foreach($listeTransverse as $transverse ){
        echo '<div class="competence-item">';
        echo '<p class="competence">'.$transverse['nom'].'</p>';
        echo '<p class="description">'.$transverse['description'].'</p>';

        $listeEcole = $bdd->prepare('SELECT Ecole.ecole FROM Ecole INNER JOIN TransverseEcole ON TransverseEcole.idEcole = Ecole.idEcole INNER JOIN CompetenceTransverse ON TransverseEcole.idCompetenceTransverse = CompetenceTransverse.idCompetenceTransverse WHERE CompetenceTransverse.idCompetenceTransverse = :idCompetenceTransverse');
        $listeEcole->bindParam(':idCompetenceTransverse', $transverse['idCompetenceTransverse']);
        $listeEcole->execute();
        $listeEcole = $listeEcole->fetchAll(PDO::FETCH_ASSOC);

        echo '<p class="ecole">';
        foreach($listeEcole as $ecole){
          echo $ecole['ecole'].' ';
          echo "  |  ";
        }
        echo '</p>';






        echo '</div>';

      }
    ?>
  </div>

</div>

</body>
</html>