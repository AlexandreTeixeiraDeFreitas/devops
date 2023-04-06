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
                        if (!file_exists(__DIR__.$login.".txt")) {
                            file_put_contents("../users/".$login.".txt", $password);
                            // printf("Utilisateur créé avec succès !");
                            return 0;
                        } else {
                            // printf("Un utilisateur avec ce login existe déjà.");
                            return 1;
                        }
                    }else{
                        // printf("Le mot de passe ne respecte pas les critères de sécurité.");
                        return 2;
                    }
                }else{
                    // printf("Le login ne doit pas contenir de caractère spécial.");
                    return 3;
                }
            }else{
                // printf("Veuillez remplir tous les champs.");
                return 4;
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