<?php
     session_start();
     require_once '../bdd.php';

     $idComp = $_GET['idComp'];
    $idEleve = $_GET['idEleve'];
    
    $requetesCompetencesValidationTransverse = $bdd->prepare("SELECT CompetenceTransverse.nom, Eleve.nomEleve, TransverseNote.note, CompetenceTransverse.description, TransverseNote.idEleve, Eleve.prenomEleve, TransverseNote.idCompetenceTransverse  FROM CompetenceTransverse INNER JOIN TransverseNote ON CompetenceTransverse.idCompetenceTransverse = TransverseNote.idCompetenceTransverse  INNER JOIN Eleve ON Eleve.idEleve = TransverseNote.idEleve INNER JOIN TransverseProf ON TransverseProf.idCompetenceTransverse = TransverseNote.idCompetenceTransverse WHERE TransverseProf.idProf = :idProf AND TransverseNote.Validation = 1");
     $requetesCompetencesValidationTransverse->bindParam(':idProf', $_SESSION['idProfesseur']);
     $requetesCompetencesValidationTransverse->execute();
 
     $competencesValidationTransverse = $requetesCompetencesValidationTransverse->fetchAll(PDO::FETCH_ASSOC);

     $isAllowed = false;

     foreach($competencesValidationTransverse as $competence){
         if($competence['idCompetenceTransverse'] == $idComp && $competence['idEleve'] == $idEleve){
             $isAllowed = true;
         }
     }
     if($isAllowed==false){
            echo "not allowed";
     }

     $requeteInfoCompetence = $bdd->prepare("SELECT CompetenceTransverse.nom, Eleve.nomEleve, TransverseNote.note, CompetenceTransverse.description, TransverseNote.idEleve, Eleve.prenomEleve, TransverseNote.idCompetenceTransverse  FROM CompetenceTransverse INNER JOIN TransverseNote ON CompetenceTransverse.idCompetenceTransverse = TransverseNote.idCompetenceTransverse  INNER JOIN Eleve ON Eleve.idEleve = TransverseNote.idEleve INNER JOIN TransverseProf ON TransverseProf.idCompetenceTransverse = TransverseNote.idCompetenceTransverse WHERE TransverseProf.idProf = :idProf AND TransverseNote.Validation = 1 AND TransverseNote.idEleve = :idEleve AND TransverseNote.idCompetenceTransverse = :idComp");
        $requeteInfoCompetence->bindParam(':idProf', $_SESSION['idProfesseur']);
        $requeteInfoCompetence->bindParam(':idEleve', $idEleve);
        $requeteInfoCompetence->bindParam(':idComp', $idComp);
        $requeteInfoCompetence->execute();

        $competence = $requeteInfoCompetence->fetch(PDO::FETCH_ASSOC);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="formulaireEvaluation.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <title>Document</title>
</head>
<body>
<a href="./accueilProf.php" class="home-link">
        <i class="fas fa-home"></i>
    </a>
     <h1 class="page-title">Evaluer mon élève</h1>
     <div class="red-circle-top-right"></div>

     <div class="evaluation-form-wrapper">
          <h2 class="eleve-name"><?php echo $competence['prenomEleve'] . " " . $competence['nomEleve'];  ?></h2>
          <h3 class="competence-title"><?php echo $competence['nom'] ?></h3>
          <p class="competence-description"> <?php echo $competence['description']?></p>
          <div class="eval-eleve">
               <p class="eval-eleve-desc">Evaluation de l'élève :</p>
               <span class="eleve-note">

               <?php 
                    if($competence['note'] == 0){
                         echo 'Acquis';
                    }else if($competence['note'] == 1){
                         echo "en cours d'acquisition";
                    }else if($competence['note'] == 2){
                         echo 'Non acquis';
                    }
               ?>
               </span>
          </div>
          <form action="./traitementEvalTransverseProf.php?idEleve=<?php echo $competence['idEleve']; ?>&idComp=<?php echo $competence['idCompetenceTransverse'] ?>" class="competence-evaluation" class="evaluation-form" method="post">
               <h2 class="form-title">Mon évaluation de l'élève</h2>
               <div class="choix-eval">


                    <label>
                         <input type="radio" name="choix" value="2" class="radio-input" id="nonacquis" require>
                         <label for="nonacquis" class="radio-label" id="nonlabel">Non acquis</label>
                    </label>
                    <br>
                    <label>
                         <input type="radio" name="choix" value="3" class="radio-input" id="encours" require>
                         <label for="encours" class="radio-label" id="encourslabel">En cours d'acquisition</label>
                    </label>
                    <br>

                    <label>
                         <input type="radio" name="choix" value="4" class="radio-input" id="Acquis" require>
                         <label for="Acquis" class="radio-label" id="acquislabel">Acquis</label>
                    </label>
                   
               </div>
               <input type="text" placeholder="Message pour l'élève :" class="prof-msg-input" name="message">
               <button class="btn-evaluation" type="submit">Evaluer</button>
          </form>

     </div>
</body>
</html>