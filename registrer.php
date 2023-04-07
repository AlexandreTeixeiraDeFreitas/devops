<!DOCTYPE html>
<html>
<head>
	<title>Créer un utilisateur</title>
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
	<h1>Créer un utilisateur</h1>
	<form method="post" action="">
		<label for="login">Login :</label>
		<input type="text" name="login" id="login" required><br><br>
		<label for="password">Mot de passe :</label>
		<input type="password" name="password" id="password" required><br><br>
		<input type="submit" name="submit" value="Créer l'utilisateur">
	</form>
    <p><a href="index.php">Se connecté</a></p>
    <?php
    include 'fonction.php';
    if (isset($_POST['submit'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $result = create_user($login, $password);

        switch ($result) {
            case 0:
                printf("Utilisateur créer avec succès !");
                // header('Location: profile.php');
                break;
            case 1:
                printf("Un utilisateur avec ce login existe déjà.");
                break;
            case 2:
                printf("Le mot de passe ne respecte pas les critères de sécurité.");
                break;
            case 3:
                printf("Le login ne doit pas contenir de caractère spécial.");
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
