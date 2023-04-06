<?php
include 'fonction.php';

// Données d'entrée : mot de passe trop court
$login = "john";
$password = "P@ssw0r";

// Appel de la fonction à tester
$result = create_user($login, $password);

// Vérification du résultat
if ($result === false) {
    printf("  Test réussi : mot de passe trop court\n");
} else {
    printf("  Test échoué : mot de passe trop court\n");
}

// Données d'entrée : mot de passe de taille correcte
$login = "johndoe";
$password = "P@ssw0rd123";

// Appel de la fonction à tester
$result = create_user($login, $password);

// Vérification du résultat
if ($result === true) {
    printf("  Test réussi : mot de passe de taille correcte\n");
} else {
    printf("  Test échoué : mot de passe de taille correcte\n");
}
?>
