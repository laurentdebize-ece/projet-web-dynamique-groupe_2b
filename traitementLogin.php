<?php
    session_start();
    require_once 'bdd.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $requeteLogin = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = :email AND mdp = :password");
    $requeteLogin->bindParam(':email', $email);
    $requeteLogin->bindParam(':password', $password);
    $requeteLogin->execute();

    $resultat = $requeteLogin->fetch(PDO::FETCH_ASSOC);

    $requeteID = $bdd->prepare("SELECT idUtilisateur FROM Utilisateur WHERE mail = :email AND mdp = :password");
    $requeteID->bindParam(':email', $email);
    $requeteID->bindParam(':password', $password);
    $requeteID->execute();

    $iduser = $requeteID->fetch(PDO::FETCH_ASSOC);

    $_SESSION['idUtilisateur'] = $iduser['idUtilisateur'];
    $_SESSION['statut'] = $resultat['statut'];
  

    if($resultat != null){
        if($resultat['statut'] == "Eleve"){
            
            header('Location: ./Eleve/accueilEtudiant.php');
        }
        else if($resultat['statut'] == "Prof"){
            
            
            header('Location: ./Prof/accueilProf.php');
        }
        else if($resultat['statut'] == "Admin"){
            
            header('Location: accueilAdmin.php');
        }
      
        
    } else {
        header('Location: Login.php?error=1');
        
    }

?>