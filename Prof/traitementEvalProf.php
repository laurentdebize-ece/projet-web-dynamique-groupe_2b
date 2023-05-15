<?php
session_start();
require_once '../bdd.php';

$comp = $_GET['idComp'];
$eleve = $_GET['idEleve'];

if(isset($_POST['choix'])){
    $eval = $_POST['choix'];
    if($eval == 4){
        $note = 0;
    }else if($eval == 3){
        $note = 1;
    }else if($eval == 2){
        $note = 2;
    }
}else{
    header('Location: formulaireEvaluation.php?idComp='.$comp.'&idEleve='.$eleve);
}

//update de la competence de l'utilisateur

$requetUpdate = $bdd->prepare("UPDATE Note SET validation = :evaluation, note = :note WHERE idEleve = :idEleve AND idCompetence = :idCompetence");
$requetUpdate->bindParam(':evaluation', $eval);
$requetUpdate->bindParam(':note', $note);
$requetUpdate->bindParam(':idEleve', $eleve);
$requetUpdate->bindParam(':idCompetence', $comp);
$requetUpdate->execute();







?>