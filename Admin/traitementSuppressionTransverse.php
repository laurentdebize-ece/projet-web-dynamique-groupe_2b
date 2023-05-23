<?php
    session_start();
    require_once '../bdd.php';
    if(isset($_POST['idComp']) && !empty($_POST['idComp'])){
        $suppressionTransverse = $bdd->prepare('DELETE FROM CompetenceTransverse WHERE idCompetenceTransverse = :idCompetenceTransverse');
        $suppressionTransverse->execute(array(
            'idCompetenceTransverse' => $_POST['idComp']
        ));
        header('Location: ./gestionDesCompetences.php');
    }else{
        header('Location: ./gestionDesCompetences.php');
    }




?>