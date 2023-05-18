<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gestionDesUtilisateurs.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestion des utilisateurs</title>
    <a class="home-link" href="accueilAdmin.php"><i class="fa-solid fa-house"></i></a>
    <div class= account-info>
    <h1 class="page-title">GESTION DES UTILISATEURS</h1>
</div>
</head>
<body>

<section class="milieuDePage">

            <div class="menu-part">
                <div class="mes-competences">
                        <div class="competence-card">
                
                        
                <div class="utilisateur">
                    <div class="utilisateur-box-prof" onclick="redimensionnerConteneur()">
                        <a href="./AccountAdmin.php" class="user-link"> </a>
                        <h6 class="user-texte-prof">Professeurs</h6>

                        <div><i class="fa-solid fa-address-book"></i></div>
                    </div>
                </div>

                <script>
  function redimensionnerConteneur() {
    var conteneurEleve = document.querySelector('.utilisateur-box-prof');
    conteneurEleve.style.width = '450px';
    disparaitreConteneur();
  }

  function disparaitreConteneur() {
    var conteneurEleve = document.querySelector('.utilisateur-box-eleve');
    conteneurEleve.classList.add('disparait1');
  }

</script>

                <div class="utilisateur">
                    <div class="utilisateur-box-eleve" onclick="redimensionnerConteneur2()">
                    <h6 class="user-texte-eleve">Elèves</h6>
                    <a href="./AccountAdmin.php" class="user-link"> </a>
                        <div><i class="fa-solid fa-address-card"></i></div>        
                    </div>
                </div>
                </div>
                </div>


<script>
  function redimensionnerConteneur2() {
    var conteneurEleve = document.querySelector('.utilisateur-box-eleve');
    conteneurEleve.style.width = '450px';
    disparaitreConteneur2();
  }

  function disparaitreConteneur2() {
    var conteneurEleve = document.querySelector('.utilisateur-box-prof');
    conteneurEleve.classList.add('disparait2');
  }
</script>


</section>
</body>
</html>