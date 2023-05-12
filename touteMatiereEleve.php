<?php
session_start();
require_once 'bdd.php';

$requeteMatiere = $bdd->prepare("SELECT Matiere.nomMatiere, Matiere.idMatiere FROM Matiere INNER JOIN MatiereClasse ON Matiere.idMatiere = MatiereClasse.idMatiere INNER JOIN Classe ON MatiereClasse.idClasse = Classe.idClasse INNER JOIN Eleve ON Eleve.idClasse = Classe.idClasse WHERE idEleve = :idEleve");
$requeteMatiere->bindParam(':idEleve', $_SESSION['idEleve']);
$requeteMatiere->execute();

$verifMatiere = $requeteMatiere->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="touteMatiereEleve.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Mes matieres</title>
</head>
<body>
    <a href="./accueilEtudiant.php" class="home-link">
        <i class="fas fa-home"></i>
    </a>
    <div class="green-circle-top-right"></div>
    <h1 class="page-title">Mes matières</h1>
    <div class="matiere-container">
        <div class="matiere-card-container">
                
                    <?php
                        foreach($verifMatiere as $matiere){
                            echo '<div class="matiere-card ">';
                            echo '<h2 class="matiere-title"> '.$matiere['nomMatiere'].' </h2>';
                            echo '<a href="./matiere.php?matiere='.$matiere['idMatiere'].'" class="matiere-link"> <i class="fa-solid fa-arrow-right"></i></a>';
                            echo '</div>';
                        }
                    ?>
                
        </div>
    </div>

    
</body>
</html>