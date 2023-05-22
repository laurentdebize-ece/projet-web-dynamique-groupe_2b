<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gestionDesCompetences.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestion des utilisateurs</title>
    <a class="home-link" href="accueilAdmin.php"><i class="fa-solid fa-house"></i></a>
    <div class= account-info>
    <h1 class="page-title">GESTION DES Competences</h1>
</div>
</head>
<body>

<section class="milieuDePage">

            <div class="menu-part">
                <div class="mes-competences">
                        <div class="competence-card">
                
                        
                <div class="utilisateur">
                    <div class="utilisateur-box-prof" onclick="redirigerVersAutrePage1()">
                        <a href="./gestionDesProfs.php" class="user-link"> </a>
                        <h6 class="user-texte-prof">Modifier les compétences</h6>
                        <div><i class="fa-solid fa-folder-open"></i></div>
                    </div>
                </div>

                <script>
  function redirigerVersAutrePage1() {
    var urlDestination = './modificationCompetences.php';
    window.location.href = urlDestination;
  }

</script>

                <div class="utilisateur">
                    <div class="utilisateur-box-prof" onclick="redirigerVersAutrePage2()">
                        <a href="./gestionDesProfs.php" class="user-link"> </a>
                        <h6 class="user-texte-prof">Gestion des compétences transverses</h6>
                        <div><i class="fa-solid fa-folder-tree"></i></div>
                    </div>
                </div>

                <script>
  function redirigerVersAutrePage2() {
    var urlDestination = './modificationCompentencesTransverses.php';
    window.location.href = urlDestination;
  }
</script>


                <div class="utilisateur">
                    <div class="utilisateur-box-prof" onclick="redirigerVersAutrePage3()">
                        <a href="./gestionDesProfs.php" class="user-link"> </a>
                        <h6 class="user-texte-prof">Voir toutes les compétences</h6>
                        <div><i class="fa-solid fa-rectangle-list"></i></div>
                </div>
                </div>
                </div>
</div>

<script>
  function redirigerVersAutrePage3() {
    var urlDestination = './ListeDesCompetences.php';
    window.location.href = urlDestination;
  }
</script>

</section>
</body>
</html>