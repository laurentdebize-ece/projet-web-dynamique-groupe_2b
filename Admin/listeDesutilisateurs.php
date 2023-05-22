<?php
    session_start();
    require_once '../bdd.php';

    $requeteListeProf = $bdd->prepare('SELECT * FROM Prof');
    $requeteListeProf->execute();
    $listeProf = $requeteListeProf->fetchAll(PDO::FETCH_ASSOC);

    $requeteListeEleve = $bdd->prepare('SELECT * FROM Eleve');
    $requeteListeEleve->execute();
    $listeEleve = $requeteListeEleve->fetchAll(PDO::FETCH_ASSOC);

    $requeteListeAdmin = $bdd->prepare('SELECT * FROM Admin');
    $requeteListeAdmin->execute();
    $listeAdmin = $requeteListeAdmin->fetchAll(PDO::FETCH_ASSOC);

  
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="listeDesUtilisateurs.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestion des utilisateurs</title>
    <a class="home-link" href="accueilAdmin.php">    <i class="fa-solid fa-house"></i></a>
    <div class= account-info>
    <h1 class="page-title">Liste des Utilisateurs</h1>
</div>
</head>
<body>

<div class="container">
  <div class="col">
    <h3 class="title">Liste des admins</h3>
    <?php
        foreach($listeAdmin as $admin){
          echo "<div class='user-item'>";
          echo "<p>"."<div class='user-circle'></div>".$admin['nomAdmin']." ".$admin['prenomAdmin']. "  ".$admin['mail']."</p>";
          echo "</div>";
        }
     
    ?>
        
</h1>

  </div>
  <div class="col">
    <h3 class="title">Liste des profs</h3>
      <?php
        foreach($listeProf as $prof){
          echo "<div class='user-item'>";
          echo "<p>"."<div class='user-circle'></div>".$prof['nomProf']." ".$prof['prenomProf']. "  ".$prof['mail']. "  ".$prof['nomMatiere']."</p>";
          echo "</div>";
        }
      ?>
  </div>
  <div class="col">
    <h3 class="title">Liste des élèves</h3>
        <?php
        foreach($listeEleve as $eleve){
          echo "<div class='user-item'>";
          echo "<p>"."<div class='user-circle'></div>".$eleve['nomEleve']." ".$eleve['prenomEleve']. "  ".$eleve['mail']."   ".$eleve['ecole']."   ".$eleve['promo']."</p>";
          echo "</div>";
        }
      

        ?>
  </div>
  
</div>

</body>
</html>