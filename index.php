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
	<?php
		if (isset($_POST['submit'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];
			create_user($login, $password);
		}
        function create_user($login, $password)
        {
            if (!empty($login) && !empty($password)) {
                if (ctype_alpha($login) && preg_match('/^[a-zA-Z]+$/', $login)) {
                    if (verifyPassword($password)) {
                        file_put_contents("users/".$login, $password);
                        printf("Utilisateur créé avec succès !");
                    }else{
                        printf("Le mot de passe ne respecte pas les critères de sécurité.");
                    }
                }else{
                    printf("Le login ne doit pas contenir de chiffre ou de caractère spécial.");
                }
            }else{
                printf("Veuillez remplir tous les champs.");
            }
        }

        function verifyPassword($password) {
            // Vérification de la longueur
            if (strlen($password) < 8) {
                return false;
            }
            // Vérification de la présence d'une lettre majuscule
            if (!preg_match('/[A-Z]/', $password)) {
                return false;
            }
            // Vérification de la présence d'une lettre minuscule
            if (!preg_match('/[a-z]/', $password)) {
                return false;
            }
            // Vérification de la présence d'un chiffre
            if (!preg_match('/[0-9]/', $password)) {
                return false;
            }
            // Vérification de la présence d'un caractère spécial autorisé
            if (!preg_match('/[!@#\$%\^&\*\(\)\-_\+=\.,:;>]/', $password)) {
                return false;
            }
            // Vérification de l'absence de caractères interdits
            if (preg_match('/[{}()\[\]|\\_\/<]/', $password)) {
                return false;
            }
            // Le mot de passe respecte tous les critères
            return true;
        }        
        
	?>
</body>
</html>
