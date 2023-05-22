<?php
    session_start();
    require_once '../bdd.php';

    $statut = "Prof";

    if(isset($_POST['mail']) && isset($_POST['matiere']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['matiere'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $matiere = $_POST['matiere'];
        $password = $_POST['password'];
        $reqUser = $bdd->prepare('INSERT INTO Utilisateur(statut, mail, mdp) VALUES(:statut, :mail, :mdp)');
        $reqUser->execute(array(
            'mail' => $mail,
            'mdp' => $password,
            'statut' => $statut
        ));
        $reqUser->closeCursor();
        $foreignKey = $bdd->prepare('SELECT idUtilisateur FROM Utilisateur WHERE mail = :mail');
        $foreignKey->execute(array(
            'mail' => $mail
        ));
        $idUtilisateur = $foreignKey->fetch();
        $foreignKey->closeCursor();
        $reqProf = $bdd->prepare('INSERT INTO Prof(nomProf, prenomProf, mail, mdp, nomMatiere, idUtilisateur) VALUES(:nom, :prenom, :mail, :mdp, :nomMatiere, :idUtilisateur)');
        $reqProf->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'mail' => $mail,
            'mdp' => $password,
            'nomMatiere' => $matiere,
            'idUtilisateur' => $idUtilisateur['idUtilisateur']
        ));
        header('Location: ./gestionDesProfs.php');

    }else{
        header('Location: ./gestionDesProfs.php');
    }
    

?>

