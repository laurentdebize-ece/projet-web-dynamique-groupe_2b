<?php

session_start();
require_once '../bdd.php';

$requeteNomProfesseur = $bdd->prepare("SELECT idProf, nomProf, prenomProf  FROM Prof");
$requeteNomProfesseur->execute();
$nomProfesseur = $requeteNomProfesseur->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gestionDesProfs.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestion des utilisateurs</title>
    <a class="home-link" href="gestionDesUtilisateurs.php"><i class="fa-solid fa-users"></i></a>
    <div class= account-info>
    <h1 class="page-title">GESTION DES Professeurs</h1>
</div>
</head>
<body>
<div class="ajout">

<section class="milieuDePage">

            <div class="menu-part">
                <div class="mes-competences">
                        <div class="competence-card">
                <div class="utilisateur">

                    <div><a class="btn-ecole-link" href="./gestionDesCompetences.php"></a><button class="ecole-btn" id="toggle-formulaire">Ajouter un professeur</button></a> </div>
                    <div class="conteneur-formulaire">
  <form action="./traitementAjoutProf.php" method="post">
    <h4>
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required>

    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="prenom" required>

    <label for="prenom">Matiere:</label>
    <input type="text" id="matiere" name="matiere" required>


    <label for="mail">Mail:</label>
    <input type="email" id="mail" name="mail" required>

    <label for="mot-de-passe">Mot de passe:</label>
    <input type="password" id="mot-de-passe" name="password" required>

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

                    <div><a class="btn-ecole-link" href="./gestionDesCompetences.php"></a><button class="ecole-btn" id="afficher-liste">Supprimer un professeur</button></a> </div>
            
<div class="liste-professeurs" id="liste-professeurs">
  <h2>Selectionner le proffeseur à supprimer : </h2>
  <form action="./traitementSuppressionProf.php" method="post">

    <select name="prof" id="select-professeurs">
      <?php foreach ($nomProfesseur as $professeur) { ?>
        <option  value="<?= $professeur['idProf'] ?>"><?= $professeur['nomProf'] ?> <?= $professeur['prenomProf'] ?></option>
      <?php } ?>
    </select>

    <button type="submit"><i class="fa-regular fa-trash"></i></button>
  </form>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
  const bouton2 = document.getElementById('afficher-liste');
  const listeProfesseurs = document.getElementById('liste-professeurs');

  let listeProfesseursVisible = false;

  bouton2.addEventListener('click', function() {
    console.log('click');
    listeProfesseursVisible = !listeProfesseursVisible;
    if (listeProfesseursVisible) {
      listeProfesseurs.style.display = 'block';
    } else {
      listeProfesseurs.style.display = 'none';
    }
  });
</script>

</body>
</html>