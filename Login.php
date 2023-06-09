

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200;300;400;800&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <section class="login-page">
        <div class="title-wrap">
            <h1 class="login-title">
                <span class="span-title">Omnes</span>
                MySkills
            </h1>
        </div>
        <div class="form-wrap">
            <form action="./traitementLogin.php" class="login-form" method="post">
                
                <div class="form-input">
                    <input class="input" type="text" name="email" placeholder="Email" class="input-form">
                    <input class="input" type="password" name="password" placeholder="Password" class="input-form">
                </div>
                <?php
                    if(isset($_GET['error'])){
                        echo '<p class="error">Email ou mot de passe incorrect</p>';
                    }
                ?>
                <button class="form-btn" type="submit">Se connecter</button>
            </form>
        </div>
          
    </section>
</body>
</html>

