<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        }

        h1 {
        text-align: center;
        margin-top: 50px;
        }

        form {
        margin: 0 auto;
        width: 400px;
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 10px #ccc;
        }

        label {
        display: block;
        margin-bottom: 10px;
        }

        input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: none;
        margin-bottom: 20px;
        }

        input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        }

        input[type="submit"]:hover {
        background-color: #3e8e41;
        }

        .error {
        color: red;
        font-weight: bold;
        margin-top: 10px;
        }

    </style>
</head>
<body>
    <h1>Connexion</h1>
    <form action="" method="POST">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" name="submit" value="Se connecter">
    </form>
    <p><a href="registrer.php">S'inscrire</a></p>
    <?php
    // session_start();
    include 'fonction.php';
    if (isset($_POST['submit'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $result = connect_user($login, $password);
    
        switch ($result) {
            case 0:
                printf("Utilisateur connecté avec succès !");
                printf($_SESSION["CONNECTED"]);
                printf('<script>window.location.href = "profile.php";</script>');
                // header('Location: profile.php');
                break;
            case 1:
                printf("Mot de passe invalide.");
                break;
            case 2:
                printf("L'utilisateur n'existe pas.");
                break;
            case 3:
                printf("Tentative d'injection SQL.");
                break;
            case 4:
                printf("Veuillez remplir tous les champs.");
                break;
            default:
                printf("Erreur inconnue.");
        }
    }
    ?>
</body>
</html>
