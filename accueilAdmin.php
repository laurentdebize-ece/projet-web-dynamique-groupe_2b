<?php
    session_start();
    require_once 'bdd.php';

    
    $idUtilisateur = $_SESSION['idUtilisateur'];

    $requeteInfoAdmin = $bdd->prepare("SELECT * FROM Admin WHERE idUtilisateur = :idUtilisateur");
    $requeteInfoAdmin->bindParam(':idUtilisateur', $idUtilisateur);
    $requeteInfoAdmin->execute();

    $infoAdmin = $requeteInfoAdmin->fetch(PDO::FETCH_ASSOC);


    $requeteIdAdmin = $bdd->prepare("SELECT idAdmin FROM Admin WHERE idUtilisateur = :idUtilisateur");
    $requeteIdAdmin->bindParam(':idUtilisateur', $idUtilisateur);

    $idAdmin = $requeteIdAdmin->fetch(PDO::FETCH_ASSOC);


    $_SESSION['nom'] = $infoAdmin['nomAdmin'];
    $_SESSION['prenom'] = $infoAdmin['prenomAdmin'];
    $_SESSION['mail'] = $infoAdmin['mail'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueilAdministrateur.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Accueil</title>
</head>
<body>
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
            <h4 class="user-name"><?php echo $_SESSION['nom']; ?></h4>
            <h6 class="user-school"></h6>


                <h6 class="user-statut">Administrateur</h6>
            </div>
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="listeDesUtilisateurs.php" class="menu-link">Utilisateurs</a>
                </li>
                <li class="menu-item">
                    <a href="gestionDesMatieres.php" class="menu-link">Matières</a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">Compétences</a>
                </li>
                <li class="menu-item">
                    <a href="./AccountAdmin.php" class="menu-link">Mon compte</a>
                </li>
                <li class="menu-item">
                </li>
            </ul>
            <div class="menu-icon">
                <a href="" class="icon-link"><i class="fa-solid fa-gear"></i>    </a>
                <br>
                <br>
                <a href="Login.php" class="icon-link"><i class="fa-solid fa-power-off"></i><a href="" class="logout-link"></a></a>         
            </div>
        </section>
            


        <section class="dashboard">

        <div class="top-banner">
                <h1 class="dashboard-title">Dashboard</h1>
                <a href="" class="notif-logo"><i class="fa-solid fa-bell"></i></a>
            </div>
            <div class="menu-part">

                <div class="mes-competences">
                    <h2 class='card-title'> <a class="gen-card-link" href="gestionDesUtilisateurs.php">Gerer les utilisateurs</a> </h2>
                        <div class="competence-card">
                

                <div class="utilisateur">
                    <div class="utilisateur-box-prof">
                        <a href="./AccountAdmin.php" class="user-link"> <i class="fa-solid fa-address-book"></i></a>
                    </div>
                    <h6 class="user-texte-prof">Professeurs</h6>
                </div>
                
                <div class="utilisateur">
                    <div class="utilisateur-box-eleve">
                        <a href="./AccountAdmin.php" class="user-link"> <i class="fa-solid fa-address-card"></i></a>
                    </div>
                    <h6 class="user-texte-eleve">Elèves</h6>

                </div>



                        </div>
                </div>

                <div class="mes-matieres">
                    <h2 class="card-title"><a class="gen-card-link" href="gestionDesMatieres.php"> Gerer les matieres</a></h2>
                    <br>
                    <h2><a href="gestionDesMatieres.php" class="matiere-link">Ajouter une matière</a><h2>
                    <br>
                    <h2><a href="gestionDesMatieres.php" class="matiere-link">Voir toutes les matières</a><h2>
            
                </div>


                <div class="account">
                    <h2 class='card-title'><a class="gen-card-link" href="./AccountAdmin.php">Mon compte</a></h2>
                    <div class="account-circle">
                        <a href="./AccountAdmin.php" class="user-link"> <i class="fa-solid fa-user"></i></a>
                    </div>
                </div>
                
                <div class="toutes-les-competences">
                    <h2 class="card-title"><a class="gen-card-link" href="#">competences</a></h2>
                    <div class="ecole-btn-wrap">
                    <a class="btn-ecole-link" href=""></a><button class="ecole-btn">Ajouter une compétence</button></a>

                    <a class="btn-ecole-link" href=""></a><button class="ecole-btn">Compétences transverses</button></a>

                    <a class="btn-ecole-link" href=""></a><button class="ecole-btn">Toutes les compétences</button></a>
                    </div>
                </div>
                
            </div>

        </section>
</div>

</body>
</html>