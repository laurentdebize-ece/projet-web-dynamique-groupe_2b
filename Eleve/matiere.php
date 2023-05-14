<?php
    session_start();
    require_once '../bdd.php';

    $idMatiere = $_GET['matiere'];

    $requeteMatiere = $bdd->prepare("SELECT Matiere.nomMatiere, Matiere.idMatiere FROM Matiere INNER JOIN MatiereClasse ON Matiere.idMatiere = MatiereClasse.idMatiere INNER JOIN Classe ON MatiereClasse.idClasse = Classe.idClasse INNER JOIN Eleve ON Eleve.idClasse = Classe.idClasse WHERE idEleve = :idEleve");
    $requeteMatiere->bindParam(':idEleve', $_SESSION['idEleve']);
    $requeteMatiere->execute();
    
    $verifMatiere = $requeteMatiere->fetchAll(PDO::FETCH_ASSOC);

    $verif = false;

    foreach($verifMatiere as $matiere){
        if($matiere['idMatiere'] == $idMatiere){
            $verif = true;
        }
    }

    if($verif == false){
        header('Location: accueilEtudiant.php');
    }

    $requeteInfoMatiere = $bdd->prepare("SELECT * FROM Matiere WHERE idMatiere = :idMatiere");
    $requeteInfoMatiere->bindParam(':idMatiere', $idMatiere);
    $requeteInfoMatiere->execute();

    $infoMatiere = $requeteInfoMatiere->fetch(PDO::FETCH_ASSOC);



    $requeteCompetence = $bdd->prepare("SELECT Competence.nomCompetence, Competence.description, Competence.idCompetence FROM Competence  INNER JOIN Note ON Competence.idCompetence = Note.idCompetence WHERE Note.idEleve = :idEleve AND Competence.idMatiere = :idMatiere AND Competence.ecole = :ecole AND Competence.promo = :promo");
    $requeteCompetence->bindParam(':idEleve', $_SESSION['idEleve']);
    $requeteCompetence->bindParam(':idMatiere', $idMatiere);
    $requeteCompetence->bindParam(':ecole', $_SESSION['ecole']);
    $requeteCompetence->bindParam(':promo', $_SESSION['promo']);
    $requeteCompetence->execute();

    $competences = $requeteCompetence->fetchAll(PDO::FETCH_ASSOC);

    $requeteNoteCompetence = $bdd->prepare("SELECT idCompetence, note FROM Note WHERE idEleve = :idEleve AND idMatiere = :idMatiere");
    $requeteNoteCompetence->bindParam(':idEleve', $_SESSION['idEleve']);
    $requeteNoteCompetence->bindParam(':idMatiere', $idMatiere);
    $requeteNoteCompetence->execute();

    $noteCompetence = $requeteNoteCompetence->fetchAll(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="matiere.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?php echo $infoMatiere['nomMatiere']; ?> </title>
</head>
<body>
    <a href="accueilEtudiant.php" class="home-link"><i class="fas fa-home"></i></a>
    <div class="top-right-green-circle"></div>
    <h1 class="page-title"><?php echo $infoMatiere['nomMatiere']; ?></h1>
    <div class="competence-card-container">
        <?php
         foreach($competences as $competence){
            
            foreach($noteCompetence as $note){
                if($note['idCompetence'] == $competence['idCompetence']){
                    $noteDeCompetence = $note['note'];
                    
                }
            }
            if($noteDeCompetence == 0){
                echo '<div class="competence-card green">';
            }else if($noteDeCompetence == 1){
                echo '<div class="competence-card orange">';
            }else if($noteDeCompetence == 2){
                echo '<div class="competence-card red">';
            }
            
            echo '<h2 class="competence-title">'.$competence['nomCompetence'].'</h2>';
            echo '<p class="description-competence">'.$competence['description'].'</p>';
            echo '<a class="competence-link" href="competenceEleve.php?id='.$competence['idCompetence'].'"><i class="fa-solid fa-arrow-right"></i></a>';
            echo '</div>';
        }
        
        ?>
    </div>
    
</body>
</html>