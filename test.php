<?php
include 'index.php';

class CreateUserTest
{
    public function testCreateUserWithValidInput()
    {
        // Données d'entrée valides
        $login = "johndoe";
        $password = "P@ssw0rd123";

        // Appel de la fonction à tester
        $result = create_user($login, $password);

        // Vérification du résultat
        printf("Utilisateur créé avec succès !", $result);
    }

    public function testCreateUserWithInvalidLogin()
    {
        // Données d'entrée avec login invalide
        $login = "john123";
        $password = "P@ssw0rd123";

        // Appel de la fonction à tester
        $result = create_user($login, $password);

        // Vérification du résultat
        printf("Le login ne doit pas contenir de chiffre ou de caractère spécial.", $result);
    }

    public function testCreateUserWithInvalidPassword()
    {
        // Données d'entrée avec mot de passe invalide
        $login = "johndoe";
        $password = "password123";

        // Appel de la fonction à tester
        $result = create_user($login, $password);

        // Vérification du résultat
        printf("Le mot de passe ne respecte pas les critères de sécurité.", $result);
    }

    public function testCreateUserWithMissingInput()
    {
        // Données d'entrée manquantes
        $login = "";
        $password = "";

        // Appel de la fonction à tester
        $result = create_user($login, $password);

        // Vérification du résultat
        printf("Veuillez remplir tous les champs.", $result);
    }
}


