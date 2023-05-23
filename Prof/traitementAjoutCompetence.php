<?php
session_start();
require_once"../bdd.php";

if(isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['matiere']) && !empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['matiere'])) {

    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $idMatiere = $_POST['matiere'];

    $reqInfoMatiere = $bdd->prepare("SELECT * FROM Matiere WHERE idMatiere = :idMatiere");
    $reqInfoMatiere->bindParam(':idMatiere', $idMatiere);
    $reqInfoMatiere->execute();
    $infoMatiere = $reqInfoMatiere->fetch(PDO::FETCH_ASSOC);

    

    $ecole = $infoMatiere['ecole'];
    $promo = $infoMatiere['promo'];
    $nomMatiere = $infoMatiere['nomMatiere'];

    $reqAjoutCompetence = $bdd->prepare("INSERT INTO Competence (nomCompetence, description, idMatiere, nomMatiere, ecole, promo) VALUES (:nomCompetence, :description, :idMatiere, :nomMatiere, :ecole, :promo)");
    $reqAjoutCompetence->bindParam(':nomCompetence', $nom);
    $reqAjoutCompetence->bindParam(':description', $description);
    $reqAjoutCompetence->bindParam(':idMatiere', $idMatiere);
    $reqAjoutCompetence->bindParam(':nomMatiere', $nomMatiere);
    $reqAjoutCompetence->bindParam(':ecole', $ecole);
    $reqAjoutCompetence->bindParam(':promo', $promo);
    $reqAjoutCompetence->execute();
    $idCompetence = $bdd->lastInsertId();

    $reqListeEleve = $bdd->prepare("SELECT Eleve.idEleve FROM Eleve INNER JOIN Classe On Eleve.idClasse = Classe.idClasse INNER JOIN Promo ON Promo.idPromo = Classe.idPromo INNER JOIN PromoMatiere ON PromoMatiere.idPromo = Promo.idPromo INNER JOIN Matiere ON Matiere.idMatiere = PromoMatiere.idMatiere WHERE Matiere.idMatiere = :idMatiere");
    $reqListeEleve->bindParam(':idMatiere', $idMatiere);
    $reqListeEleve->execute();
    $listeEleve = $reqListeEleve->fetchAll(PDO::FETCH_ASSOC);
    
    $ajoutCompetenceEleve = $bdd->prepare("INSERT INTO Note (idEleve, idMatiere, idCompetence) VALUES (:idEleve, :idMatiere, :idCompetence)");
    foreach ($listeEleve as $eleve) {
        $ajoutCompetenceEleve->bindParam(':idEleve', $eleve['idEleve']);
        $ajoutCompetenceEleve->bindParam(':idMatiere', $idMatiere);
        $ajoutCompetenceEleve->bindParam(':idCompetence', $idCompetence);
        $ajoutCompetenceEleve->execute();
    }

    header('Location: ./gestionDesCompetences.php');
  
}
else{
    header('Location: ./gestionDesCompetences.php');
    exit();
}
?>