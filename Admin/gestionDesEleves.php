<?php
  session_start();
  require_once"../bdd.php";

  $requeteClasse = $bdd->prepare("SELECT idClasse, ecole, nomClasse, promo FROM Classe");
  $requeteClasse->execute();
  $classes = $requeteClasse->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gestionDesEleves.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestion des utilisateurs</title>
    <a class="home-link" href="gestionDesUtilisateurs.php"><i class="fa-solid fa-users"></i></a>
    <div class= account-info>
    <h1 class="page-title">GESTION DES ELEVES</h1>
</div>
</head>
<body>
<div class="ajout">

<section class="milieuDePage">

            <div class="menu-part">
                <div class="mes-competences">
                        <div class="competence-card">
                <div class="utilisateur">

                    <div><a class="btn-ecole-link" href="./gestionDesCompetences.php"></a><button class="ecole-btn" id="toggle-formulaire">Ajouter un élève</button></a> </div>
                    <div class="conteneur-formulaire">
  <form action="./traitementAjoutEleve.php" method="post">
    <h4>
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required>

    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="prenom" required>

 

    <label for="classe">Classe:</label>
    <select id="classe" name="classe" required>
      <option value="">--Choisir une classe--</option>
      <?php foreach ($classes as $classe) { ?>
        <option value="<?= $classe['idClasse'] ?>"><?= $classe['nomClasse'], $classe['ecole'], $classe['promo'] ?></option>
      <?php } ?>
    </select>
    <br>
    

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

                    <div><a class="btn-ecole-link" href="./gestionDesCompetences.php"></a><button class="ecole-btn" id="afficher-liste">Supprimer un élève</button></a> </div>
            
<div class="liste-eleves" id="liste-eleves">
  <h2>Cliquez sur l'élève à supprimer</h2>
  <select id="select-eleve">
  </select>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
  const bouton2 = document.getElementById('afficher-liste');
  const listeEleves = document.getElementById('liste-eleves');

  bouton2.addEventListener('click', function() {
    if (listeEleves.style.display === 'none') {
      listeEleves.style.display = 'block';
    } else {
      listeEleves.style.display = 'none';
    }
  });
</script>

</body>
</html>