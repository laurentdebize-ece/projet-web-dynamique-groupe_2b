<?php
     session_start();
     require_once '../bdd.php';

     $comp = $_GET['idComp'];
     $eleve = $_GET['idEleve'];

     $requetesCompetencesValidation = $bdd->prepare("SELECT Competence.nomCompetence, Eleve.nomEleve, Note.note, Competence.description, Eleve.prenomEleve, Note.idEleve, Note.idCompetence FROM Competence INNER JOIN Note ON Competence.idCompetence = Note.idCompetence INNER JOIN Matiere ON Matiere.idMatiere = Note.idMatiere INNER JOIN Eleve ON Eleve.idEleve = Note.idEleve WHERE Matiere.idProf = :idProf AND Note.Validation = 1");
     $requetesCompetencesValidation->bindParam(':idProf', $_SESSION['idProfesseur']);
     $requetesCompetencesValidation->execute();
 
     $competencesValidation = $requetesCompetencesValidation->fetchAll(PDO::FETCH_ASSOC);

     $isAllowed = false;

     foreach($competencesValidation as $competence){
         if($competence['idCompetence'] == $comp && $competence['idEleve'] == $eleve){
             $isAllowed = true;
         }
     }
     if($isAllowed==false){
         header('Location: ./accueilProf.php');
     }

     $requeteCompetence = $bdd->prepare("SELECT Competence.nomCompetence, Eleve.nomEleve, Note.note, Competence.description, Eleve.prenomEleve, Note.idEleve, Note.idCompetence FROM Competence INNER JOIN Note ON Competence.idCompetence = Note.idCompetence INNER JOIN Matiere ON Matiere.idMatiere = Note.idMatiere INNER JOIN Eleve ON Eleve.idEleve = Note.idEleve WHERE Matiere.idProf = :idProf AND Note.Validation = 1 AND Note.idCompetence = :idComp AND Note.idEleve = :idEleve");
     $requeteCompetence->bindParam(':idProf', $_SESSION['idProfesseur']);
     $requeteCompetence->bindParam(':idComp', $comp);
     $requeteCompetence->bindParam(':idEleve', $eleve);
     $requeteCompetence->execute();

     $competence = $requeteCompetence->fetch(PDO::FETCH_ASSOC);
 
     
    
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
     <h1 class="page-title">Evaluer mon élève</h1>
     <div class="evaluation-form-wrapper">
          <h2 class="eleve-name"><?php echo $competence['prenomEleve'] . " " . $competence['nomEleve'];  ?></h2>
          <h3 class="competence-title"><?php echo $competence['nomCompetence'] ?></h3>
          <p class="competence-description"> <?php echo $competence['description']?></p>
          <div class="eval-eleve">
               <p class="eval-eleve-desc">Evaluation de l'élève :</p>
               <?php 
                    if($competence['note'] == 0){
                         echo 'Acquis';
                    }else if($competence['note'] == 1){
                         echo "en cours d'acquisition";
                    }else if($competence['note'] == 2){
                         echo 'Non acquis';
                    }
               ?>
          </div>
          <form action="./traitementEvalProf.php?idEleve=<?php echo $competence['idEleve']; ?>&idComp=<?php echo $competence['idCompetence'] ?>" class="competence-evaluation" class="evaluation-form" method="post">
               <h2 class="form-title">Mon évaluation de l'élève</h2>
               <div class="choix-eval">

                    <label>
                         <input type="radio" name="choix" value="4" class="radio-input" id="Acquis" require>
                         <label for="Acquis" class="radio-label" id="acquislabel">Acquis</label>
                    </label>
                    <br>
                    <label>
                         <input type="radio" name="choix" value="3" class="radio-input" id="encours" require>
                         <label for="encours" class="radio-label" id="encourslabel">En cours d'acquisition</label>
                    </label>
                    <br>
                    <label>
                         <input type="radio" name="choix" value="2" class="radio-input" id="nonacquis" require>
                         <label for="nonacquis" class="radio-label" id="nonlabel">Non acquis</label>
                    </label>
               </div>
               <button class="btn-evaluation" type="submit">Evaluer</button>
          </form>

     </div>
</body>
</html>