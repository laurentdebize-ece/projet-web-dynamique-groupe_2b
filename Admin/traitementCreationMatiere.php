<?php
    session_start();
    require_once"../bdd.php";



    if(isset($_POST['nom']) && isset($_POST['nbHeures']) && isset($_POST['nom-prof']) && isset($_POST['nom-promo']) && !empty($_POST['nom']) && !empty($_POST['nbHeures']) && !empty($_POST['nom-prof']) && !empty($_POST['nom-promo'])) {
        
        $nom = $_POST['nom'];
        $nbHeures = $_POST['nbHeures'];
        $idProf = $_POST['nom-prof'];
        $idPromo = $_POST['nom-promo'];

        $reqInfoPromo = $bdd->prepare("SELECT * FROM Promo WHERE idPromo = :idPromo");
        $reqInfoPromo->bindValue(':idPromo', $idPromo, PDO::PARAM_INT);
        $reqInfoPromo->execute();
        $infoPromo = $reqInfoPromo->fetch(PDO::FETCH_ASSOC);

        $Annee = $infoPromo['promo'];
        $ecolePromo = $infoPromo['ecole'];

        $reqInfoProf = $bdd->prepare("SELECT * FROM Prof WHERE idProf = :idProf");
        $reqInfoProf->bindValue(':idProf', $idProf, PDO::PARAM_INT);
        $reqInfoProf->execute();
        $infoProf = $reqInfoProf->fetch(PDO::FETCH_ASSOC);

        $nomProf = $infoProf['nomProf'];

        $reqAjoutMatiere = $bdd->prepare("INSERT INTO matiere (nomMatiere, nbHeures, idProf, nomProf, ecole, promo) VALUES (:nomMatiere, :nbHeures, :idProf, :nomProf, :ecole, :promo)");
        $reqAjoutMatiere->bindValue(':nomMatiere', $nom, PDO::PARAM_STR);
        $reqAjoutMatiere->bindValue(':nbHeures', $nbHeures, PDO::PARAM_INT);
        $reqAjoutMatiere->bindValue(':idProf', $idProf, PDO::PARAM_INT);
        
        $reqAjoutMatiere->bindValue(':nomProf', $nomProf, PDO::PARAM_STR);
        $reqAjoutMatiere->bindValue(':ecole', $ecolePromo, PDO::PARAM_STR);
        $reqAjoutMatiere->bindValue(':promo', $Annee, PDO::PARAM_STR);
        $reqAjoutMatiere->execute();
        $idMatiere = $bdd->lastInsertId(); 

        $reqListeClass = $bdd->prepare("SELECT idClasse FROM Classe WHERE idPromo = :idPromo");
        $reqListeClass->bindValue(':idPromo', $idPromo, PDO::PARAM_INT);
        $reqListeClass->execute();
        $listeClass = $reqListeClass->fetchAll(PDO::FETCH_ASSOC);

        
    

        // Insérer ensuite les associations dans la table "MatiereClasse"
        $ajoutClasse = $bdd->prepare("INSERT INTO MatiereClasse (idMatiere, idClasse) VALUES (:idMatiere, :idClasse)");
        foreach ($listeClass as $classe) {
            $ajoutClasse->bindValue(':idMatiere', $idMatiere, PDO::PARAM_INT);
            $ajoutClasse->bindValue(':idClasse', $classe['idClasse'], PDO::PARAM_INT);
            $ajoutClasse->execute();
        }
        $ajoutClasse->closeCursor();

    

        header('Location: ./gestionDesMatieres.php');
    } else {
        echo "Erreur lors de la création de la matière";
    }
?>