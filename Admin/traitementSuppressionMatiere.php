<?php
    session_start();
    require_once"../bdd.php";

    $idMatiere = $_POST['matiere'];

    $reqDeleteMatiere = $bdd->prepare("DELETE FROM Matiere WHERE idMatiere = :idMatiere");
    $reqDeleteMatiere->execute(array(
        'idMatiere' => $idMatiere
    ));
    $reqDeleteMatiere->closeCursor();

    header('Location: ./gestionDesMatieres.php');
?>