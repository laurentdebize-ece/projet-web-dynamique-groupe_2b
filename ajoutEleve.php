<?php
    session_start();
    require_once 'bdd.php';

    
    $idUtilisateur = $_SESSION['idUtilisateur'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <title>Ajout eleve</title>
</head>

<body>
    <section class="login-page">
        <div class="title-wrap">
            <h1 class="login-title">
                <span class="span-title">Omnes</span>
                MySkills
            </h1>
        </div>
        <div class="form-wrap">
            <form action="TraitementAjoutEleve.php" class="login-form" method="post">
                
                <div class="form-input">
                    <input class="input" type="text" name="IdEleve" placeholder="Identifiant de l'eleve" class="input-form">
                    <input class="input" type="text" name="nomEleve" placeholder="Nom de l'eleve" class="input-form">
                    <input class="input" type="text" name="prenomEleve" placeholder="Prenom de l'eleve" class="input-form">
                    <input class="input" type="text" name="mail" placeholder="Mail de l'eleve" class="input-form">
                    <input class="input" type="text" name="mdp" placeholder="mdp de l'eleve" class="input-form">
                    <input class="input" type="text" name="IdUtilisateur" placeholder="Identifiant UTILISATEUR de l'eleve" class="input-form">
                    <input class="input" type="text" name="ecole" placeholder="Ecole de l'eleve" class="input-form">
                    <input class="input" type="text" name="promo" placeholder="Promo de l'eleve" class="input-form">
                    <input class="input" type="text" name="IdClasse" placeholder="Identifiant de la CLASSE de l'eleve" class="input-form">
                    <input class="input" type="text" name="nomClasse" placeholder="Nom de la classe de l'eleve" class="input-form">
                </div>
                <?php
                    if(isset($_GET['error'])){
                        echo '<p class="error">Un identifiant a deja ete distribue, changez le</p>';
                    }
                ?>
                <button class="form-btn" type="submit">Ajouter l'élève</button>
            </form>
        </div>
          
    </section>
</body>
</html>