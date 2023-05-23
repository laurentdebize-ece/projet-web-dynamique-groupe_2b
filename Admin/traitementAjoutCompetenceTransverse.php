<?php
    session_start();
    require_once '../bdd.php';

    $tableauEcole = array();

    if(isset($_POST['ECE'])){
        $idEce = $_POST['ECE'];
        array_push($tableauEcole, $idEce);
    }
    if(isset($_POST['HEIP'])){
        $idHeip = $_POST['HEIP'];
        array_push($tableauEcole, $idHeip);
    }
    if(isset($_POST['INSEEC'])){
        $idInseec = $_POST['INSEEC'];
        array_push($tableauEcole, $idInseec);
    }

    if(isset($_POST['nom']) && isset($_POST['description']) && !empty($_POST['nom']) && !empty($_POST['description']) && isset($_POST['prof']) && !empty($_POST['prof'])){
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $idProf = $_POST['prof'];

        $creationCompTransverse = $bdd->prepare('INSERT INTO CompetenceTransverse (nom, description) VALUES (:nom, :description)');
        $creationCompTransverse->execute(array(
            'nom' => $nom,
            'description' => $description
        ));
        $idCompTransverse = $bdd->lastInsertId();

        $ajoutCompEcole = $bdd->prepare('INSERT INTO TransverseEcole (idCompetenceTransverse, idEcole) VALUES (:idCompetence, :idEcole)');
        foreach($tableauEcole as $ecole){
            $ajoutCompEcole->execute(array(
                'idCompetence' => $idCompTransverse,
                'idEcole' => $ecole
            ));
        }

        $ajoutProf = $bdd->prepare('INSERT INTO TransverseProf (idCompetenceTransverse, idProf) VALUES (:idCompetence, :idProf)');
        $ajoutProf->execute(array(
            'idCompetence' => $idCompTransverse,
            'idProf' => $idProf
        ));
        

        $listeEleve =  $bdd->prepare('SELECT Eleve.idEleve FROM Eleve INNER JOIN Classe ON Eleve.idClasse = Classe.idClasse INNER JOIN Promo On Promo.idPromo = Classe.idPromo INNER JOIN Ecole ON Ecole.idEcole = Promo.idEcole WHERE Ecole.idEcole = :idEcole');
        foreach($tableauEcole as $ecole){
            $listeEleve->execute(array(
                'idEcole' => $ecole
            ));
            $listeEleve = $listeEleve->fetchAll();
            
            foreach($listeEleve as $eleve){
                $ajoutCompEleve = $bdd->prepare('INSERT INTO TransverseNote (idCompetenceTransverse, idEleve) VALUES (:idCompetence, :idEleve)');
                $ajoutCompEleve->execute(array(
                    'idCompetence' => $idCompTransverse,
                    'idEleve' => $eleve['idEleve']
                ));
            }
        }
        
        header('Location: ./modificationCompetenceTransverse.php');
        
    }else{
        header('Location: ./modificationCompetenceTransverse.php');
    }


    
?>