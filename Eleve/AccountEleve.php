<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./AccountEleve.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Mon compte</title>
</head>
<body>
    <a class="home-link" href="./accueilEtudiant.php">    <i class="fa-solid fa-house"></i></a>
    <div class="account-info">
        <div class="profile-img"></div>
        <h1 class="username"><?php echo $_SESSION['prenom'].  " " . $_SESSION['nom'] ?></h1>
        <h3 class="userstatut"><?php echo $_SESSION['statut'] ?></h3>
        <h3 class="userecole"><?php echo $_SESSION['ecole'].  " " . $_SESSION['promo']  ?></h3>
        <h3 class="usermail"><?php echo $_SESSION['mail'] ?> </h3>
    </div>

    <div class="bottomright-circle"></div>
    
</body>
</html>