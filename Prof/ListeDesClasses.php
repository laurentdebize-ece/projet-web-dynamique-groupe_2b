<?php
    session_start();
    require_once '../bdd.php';

    $idProf = $_SESSION['idProfesseur'];

    $reqClasseEce = $bdd->prepare('SELECT Classe.idClasse, Classe.nomClasse, Ecole.ecole, Promo.promo, Matiere.nbHeures, Matiere.nomMatiere FROM Classe INNER JOIN Promo ON Promo.idPromo = Classe.idPromo INNER JOIN Ecole ON Ecole.idEcole = Promo.idEcole INNER JOIN MatiereClasse ON MatiereClasse.idClasse = Classe.idClasse INNER JOIN Matiere ON Matiere.idMatiere = MatiereClasse.idMatiere WHERE Matiere.idProf = :idProf AND Ecole.idEcole = 1');
    $reqClasseEce->bindParam(':idProf', $idProf);
    $reqClasseEce->execute();
    $listeClasseEce = $reqClasseEce->fetchAll(PDO::FETCH_ASSOC);

    $reqClasseHEIP = $bdd->prepare('SELECT Classe.idClasse, Classe.nomClasse, Ecole.ecole, Promo.promo, Matiere.nbHeures, Matiere.nomMatiere FROM Classe INNER JOIN Promo ON Promo.idPromo = Classe.idPromo INNER JOIN Ecole ON Ecole.idEcole = Promo.idEcole INNER JOIN MatiereClasse ON MatiereClasse.idClasse = Classe.idClasse INNER JOIN Matiere ON Matiere.idMatiere = MatiereClasse.idMatiere WHERE Matiere.idProf = :idProf AND Ecole.idEcole = 2');
    $reqClasseHEIP->bindParam(':idProf', $idProf);
    $reqClasseHEIP->execute();
    $listeClasseHEIP = $reqClasseHEIP->fetchAll(PDO::FETCH_ASSOC);

    $reqClasseINSEEC = $bdd->prepare('SELECT Classe.idClasse, Classe.nomClasse, Ecole.ecole, Promo.promo, Matiere.nbHeures, Matiere.nomMatiere FROM Classe INNER JOIN Promo ON Promo.idPromo = Classe.idPromo INNER JOIN Ecole ON Ecole.idEcole = Promo.idEcole INNER JOIN MatiereClasse ON MatiereClasse.idClasse = Classe.idClasse INNER JOIN Matiere ON Matiere.idMatiere = MatiereClasse.idMatiere WHERE Matiere.idProf = :idProf AND Ecole.idEcole = 3');
    $reqClasseINSEEC->bindParam(':idProf', $idProf);
    $reqClasseINSEEC->execute();
    $listeClasseINSEEC = $reqClasseINSEEC->fetchAll(PDO::FETCH_ASSOC);




    

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
    <a class="home-link" href="accueilProf.php">    <i class="fa-solid fa-house"></i></a>
    <div class= account-info>
    <h1 class="page-title">Liste des Matières</h1>
</div>
</head>
<body>

<div class="container">
  <div class="col">
    <h3 class="title">Vos matieres à l'ECE</h3>
    <div class="liste-matiere">
      <?php
        foreach($listeClasseEce as $ClassesECE){
          echo '<div class="matiere-item">';
          echo '<p class="ecole"> Nom de la matiere : '.$ClassesECE['nomMatiere'].'</p>';
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
    <h3 class="title">Vos matières à HEIP</h3>
    <div class="liste-matiere">
      <?php
        foreach($listeClasseHEIP as $ClassesHEIP){
            echo '<div class="matiere-item">';
            echo '<p class="ecole"> Nom de la matiere : '.$ClassesHEIP['nomMatiere'].'</p>';
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
    <h3 class="title">Vos matières à l'INSEEC</h3>
    <div class="liste-matiere">
      <?php
        foreach($listeClasseINSEEC as $ClassesINSEEC){
            echo '<div class="matiere-item">';
            echo '<p class="ecole"> Nom de la matiere : '.$ClassesINSEEC['nomMatiere'].'</p>';
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