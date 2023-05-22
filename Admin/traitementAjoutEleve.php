<?php
session_start();
require_once"../bdd.php";

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['classe']) && isset($_POST['mail']) && isset($_POST['password']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['classe']) && !empty($_POST['mail']) && !empty($_POST['password'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $classe = $_POST['classe'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $requeteInfoClasse = $bdd->prepare("SELECT ecole, promo,nomClasse FROM Classe WHERE idClasse = :classe");
    $requeteInfoClasse->execute(array(
        'classe' => $classe
    ));
    $infoClasse = $requeteInfoClasse->fetch();
    $requeteInfoClasse->closeCursor();

    $statut = "Eleve";

    $reqCreationUtilisateur = $bdd->prepare("INSERT INTO Utilisateur (statut, mail, mdp) VALUES (:statut, :mail, :mdp)");
    $reqCreationUtilisateur->execute(array(
        'statut' => $statut,
        'mail' => $mail,
        'mdp' => $password
    ));
    $reqCreationUtilisateur->closeCursor();

    $reqRecupIdUtilisateur = $bdd->prepare("SELECT idUtilisateur FROM Utilisateur WHERE mail = :mail");
    $reqRecupIdUtilisateur->execute(array(
        'mail' => $mail
    ));
    $idUtilisateur = $reqRecupIdUtilisateur->fetch();
    $reqRecupIdUtilisateur->closeCursor();



    $req = $bdd->prepare("INSERT INTO Eleve (nomEleve, prenomEleve, idClasse, mail, mdp, idUtilisateur, ecole, promo, nomClasse ) VALUES (:nom, :prenom, :classe, :mail, :password, :idUtilisateur, :ecole, :promo, :nomClasse)");
    $req->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'classe' => $classe,
        'mail' => $mail,
        'password' => $password,
        'idUtilisateur' => $idUtilisateur['idUtilisateur'],
        'ecole' => $infoClasse['ecole'],
        'promo' => $infoClasse['promo'],
        'nomClasse' => $infoClasse['nomClasse']
    ));
    $req->closeCursor();

    $reqIdEleve = $bdd->prepare("SELECT idEleve FROM Eleve WHERE mail = :mail");
    $reqIdEleve->execute(array(
        'mail' => $mail
    ));
    $idEleve = $reqIdEleve->fetch();
    $reqIdEleve->closeCursor();

    $reqIdCompetence = $bdd->prepare("SELECT Competence.idCompetence, Matiere.idMatiere FROM Competence INNER JOIN Matiere ON Competence.idMatiere = Matiere.idMatiere INNER JOIN PromoMatiere ON PromoMatiere.idMatiere = Matiere.idMatiere INNER JOIN Promo ON Promo.idPromo = PromoMatiere.idPromo INNER JOIN Classe ON Classe.idPromo = Promo.idPromo WHERE Classe.idClasse = :classe");
    $reqIdCompetence->execute(array(
        'classe' => $classe
    ));
    $idCompetence = $reqIdCompetence->fetchAll();
    $reqIdCompetence->closeCursor();

    $reqAjoutCompetencesEleve = $bdd->prepare("INSERT INTO Note (idEleve, idCompetence, idMatiere) VALUES (:idEleve, :idCompetence, :idMatiere)");
    foreach($idCompetence as $id){
        $reqAjoutCompetencesEleve->execute(array(
            'idEleve' => $idEleve['idEleve'],
            'idCompetence' => $id['idCompetence'],
            'idMatiere' => $id['idMatiere']
        ));
    }
    $reqAjoutCompetencesEleve->closeCursor();

    $reqIdCompTransverse = $bdd->prepare("SELECT CompetenceTransverse.idCompetenceTransverse FROM CompetenceTransverse INNER JOIN TransverseEcole ON TransverseEcole.idCompetenceTransverse = CompetenceTransverse.idCompetenceTransverse INNER JOIN Ecole ON Ecole.idEcole = TransverseEcole.idEcole WHERE Ecole.ecole = :ecole");
    $reqIdCompTransverse->execute(array(
        'ecole' => $infoClasse['ecole']
    ));
    $idCompTransverse = $reqIdCompTransverse->fetchAll();
    $reqIdCompTransverse->closeCursor();

  
    if(!empty($idCompTransverse)){

    $reqAjoutCompTransverseEleve = $bdd->prepare("INSERT INTO TransverseNote (idEleve, idCompetenceTransverse) VALUES (:idEleve, :idCompetenceTransverse)");
    foreach($idCompTransverse as $id){
        $reqAjoutCompTransverseEleve->execute(array(
            'idEleve' => $idEleve['idEleve'],
            'idCompetenceTransverse' => $id['idCompetenceTransverse']
        ));
    }
    }
    header('Location: gestionDesEleves.php');


    
    
    exit();
}
else{
    header('Location: gestionDesEleves.php');
}

?>