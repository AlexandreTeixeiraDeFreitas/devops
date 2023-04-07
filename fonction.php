<?php
    function create_user($login, $password)
    {
        $filePath = __DIR__ . "/users/" . $login . ".txt";
        $filePath = str_replace("\\", "/", $filePath);

        if (!empty($login) && !empty($password)) {
            if (ctype_alnum($login) && preg_match('/^[a-zA-Z0-9]+$/', $login)) {
                if (verifyPassword($password)) {
                    if (!file_exists($filePath)) {                                  
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        file_put_contents($filePath, $hashed_password);
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
            if (ctype_alnum($login) && preg_match('/^[a-zA-Z0-9]+$/', $login)) {
                if (file_exists($filePath)) {
                    $stored_password = file_get_contents($filePath);
                    if (password_verify($password, $stored_password)) {
                        $_SESSION["CONNECTED"] = $login;
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
        
    function disconnect_user($username) {
        if (isset($_SESSION["CONNECTED"]) && $_SESSION["CONNECTED"] == $username) {
            unset($_SESSION["CONNECTED"]);
            return 0;
        } else {
            return 1;
        }
    }

    function update_user($username, $old_password, $new_password) {
        $filePath = __DIR__ . "/users/" . $username . ".txt";
        $filePath = str_replace("\\", "/", $filePath);
    
        if (!empty($username) && !empty($old_password) && !empty($new_password)) {
            if (ctype_alnum($username) && preg_match('/^[a-zA-Z0-9]+$/', $username)) {
                if (file_exists($filePath)) {
                    $stored_password = file_get_contents($filePath);
                    if (password_verify($old_password, $stored_password)) {
                        if (verifyPassword($new_password)) {
                            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                            file_put_contents($filePath, $hashed_new_password);
                            // printf("Mot de passe mis à jour avec succès !");
                            return 0; // Le mot de passe a été mis à jour avec succès
                        } else {
                            // printf("Le nouveau mot de passe ne respecte pas les critères de sécurité.");
                            return 1; // Le nouveau mot de passe ne respecte pas les critères de sécurité
                        }
                    } else {
                        // printf("L'ancien mot de passe est incorrect.");
                        return 2; // L'ancien mot de passe est incorrect
                    }
                } else {
                    // printf("L'utilisateur n'existe pas.");
                    return 3; // L'utilisateur n'existe pas
                }
            } else {
                // printf("Tentative d'injection SQL.");
                return 4; // Une tentative d'injection SQL a eu lieu
            }
        } else {
            // printf("Veuillez remplir tous les champs.");
            return 5; // Les champs sont vides
        }
    }
    
    function delete_user($username) {
        $filePath = __DIR__ . "/users/" . $username . ".txt";
        $filePath = str_replace("\\", "/", $filePath);
    
        if (!empty($username)) {
            if (ctype_alnum($username) && preg_match('/^[a-zA-Z0-9]+$/', $username)) {
                if (file_exists($filePath)) {
                    unlink($filePath);
                    // printf("Utilisateur supprimé avec succès !");
                    return 0; // L'utilisateur a été supprimé avec succès
                } else {
                    // printf("L'utilisateur n'existe pas.");
                    return 1; // L'utilisateur n'existe pas
                }
            } else {
                // printf("Tentative d'injection SQL.");
                return 2; // Une tentative d'injection SQL a eu lieu
            }
        } else {
            // printf("Veuillez fournir un nom d'utilisateur.");
            return 3; // Le champ est vide
        }
    }
    

    function verifyPassword($password) {
        // Vérification de la longueur
        if (strlen($password) < 8) {
            return false;
        }
        if (strlen($password) > 25) {
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

