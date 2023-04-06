<?php
include 'fonction.php';

// Données d'entrée : champs vides
$login = "";
$password = "";

// Appel de la fonction à tester
$result = create_user($login, $password);

// Vérification du résultat
if ($result === false) {
    printf("  Test réussi : champs vides\n");
} else {
    printf("  Test échoué : champs vides\n");
}
?>
