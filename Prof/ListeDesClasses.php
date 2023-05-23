<?php
    session_start();
    require_once '../bdd.php';

    $requeteClassesECE = $bdd->prepare('SELECT * FROM classe INNER JOIN matiereClasse ON classe.idClasse = matiereClasse.idClasse INNER JOIN matiere ON matiere.idMatiere = matiereClasse.idMatiere INNER JOIN prof ON prof.idProf = matiere.idProf INNER JOIN promo ON promo.idPromo = classe.idPromo INNER JOIN ecole ON ecole.idEcole = ecole.idEcole WHERE Ecole.idEcole = 1 AND matiere.idProf = :idProf');
    $requeteClassesECE->bindParam(':idProf', $_SESSION['idProfesseur']);
    $requeteClassesECE->execute();
    $listeClassesECE = $requeteClassesECE->fetchAll(PDO::FETCH_ASSOC);

    $requeteClassesHEIP = $bdd->prepare('SELECT * FROM classe INNER JOIN matiereClasse ON classe.idClasse = matiereClasse.idClasse INNER JOIN matiere ON matiere.idMatiere = matiereClasse.idMatiere INNER JOIN prof ON prof.idProf = matiere.idProf INNER JOIN promo ON promo.idPromo = classe.idPromo INNER JOIN ecole ON ecole.idEcole = ecole.idEcole WHERE Ecole.idEcole = 2 AND prof.idProf = :idProf');
    $requeteClassesHEIP->bindParam(':idProf', $_SESSION['idProfesseur']);    
    $requeteClassesHEIP->execute();
    $listeClassesHEIP = $requeteClassesHEIP->fetchAll(PDO::FETCH_ASSOC);

    $requeteClassesINSEEC = $bdd->prepare('SELECT * FROM classe INNER JOIN matiereClasse ON classe.idClasse = matiereClasse.idClasse INNER JOIN matiere ON matiere.idMatiere = matiereClasse.idMatiere INNER JOIN prof ON prof.idProf = matiere.idProf INNER JOIN promo ON promo.idPromo = classe.idPromo INNER JOIN ecole ON ecole.idEcole = ecole.idEcole WHERE Ecole.idEcole = 3 AND prof.idProf = :idProf');
    $requeteClassesINSEEC->bindParam(':idProf', $_SESSION['idProfesseur']);    
    $requeteClassesINSEEC->execute();
    $listeClassesINSEEC = $requeteClassesINSEEC->fetchAll(PDO::FETCH_ASSOC);

    

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ListesDesClasses.css">
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
    <h3 class="title">Vos classes à l'ECE</h3>
    <div class="liste-matiere">
      <?php
        foreach($listeClassesECE as $ClassesECE){
          echo '<div class="matiere-item">';
          echo '<p class="matiere">'.$ClassesECE['nomClasse'].'</p>';
          echo '<p class="ecole"> Ecole : '.$ClassesECE['ecole'].'</p>';
          echo '<p class="promo"> Promo : '.$ClassesECE['promo'].'</p>';
          echo '<p class="nbHeure">Nombre d"heure : '.$ClassesECE['nbHeures'].' </p>';
          echo '</div>';
        }
      ?>
    </div>
  </div>
  <div class="col">
    <h3 class="title">Vos classes à HEIP</h3>
    <div class="liste-matiere">
      <?php
        foreach($listeClassesHEIP as $ClassesHEIP){
            echo '<div class="matiere-item">';
            echo '<p class="matiere">'.$ClassesHEIP['nomClasse'].'</p>';
            echo '<p class="ecole"> Ecole : '.$ClassesHEIP['ecole'].'</p>';
            echo '<p class="promo"> Promo : '.$ClassesHEIP['promo'].'</p>';
            echo '<p class="nbHeure">Nombre d"heure : '.$ClassesHEIP['nbHeures'].' </p>';
            echo '</div>';
          }
      ?>
      </div>
  </div>
  <div class="col">
    <h3 class="title">Vos classes à l'INSEEC</h3>
    <div class="liste-matiere">
      <?php
        foreach($listeClassesINSEEC as $ClassesINSEEC){
            echo '<div class="matiere-item">';
            echo '<p class="matiere">'.$ClassesINSEEC['nomClasse'].'</p>';
            echo '<p class="ecole"> Ecole : '.$ClassesINSEEC['ecole'].'</p>';
            echo '<p class="promo"> Promo : '.$ClassesINSEEC['promo'].'</p>';
            echo '<p class="nbHeure">Nombre d"heure : '.$ClassesINSEEC['nbHeures'].' </p>';
            echo '</div>';
          }
      ?>
  </div>
</div>

</body>
</html>