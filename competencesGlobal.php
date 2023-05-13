
<?php
    session_start();
    require_once 'bdd.php';

    $requeteCompetence = $bdd->prepare("SELECT idCompetence, nomCompetence, description FROM Competence");
    $requeteCompetence->bindParam(':idEleve', $_SESSION['idEleve']);
    $requeteCompetence->execute();

    $competences = $requeteCompetence->fetchAll(PDO::FETCH_ASSOC);

    $requeteNoteCompetence = $bdd->prepare("SELECT * FROM Note WHERE idEleve = :idEleve");
    $requeteNoteCompetence->bindParam(':idEleve', $_SESSION['idEleve']);
    $requeteNoteCompetence->execute();

    $noteCompetences = $requeteNoteCompetence->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST['tri'])){
        if($_POST['tri'] == 'asc'){
            sort($competences);
        }else if($_POST['tri'] == 'desc'){
            rsort($competences);
        }
    }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="competencesGlobal.css">
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
    <h1 class="page-title">Toutes les compétences</h1>
    <div class="competence-card-container">
        <?php
            foreach($competences as $competence){
                $note = -1;
                foreach($noteCompetences as $noteCompetence){
                    if($noteCompetence['idCompetence'] == $competence['idCompetence']){
                        $note = $noteCompetence['note'];
                    }
                }
                if($note == 0){
                    echo '<div class="competence-card green">';
                }else if($note == 1){
                    echo '<div class="competence-card orange">';
                }else if($note == 2){
                    echo '<div class="competence-card red">';
                }elseif($note == -1) {
                    echo '<div class="competence-card notAssigned">';
                }
                echo '<h2 class="competence-title"> '.$competence['nomCompetence'].' </h2>';
                echo '<p class="competence-description"> '.$competence['description'].' </p>';

                if($note != -1){
                    echo '<a href="./competenceEleve.php?id='.$competence['idCompetence'].'" class="competence-link"> <i class="fa-solid fa-arrow-right"></i> </a>';
                }else{
                    echo '<a href="./ajoutCompetence.php?id='.$competence['idCompetence'].'" class="competence-link"><i class="fa-solid fa-plus"></i> </a>';
                }
                echo '</div>';
            }

        ?>

    </div>

    <form action="competencesGlobal.php" method="post" class="tri-form">
        <label class="tri-label" for="tri">Trier par:</label>
        <select name="tri" id="tri" class="select">
        <option value="asc">Ordre alphabétique croissant</option>
        <option value="desc">Ordre alphabétique décroissant</option>
        </select>
        <input class="btn-tri" type="submit" value="Trier">
    </form>

    
</body>
</html>
