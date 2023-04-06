<?php
include 'fonction.php';

// Données d'entrée : mot de passe trop simple
$login = "john";
$password = "password";

// Appel de la fonction à tester
$result = create_user($login, $password);

// Vérification du résultat
if ($result === false) {
    printf("  Test réussi : mot de passe trop simple\n");
} else {
    printf("  Test échoué : mot de passe trop simple\n");
}

// Données d'entrée : mot de passe complexe
$login = "johndoe";
$password = "P@ssw0rd123";

// Appel de la fonction à tester
$result = create_user($login, $password);

// Vérification du résultat
if ($result === true) {
    printf("  Test réussi : mot de passe complexe\n");
} else {
    printf("  Test échoué : mot de passe complexe\n");
}
?>
