<?php
    session_start();
    require_once"../bdd.php";

    $idProf = $_SESSION['idProfesseur'];


    $reqListeMatiere = $bdd->prepare("SELECT idMatiere, nomMatiere, nomProf, ecole, promo FROM Matiere WHERE idProf = :idProf");
    $reqListeMatiere->bindValue(':idProf', $idProf);
    $reqListeMatiere->execute();
    $listeMatiere = $reqListeMatiere->fetchAll(PDO::FETCH_ASSOC);


    $reqlListeCompetence = $bdd->prepare("SELECT idCompetence, nomCompetence, description, nomMatiere, ecole, promo FROM Competence");
    $reqlListeCompetence->execute();
    $listeCompetence = $reqlListeCompetence->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modificationDesCompetences.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestion des utilisateurs</title>
    <a class="home-link" href="gestionDesCompetences.php"><i class="fa-solid fa-folder-open"></i></a>
    <div class= account-info>
    <h1 class="page-title">GESTION DES Competences</h1>
</div>
</head>
<body>
<div class="ajout">

<section class="milieuDePage">

            <div class="menu-part">
                <div class="mes-competences">
                        <div class="competence-card">
                <div class="utilisateur">

                    <div><a class="btn-ecole-link" href="./gestionDesCompetences.php"></a><button class="ecole-btn" id="toggle-formulaire">Ajouter une compétence</button></a> </div>
                    <div class="conteneur-formulaire">
  <form action="./traitementAjoutCompetence.php" method="post">
    <h4>
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required>


    <label for="matiere">Matiere:</label>
    <select name="matiere" id="matiere" required>
        <option value="">--Choisir une matiere--</option>
        <?php foreach ($listeMatiere as $matiere) {
          $matiereBloquee = $bdd->prepare('SELECT * FROM matiere WHERE matiere.idProf = :idProf');
          $_SESSION['idProf'] = $idProf['idProf'];
          ?>
            <option value="<?php echo $matiere['idMatiere']; ?>" <?php if($matiereBloquee) echo 'indisponible'; ?>>
            <?php echo $matiere['nomMatiere'] . "  " . $matiere['ecole'] . "  " . $matiere['promo']; ?>
          </option>
        <?php } ?>
    </select>


    <button type="submit">Soumettre</button>
  </form>
  </h4>
</div>
</div>
</div>
</div>
</div>
</div>



<script>
  const bouton = document.getElementById('toggle-formulaire');
  const formulaire = document.querySelector('.conteneur-formulaire');

  let formulaireVisible = false;

   bouton.addEventListener('click', function() {
    formulaireVisible = !formulaireVisible;

    if (formulaireVisible) {
      formulaire.style.display = 'block';
    } else {
      formulaire.style.display = 'none';
    }
  });
</script>


<div class="suppression">

<section class="milieuDePage">

            <div class="menu-part">
                <div class="mes-competences">
                        <div class="competence-card">
                <div class="utilisateur">

                    <div><a class="btn-ecole-link" href="./gestionDesCompetences.php"></a><button class="ecole-btn" id="afficher-liste">Supprimer une compétence</button></a> </div>
                    <div class="suppr-competence" id="suppr-competence">
                          <h2>Choisir la competence à supprimer :</h2>
                          <div class="form-suppr">
                                      <form action="./traitementSuppressionCompetence.php" method="post">
                            
                                        <label for="competence">Competence:</label>
                                        <select name="competence" id="competence" required>
                                            <option value="">--Choisir une competence--</option>
                                            <?php foreach ($listeCompetence as $competence) { ?>
                                                <option value="<?php echo $competence['idCompetence']; ?>"><?php echo $competence['nomCompetence'] . "  " . $competence['nomMatiere'] . "  " . $competence['ecole'] . "  " . $competence['promo']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <button type="submit">Supprimer</button>
                                        
                                      </form>
                                 </div>
                    </div>
            
                   
 
</div>
</div>
</div>
</div>
</div>
</div>

<script>
  const bouton2 = document.getElementById('afficher-liste');
  const listeCompetences = document.getElementById('suppr-competence');

  bouton2.addEventListener('click', function() {
    if (listeCompetences.style.display === 'none') {
      listeCompetences.style.display = 'block';
    } else {
      listeCompetences.style.display = 'none';
    }
  });
</script>

</body>
</html>