<?php
    session_start();
    require_once '../bdd.php';

    $idUtilisateur = $_SESSION['idUtilisateur'];

    $requetesCompetencesValidation = $bdd->prepare("SELECT Competence.nomCompetence, Eleve.nomEleve, Note.note, Competence.description, Eleve.prenomEleve, Note.idEleve, Note.idCompetence FROM Competence INNER JOIN Note ON Competence.idCompetence = Note.idCompetence INNER JOIN Matiere ON Matiere.idMatiere = Note.idMatiere INNER JOIN Eleve ON Eleve.idEleve = Note.idEleve WHERE Matiere.idProf = :idProf AND Note.Validation = 1");
    $requetesCompetencesValidation->bindParam(':idProf', $_SESSION['idProfesseur']);
    $requetesCompetencesValidation->execute();

    $competencesValidation = $requetesCompetencesValidation->fetchAll(PDO::FETCH_ASSOC);




    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="validationProf.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <a href="./accueilProf.php" class="home-link">
        <i class="fas fa-home"></i>
    </a>
    <div class="red-circle-top-right"></div>
    <h1 class="page-title">Mes competences à valider</h1>
    <div class="competence-card-container">
        <?php
            foreach($competencesValidation as $competence){
               
                if($competence['note'] == 0){
                    echo '<div class="competence-card green">';
                }else if($competence['note'] == 1){
                    echo '<div class="competence-card orange">';
                }else if($competence['note'] == 2){
                    echo '<div class="competence-card red">';
                }
                
                echo "<h2 class='competence-eleve'>".$competence['prenomEleve']." ".$competence['nomEleve']."</h2>";
                echo "<h3 class='competence-title'>".$competence['nomCompetence']."</h3>";
                echo "<p class='competence-description'>".$competence['description']."</p>";
                
                echo '<a class="eval-link" href="./formulaireEvaluation.php?idComp='.$competence['idCompetence'].'&idEleve='.$competence['idEleve'].'" class="competence-link"> <i class="fa-solid fa-arrow-right"></i> </a>';
                echo "</div>";
            }
        ?>
    </div>
    
</body>
</html>