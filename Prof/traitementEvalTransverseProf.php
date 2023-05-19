<?php
    session_start();
    require_once '../bdd.php';

$comp = $_GET['idComp'];
$eleve = $_GET['idEleve'];

if(isset($_POST['choix'])){
    $eval = $_POST['choix'];
    $message = $_POST['message'];
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

$requetUpdate = $bdd->prepare("UPDATE TransverseNote SET validation = :evaluation, note = :note, Message = :message WHERE idEleve = :idEleve AND idCompetenceTransverse = :idCompetence");
$requetUpdate->bindParam(':evaluation', $eval);
$requetUpdate->bindParam(':note', $note);
$requetUpdate->bindParam(':message', $message);
$requetUpdate->bindParam(':idEleve', $eleve);
$requetUpdate->bindParam(':idCompetence', $comp);
$requetUpdate->execute();


header('Location: ./accueilProf.php');


?>