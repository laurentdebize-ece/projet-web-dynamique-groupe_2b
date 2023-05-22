<?php
    session_start();
    require_once '../bdd.php';

    $idUtilisateur = $_SESSION['idUtilisateur'];

    $requeteInfoProf = $bdd->prepare("SELECT * FROM Prof WHERE idUtilisateur = :idUtilisateur");
    $requeteInfoProf->bindParam(':idUtilisateur', $idUtilisateur);
    $requeteInfoProf->execute();

    $infoProf = $requeteInfoProf->fetch(PDO::FETCH_ASSOC);

    $requeteIdProf = $bdd->prepare("SELECT idProf FROM Prof WHERE idUtilisateur = :idUtilisateur");
    $requeteIdProf->bindParam(':idUtilisateur', $idUtilisateur);
    $requeteIdProf->execute();

    $idProf = $requeteIdProf->fetch(PDO::FETCH_ASSOC);

    $_SESSION['idProfesseur'] = $idProf['idProf'];




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueilProf.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Accueil</title>
</head>
<body>
    <a href="./validationProf.php">Valider mes compétences</a>
    <div class="page-wrapper">
        <section class="left-banner">

            <h1 class="left-banner-title">
                <span class="left-title-span">Omnes</span>
                MySkills
            </h1>
            <div class="profile-img">
                <div class="photo"></div>
            </div>
            <div class="user-info">
                <h4 class="user-name">Laurent Debize</h4>
                
                <h6 class="user-statut">Prof</h6>
            </div>
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="./touteCompetenceEleve.php" class="menu-link">Mes competences</a>
                </li>
                <li class="menu-item">
                    <a href="./touteMatiereEleve.php" class="menu-link">Mes matières</a>
                </li>
                <li class="menu-item">
                    <a href="./competencesTransverses.php" class="menu-link">Compétences transverses</a>
                </li>
                <li class="menu-item">
                    <a href="./competencesGlobal.php" class="menu-link">Toutes les compétences</a>
                </li>
                <li class="menu-item">
                    <a href="./AccountEleve.php" class="menu-link">Mon compte</a>
                </li>
            </ul>
            <div class="menu-icon">
                <a href="../traitementLogout.php" class="icon-link"><i class="fa-solid fa-right-from-bracket"></i> </a>
                        
            </div>
        </section>
            


        <section class="dashboard">

        <div class="top-banner">
                <h1 class="dashboard-title">Dashboard</h1>
                <a href="" class="notif-logo"><i class="fa-solid fa-bell"></i></a>
            </div>
            <div class="menu-part">

                <div class="mes-competences">
                    <h2 class='card-title'> <a class="gen-card-link" href="touteCompetenceEleve.php">Mes competences</a> </h2>
                        <div class="competence-card">
                            
                            ?>
                        </div>
                </div>

                <div class="mes-matieres">
                    <h2 class="card-title"><a class="gen-card-link" href="./touteMatiereEleve.php">Mes matieres</a></h2>
                    
                </div>

                <div class="account">
                    <h2 class='card-title'><a class="gen-card-link" href="AccountEleve.php">Mon compte</a></h2>
                    <div class="account-circle">
                        <a href="./AccountEleve.php" class="user-link"> <i class="fa-solid fa-user"></i></a>
                    </div>
                </div>
                
                <div class="toutes-les-competences">
                    <h2 class="card-title"><a class="gen-card-link" href="./competencesGlobal.php">toutes les competences</a></h2>
                    <div class="ecole-btn-wrap">
                    <a class="btn-ecole-link" href="./CompetenceEcole.php?id=3"><button class="ecole-btn">INSEEC</button></a>

                    <a class="btn-ecole-link" href="./CompetenceEcole.php?id=1"><button class="ecole-btn">ECE</button></a>

                    <a class="btn-ecole-link" href="./CompetenceEcole.php?id=2"><button class="ecole-btn">HEIP</button></a>
                    </div>
                </div>
                
            </div>

        </section>
</div>

</body>
</html>