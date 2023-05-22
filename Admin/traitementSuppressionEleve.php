<?php
    session_start();
    require_once"../bdd.php";

    $idEleve = $_POST['eleve'];

    $reqUser = $bdd->prepare("SELECT idUtilisateur FROM Eleve WHERE idEleve = :idEleve");
    $reqUser->execute(array(
        'idEleve' => $idEleve
    ));
    $idUser = $reqUser->fetch();
    $reqUser->closeCursor();

    $reqDeleteUser = $bdd->prepare("DELETE FROM Utilisateur WHERE idUtilisateur = :idUser");
    $reqDeleteUser->execute(array(
        'idUser' => $idUser['idUtilisateur']
    ));
    $reqDeleteUser->closeCursor();

    header('Location: ./gestionDesEleves.php');

?>