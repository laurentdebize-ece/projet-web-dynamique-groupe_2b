<?php
    session_start();
    require_once"../bdd.php";

    $requeteProf = $bdd->prepare("SELECT idProf, nomProf, prenomProf FROM Prof");
    $requeteProf->execute();
    $professeurs = $requeteProf->fetchAll(PDO::FETCH_ASSOC);

    $requetePromo = $bdd->prepare("SELECT idPromo, promo, ecole FROM Promo");
    $requetePromo->execute();
    $promos = $requetePromo->fetchAll(PDO::FETCH_ASSOC);

    $reqListeMatiere = $bdd->prepare("SELECT idMatiere, nomMatiere, nomProf, ecole, promo FROM Matiere");
    $reqListeMatiere->execute();
    $listeMatiere = $reqListeMatiere->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modificationMatieres.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestion des utilisateurs</title>
    <a class="home-link" href="./GestiondesMatieres.php"><i class="fa-brands fa-react"></i></a>
    <div class= account-info>
    <h1 class="page-title">GESTION DES Matieres</h1>
</div>
</head>
<body>
<div class="ajout">

<section class="milieuDePage">

            <div class="menu-part">
                <div class="mes-competences">
                        <div class="competence-card">
                <div class="utilisateur">

                    <div><a class="btn-ecole-link" href="./gestionDesCompetences.php"></a><button class="ecole-btn" id="toggle-formulaire">Ajouter une matière</button></a> </div>
                    <div class="conteneur-formulaire">
  <form action="./traitementCreationMatiere.php" method="post">
    <h4>
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required>

    <label for="nbHeures">nombre d'heures:</label>
    <input type="number" id="nbHeures" name="nbHeures" required>


    <label for="nom-prof">Enseigné par:</label>
    <select name="nom-prof" id="nom-prof" required>
      
      <?php foreach ($professeurs as $professeur) { ?>
        <option value="<?= $professeur['idProf'] ?>"><?= $professeur['nomProf'] ?> <?= $professeur['prenomProf'] ?></option>
      <?php } ?>
    </select>
    <br>
  

    <label for="matiere">Promo:</label>
    <select name="nom-promo" id="matiere" required>
      
      <?php foreach ($promos as $promo) { ?>
        <option value="<?= $promo['idPromo'] ?>"><?= $promo['promo'] ?> <?= $promo['ecole'] ?></option>
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

                    <div><a class="btn-ecole-link" href="./gestionDesCompetences.php"></a><button class="ecole-btn" id="afficher-liste">Supprimer une matière</button></a> </div>
            
                    <div class="liste-competences" id="liste-matiere">
                      <div class="supprimerMatiere" id="supprimerMatiere">
                        <form action="./traitementSuppressionMatiere.php" method="post">
                          <select name="matiere" id="matiere" required>
                            <?php foreach ($listeMatiere as $matiere) { ?>
                              <option value="<?= $matiere['idMatiere'] ?>"><?= $matiere['nomMatiere'] ?> <?= $matiere['nomProf'] ?> <?= $matiere['ecole'] ?> <?= $matiere['promo'] ?></option>
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

<script>
  const bouton2 = document.getElementById('afficher-liste');
  const listeMatiere = document.getElementById('supprimerMatiere');

  bouton2.addEventListener('click', function() {
    if (listeMatiere.style.display === 'none') {
        listeMatiere.style.display = 'block';
    } else {
        listeMatiere.style.display = 'none';
    }
  });
</script>

</body>
</html>