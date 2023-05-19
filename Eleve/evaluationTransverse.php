<?php
session_start();
require_once '../bdd.php';
$idCompetence = $_GET['id'];

$requeteVerifTransverse = $bdd->prepare("SELECT idCompetenceTransverse FROM TransverseNote WHERE idEleve = :idEleve");
$requeteVerifTransverse->bindParam(':idEleve', $_SESSION['idEleve']);
$requeteVerifTransverse->execute();

$competencesTransverse = $requeteVerifTransverse->fetchAll(PDO::FETCH_ASSOC);



$requeteInfoCompetence = $bdd->prepare("SELECT * FROM CompetenceTransverse WHERE idCompetenceTransverse = :idCompetence");
$requeteInfoCompetence->bindParam(':idCompetence', $idCompetence);
$requeteInfoCompetence->execute();

$infoCompetence = $requeteInfoCompetence->fetch(PDO::FETCH_ASSOC);




$isAllowed = false;

foreach($competencesTransverse as $competenceTransverse){
    if($competenceTransverse['idCompetenceTransverse'] == $idCompetence){
        $isAllowed = true;
    }
}

if($isAllowed == false){
    header('Location: accueilEtudiant.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="competenceEleve.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Competence</title>
</head>
<body>
    <a class="home-link" href="./accueilEtudiant.php">  <i class="fa-solid fa-house"></i></a>
    <div class="green-circle-top-right"></div>
    <form action="./traitementEvalTransverse.php?id=<?php echo $idCompetence; ?>" class="competence-evaluation" class="form-evaluation" method="post">
        <div class="competenceCardWrapper">
            <h1 class="competence-title">Ma competence : <span class="competence-title-name"> <?php echo $infoCompetence['nom'];?> </span> </h1>
            <div class="description">
                <h3 class="form-snd-title">Description :</h3>
                <p class="description-text"> <?php echo $infoCompetence['description'] ?> </p>
            </div>
            <div class="evaluation">
                <h3 class="form-snd-title">Mon evaluation : </h3>
                <div class="choix-eval">

                    
                    <label>
                            <input type="radio" name="choix" value="2" class="radio-input" id="nonacquis" require>
                            <label for="nonacquis" class="radio-label" id="nonlabel">Non acquis</label>
                    </label>
                        <br>
                    <label>
                            <input type="radio" name="choix" value="1" class="radio-input" id="encours" require>
                            <label for="encours" class="radio-label" id="encourslabel">En cours d'acquisition</label>
                    </label>
                        <br>
                        <label>
                            <input type="radio" name="choix" value="0" class="radio-input" id="Acquis" require>
                            <label for="Acquis" class="radio-label" id="acquislabel">Acquis</label>
                    </label>
                  
                </div>
            </div>
            <button class="btn-evaluation" type="submit">M'évaluer</button>
        </div>
    </form>

</body>
</html>