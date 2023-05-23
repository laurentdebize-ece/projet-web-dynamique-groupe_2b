<?php
  session_start();
  require_once '../bdd.php';

  $listeProf = $bdd->prepare('SELECT idProf, nomProf, prenomProf FROM Prof');
  $listeProf->execute();
  $listeProf = $listeProf->fetchAll();

  $listeCompetenceTransverse = $bdd->prepare('SELECT idCompetenceTransverse, nom, description FROM CompetenceTransverse');
  $listeCompetenceTransverse->execute();
  $listeCompetenceTransverse = $listeCompetenceTransverse->fetchAll();



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modificationDesCompetencesTransverses.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestion des utilisateurs</title>
    <a class="home-link" href="gestionDesCompetences.php"><i class="fa-solid fa-folder-tree"></i></a>
    <div class= account-info>
    <h1 class="page-title">GESTION DES Competences transverses</h1>
</div>
</head>
<body>
<div class="ajout">

<section class="milieuDePage">

            <div class="menu-part">
                <div class="mes-competences">
                        <div class="competence-card">
                <div class="utilisateur">

                    <div><a class="btn-ecole-link" href="./gestionDesCompetences.php"></a><button class="ecole-btn" id="toggle-formulaire">Ajouter une compétence transverses</button></a> </div>
                    <div class="conteneur-formulaire">
  <form action="traitementAjoutCompetenceTransverse.php" method="post">
    <h4>
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required>

  

    <div class="ecole-choix">
         <input type="checkbox" name="ECE" id="ECE" value="1">
          <label for="ECE">ECE</label>

          <input type="checkbox" name="HEIP" id="HEIP" value="2">
          <label for="HEIP">HEIP</label>

          <input type="checkbox" name="INSEEC" id="INSEEC" value="3">
          <label for="ESILV">INSEEC</label>

    </div>

    
    <div class="prof-choix">
    <label for="prof">Professeur assigné:</label>
    <select name="prof" id="prof">
      <?php foreach($listeProf as $prof): ?>
        <option value="<?= $prof['idProf'] ?>"><?= $prof['nomProf'] ?> <?= $prof['prenomProf'] ?></option>
      <?php endforeach; ?>
    </select>
    </div>


    


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

                    <div><a class="btn-ecole-link" href="./gestionDesCompetences.php"></a><button class="ecole-btn" id="afficher-liste">Supprimer une compétence transverses</button></a> </div>
            
<div class="liste-competence" id="liste-competencesTransveres">
  <h2>Cliquez sur la compétence à supprimer</h2>
  <form action="./traitementSuppressionTransverse.php" method="post">
      <select  id="competenceTransverse" name="idComp">
        <?php foreach($listeCompetenceTransverse as $competenceTransverse): ?>
          <option value="<?= $competenceTransverse['idCompetenceTransverse'] ?>"><?= $competenceTransverse['nom']?>  |   <?= $competenceTransverse['description']?> </option>
        <?php endforeach; ?>
      </select>
      <button type="submit">Supprimer</button>
  </form>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
  const bouton2 = document.getElementById('afficher-liste');
  const listeCompetencesTransverses = document.getElementById('liste-competencesTransveres');

  bouton2.addEventListener('click', function() {
    if (listeCompetencesTransverses.style.display === 'none') {
      listeCompetencesTransverses.style.display = 'block';
    } else {
      listeCompetencesTransverses.style.display = 'none';
    }
  });
</script>

</body>
</html>