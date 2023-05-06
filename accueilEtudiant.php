<?php
    session_start();
    require_once 'bdd.php';

    
    $idUtilisateur = $_SESSION['idUtilisateur'];

    $requeteInfoEleve = $bdd->prepare("SELECT * FROM Eleve WHERE idUtilisateur = :idUtilisateur");
    $requeteInfoEleve->bindParam(':idUtilisateur', $idUtilisateur);
    $requeteInfoEleve->execute();

    $infoEleve = $requeteInfoEleve->fetch(PDO::FETCH_ASSOC);


    $requeteIdEleve = $bdd->prepare("SELECT idEleve FROM Eleve WHERE idUtilisateur = :idUtilisateur");
    $requeteIdEleve->bindParam(':idUtilisateur', $idUtilisateur);
    $requeteIdEleve->execute();

    $idEleve = $requeteIdEleve->fetch(PDO::FETCH_ASSOC);


    $_SESSION['nom'] = $infoEleve['nomEleve'];
    $_SESSION['prenom'] = $infoEleve['prenomEleve'];
    $_SESSION['mail'] = $infoEleve['mail'];
    $_SESSION['ecole'] = $infoEleve['ecole'];
    $_SESSION['promo'] = $infoEleve['promo'];
    $_SESSION['idEleve'] = $idEleve['idEleve'];
    


    $requeteMatiere = $bdd->prepare("SELECT * FROM Matiere WHERE ecole = :ecole AND promo = :promo");
    $requeteMatiere->bindParam(':ecole', $_SESSION['ecole']);
    $requeteMatiere->bindParam(':promo', $_SESSION['promo']);
    $requeteMatiere->execute();

    $matieres = $requeteMatiere->fetchAll(PDO::FETCH_ASSOC);
    $nbMatieres = $requeteMatiere->rowCount();

   
    $requeteCompetence = $bdd->prepare("SELECT Competence.nomCompetence, Competence.description FROM Competence  INNER JOIN Note ON Competence.idCompetence = Note.idCompetence WHERE Note.idEleve = :idEleve");
    $requeteCompetence->bindParam(':idEleve', $_SESSION['idEleve']);
    $requeteCompetence->execute();

    $competences = $requeteCompetence->fetchAll(PDO::FETCH_ASSOC);
    $nbCompetences = $requeteCompetence->rowCount();

    
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueilEtudiant.css">
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
                <h4 class="user-name"><?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></h4>
                <h6 class="user-school"><?php echo $_SESSION['ecole'] . " " . $_SESSION['promo']; ?></h6>
                <h6 class="user-statut">Etudiant</h6>
            </div>
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="" class="menu-link">Mes competences</a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">Mes matières</a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">Compétences transverses</a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">Toutes les compétences</a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">Mon compte</a>
                </li>
            </ul>
            <div class="menu-icon">
                <a href="" class="icon-link"><i class="fa-solid fa-gear"></i>    </a>
                        
            </div>
        </section>
            


        <section class="dashboard">

        <div class="top-banner">
                <h1 class="dashboard-title">Dashboard</h1>
                <a href="" class="notif-logo"><i class="fa-solid fa-bell"></i></a>
            </div>
            <div class="menu-part">

                <div class="mes-competences">
                    <h2 class='card-title'>Mes competences</h2>
                        <div class="competence-card">
                            <?php
                                $competenceNumber = 0;
                                foreach($competences as $competence){
                                    if($competenceNumber < 3){
                                    echo "<div class='competence-wrap'>";
                                    echo "<h3 class='competence-title'>" . $competence['nomCompetence'] . "</h3>";
                                    echo "<p class='competence-desc'>". $competence['description'] ."</p>";
                                    echo "<i class='fa-thin fa-arrow-right'></i>";
                                    echo "</div>";
                                    $competenceNumber++;
                                    }
                                    else{
                                        break;
                                    }
                                }
                            ?>
                        </div>
                </div>

                <div class="mes-matieres">
                    <h2 class="card-title">Mes matières</h2>
                    
                    <?php
                        $matiereNumber = 0;
                        foreach($matieres as $matiere){
                            if($competenceNumber < 5){
                            echo "<div class='matiere-container'>";
                            echo "<div class='left-matiere'>";
                            echo "<div class='colorcircle'></div>";
                            echo "<h3 class='nom-matiere'>" . $matiere['nomMatiere'] . "</h3>";
                            echo "</div>";
                            echo "<i class='fa-thin fa-arrow-right'></i>";
                            echo "</div>";
                            $matiereNumber++;
                            }
                            else{
                                break;
                            }
                        }

                    
                    ?>
                </div>

                <div class="account">
                    <h2 class='card-title'>Mon compte</h2>
                </div>
                
                <div class="toutes-les-competences">
                    <h2 class="card-title">Toutes les competences</h2>
                </div>
                
            </div>

        </section>
</div>

</body>
</html>