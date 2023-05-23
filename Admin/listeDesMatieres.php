<?php
    session_start();
    require_once '../bdd.php';

    $requeteMatiereECE = $bdd->prepare('SELECT * FROM Matiere INNER JOIN PromoMatiere ON PromoMatiere.idMatiere = Matiere.idMatiere INNER JOIN Promo ON Promo.idPromo = PromoMatiere.idPromo INNER JOIN Ecole ON Ecole.idEcole = Promo.idEcole WHERE Ecole.idEcole = 1');
    $requeteMatiereECE->execute();
    $listeMatiereECE = $requeteMatiereECE->fetchAll(PDO::FETCH_ASSOC);

    $requeteMatiereHEIP = $bdd->prepare('SELECT * FROM Matiere INNER JOIN PromoMatiere ON PromoMatiere.idMatiere = Matiere.idMatiere INNER JOIN Promo ON Promo.idPromo = PromoMatiere.idPromo INNER JOIN Ecole ON Ecole.idEcole = Promo.idEcole WHERE Ecole.idEcole = 2');
    $requeteMatiereHEIP->execute();
    $listeMatiereHEIP = $requeteMatiereHEIP->fetchAll(PDO::FETCH_ASSOC);

    $requeteMatiereINSEEC = $bdd->prepare('SELECT * FROM Matiere INNER JOIN PromoMatiere ON PromoMatiere.idMatiere = Matiere.idMatiere INNER JOIN Promo ON Promo.idPromo = PromoMatiere.idPromo INNER JOIN Ecole ON Ecole.idEcole = Promo.idEcole WHERE Ecole.idEcole = 3');
    $requeteMatiereINSEEC->execute();
    $listeMatiereINSEEC = $requeteMatiereINSEEC->fetchAll(PDO::FETCH_ASSOC);

    

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
    <div class="liste-matiere">
      <?php
        foreach($listeMatiereECE as $matiereECE){
          echo '<div class="matiere-item">';
          echo '<p class="matiere">'.$matiereECE['nomMatiere'].'</p>';
          echo '<p class="ecole"> Ecole : '.$matiereECE['ecole'].'</p>';
          echo '<p class="promo"> Promo : '.$matiereECE['promo'].'</p>';
          echo '<p class="prof"> Professeur : '.$matiereECE['nomProf'].'</p>';
          echo '<p class="nbHeure">Nombre d"heure : '.$matiereECE['nbHeures'].' </p>';
          echo '</div>';
        }
      ?>
    </div>
  </div>
  <div class="col">
    <h3 class="title">Liste des matières de HEIP</h3>
    <div class="liste-matiere">
      <?php
        foreach($listeMatiereHEIP as $matiereHEIP){
          echo '<div class="matiere-item">';
          echo '<p class="matiere">'.$matiereHEIP['nomMatiere'].'</p>';
          echo '<p class="ecole"> Ecole : '.$matiereHEIP['ecole'].'</p>';
          echo '<p class="promo"> Promo : '.$matiereHEIP['promo'].'</p>';
          echo '<p class="prof"> Professeur : '.$matiereHEIP['nomProf'].'</p>';
          echo '<p class="nbHeure">Nombre d"heure : '.$matiereHEIP['nbHeures'].' </p>';
          echo '</div>';
        }
      ?>
      </div>
  </div>
  <div class="col">
    <h3 class="title">Liste des matières de l'INSEEC</h3>
    <div class="liste-matiere">
      <?php
        foreach($listeMatiereINSEEC as $matiereINSEEC){
          echo '<div class="matiere-item">';
          echo '<p class="matiere">'.$matiereINSEEC['nomMatiere'].'</p>';
          echo '<p class="ecole"> Ecole : '.$matiereINSEEC['ecole'].'</p>';
          echo '<p class="promo"> Promo : '.$matiereINSEEC['promo'].'</p>';
          echo '<p class="prof"> Professeur : '.$matiereINSEEC['nomProf'].'</p>';
          echo '<p class="nbHeure">Nombre d"heure : '.$matiereINSEEC['nbHeures'].' </p>';
          echo '</div>';
        }
      ?>
  </div>
</div>

</body>
</html>