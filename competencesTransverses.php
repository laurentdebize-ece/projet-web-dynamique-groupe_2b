<?php
    session_start();
    require_once 'bdd.php';

 


    $requeteCompetenceTransverse = $bdd->prepare("SELECT CompetenceTransverse.idCompetenceTransverse, CompetenceTransverse.nom, CompetenceTransverse.description FROM CompetenceTransverse INNER JOIN TransverseNote ON CompetenceTransverse.idCompetenceTransverse = TransverseNote.idCompetenceTransverse WHERE TransverseNote.idEleve = :idEleve");
    $requeteCompetenceTransverse->bindParam(':idEleve', $_SESSION['idEleve']);
    $requeteCompetenceTransverse->execute();

    $competencesTransverse = $requeteCompetenceTransverse->fetchAll(PDO::FETCH_ASSOC);

    $requeteNoteCompetenceTransverse = $bdd->prepare("SELECT * FROM TransverseNote WHERE idEleve = :idEleve");
    $requeteNoteCompetenceTransverse->bindParam(':idEleve', $_SESSION['idEleve']);
    $requeteNoteCompetenceTransverse->execute();

    $noteCompetencesTransverse = $requeteNoteCompetenceTransverse->fetchAll(PDO::FETCH_ASSOC);

    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="competencesTransverses.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Mes compétences</title>
</head>
<body>
    
    <a href="./accueilEtudiant.php" class="home-link">
        <i class="fas fa-home"></i>
    </a>
    <div class="green-circle-top-right"></div>
    <h1 class="page-title">compétences transverses</h1>
    <div class="competence-card-container">
        <?php
            
            foreach($competencesTransverse as $competenceTransverse){
                foreach($noteCompetencesTransverse as $noteTransverse){
                    if($noteTransverse['idCompetenceTransverse'] == $competenceTransverse['idCompetenceTransverse']){
                        $noteCompTransverse = $noteTransverse['note'];
                    }
                }
                if($noteCompTransverse == 0){
                    echo '<div class="competence-card green ">';
                }else if($noteCompTransverse == 1){
                    echo '<div class="competence-card orange >';
                }else if($noteCompTransverse == 2){
                    echo '<div class="competence-card red ">';
                }
               
                echo '<h2 class="competence-title"> '.$competenceTransverse['nom'].' </h2>';
                echo '<p class="competence-description"> '.$competenceTransverse['description'].' </p>';
                echo '<a href="./evaluationTransverse.php?id='.$competenceTransverse['idCompetenceTransverse'].'" class="competence-link"> <i class="fa-solid fa-arrow-right"></i> </a>';
                echo '</div>';
            }


        ?>

    </div>

    
</body>
</html>