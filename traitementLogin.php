<?php
    require_once 'bdd.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $requeteLogin = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = :email AND mdp = :password");
    $requeteLogin->bindParam(':email', $email);
    $requeteLogin->bindParam(':password', $password);
    $requeteLogin->execute();

    $resultat = $requeteLogin->fetch(PDO::FETCH_ASSOC);

    if($resultat != null){
        if($resultat['statut'] == "Eleve"){
            header('Location: accueilEtudiant.php');
        }
        else if($resultat['statut'] == "Prof"){
            header('Location: accueilProf.php');
        }
        else if($resultat['statut'] == "Admin"){
            header('Location: accueilAdmin.php');
        }
      
        
    } else {
        header('Location: Login.php?error=1');
        
    }

?>