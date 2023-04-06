<?php
		if (isset($_POST['submit'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];
			create_user($login, $password);
		}
        function create_user($login, $password)
        {
            $filePath = __DIR__ . "/users/" . $login . ".txt";
            $filePath = str_replace("\\", "/", $filePath);

            if (!empty($login) && !empty($password)) {
                if (ctype_alpha($login) && preg_match('/^[a-zA-Z]+$/', $login)) {
                    if (verifyPassword($password)) {
                        if (!file_exists($filePath)) {
                            file_put_contents($filePath, $password);
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

        function connect_user($login, $password) {
            $filePath = __DIR__ . "/users/" . $login . ".txt";
            $filePath = str_replace("\\", "/", $filePath);
        
            if (!empty($login) && !empty($password)) {
                if (ctype_alpha($login) && preg_match('/^[a-zA-Z]+$/', $login)) {
                    if (file_exists($filePath)) {
                        $stored_password = file_get_contents($filePath);
                        if ($stored_password === $password) {
                            // printf("Utilisateur connecté avec succès !");
                            return 0; // L'utilisateur existe et le mot de passe donné est valide
                        } else {
                            // printf("Mot de passe invalide.");
                            return 1; // L'utilisateur existe et le mot de passe donné est invalide
                        }
                    } else {
                        // printf("L'utilisateur n'existe pas.");
                        return 2; // L'utilisateur n'existe pas
                    }
                } else {
                    // printf("Tentative d'injection SQL.");
                    return 3; // Une tentative d'injection SQL a eu lieu
                }
            } else {
                // printf("Veuillez remplir tous les champs.");
                return 4; // Les champs sont vides
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
            $allowed_special_chars = '!@#$%^&*()-_=+.,:;>';
            $pattern = '/[' . preg_quote($allowed_special_chars, '/') . ']/';
            if (!preg_match($pattern, $password)) {
                return false;
            }
            // Vérification de l'absence de caractères interdits
            if (preg_match('/[{}()\[\]|\\_\/<]/', $password)) {
                return false;
            }
            // Le mot de passe respecte tous les critères
            return true;
        }       