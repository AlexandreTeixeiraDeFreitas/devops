<?php
include 'fonction.php';

// Données d'entrée : username contient un chiffre
$login = "john123";
$password = "P@ssw0rd123";

// Appel de la fonction à tester
$result = create_user($login, $password);

// Vérification du résultat
if ($result === false) {
    printf("  Test réussi : username contient un chiffre\n");
} else {
    printf("  Test échoué : username contient un chiffre\n");
}

// Données d'entrée : username contient un caractère spécial
$login = "johndoe@";
$password = "P@ssw0rd123";

// Appel de la fonction à tester
$result = create_user($login, $password);

// Vérification du résultat
if ($result === false) {
    printf("  Test réussi : username contient un caractère spécial\n");
} else {
    printf("  Test échoué : username contient un caractère spécial\n");
}

// Données d'entrée : username contient uniquement des lettres
$login = "johndoe";
$password = "P@ssw0rd123";

// Appel de la fonction à tester
$result = create_user($login, $password);

// Vérification du résultat
if ($result === true) {
    printf("  Test réussi : username contient uniquement des lettres\n");
} else {
    printf("  Test échoué : username contient uniquement des lettres\n");
}
