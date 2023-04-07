<?php
    include '../fonction.php';

    // Crée un utilisateur de test
    create_user("testuser", "P@ssw0rd!");

    // Test 1: Met à jour le mot de passe avec succès
    $r1 = update_user("testuser", "P@ssw0rd!", "N3wP@ssw0rd!");
    
    // Test 2: Tentative d'injection SQL
    $r2 = update_user("testuser' OR 1=1 --", "P@ssw0rd!", "N3wP@ssw0rd!");

    // Test 3: L'utilisateur n'existe pas
    $r3 = update_user("nonexistent_user", "old_password", "new_password");

    // Test 4: L'ancien mot de passe est incorrect
    $r4 = update_user("testuser", "IncorrectPassword", "N3wP@ssw0rd!");

    // Test 5: Le nouveau mot de passe ne respecte pas les critères de sécurité
    $r5 = update_user("testuser", "N3wP@ssw0rd!", "weakpassword");

    // Test 6: Les champs sont vides
    $r6 = update_user("", "", "");

    $r7 = update_user("testuser", "N3wP@ssw0rd!", "P@sswordaazertyuiopqsdfazgherjtykulimopk");
    // printf("r1: ".$r1." r2: ".$r2." r3: ".$r3." r4: ".$r4." r5: ".$r5." r6: ".$r6." r7: ".$r7);
    // Vérification des résultats
    if ($r1 == 0 && $r2 == 4 && $r3 == 4 && $r4 == 2 && $r5 == 1 && $r6 == 5 && $r7 == 1) {
        printf("true");
    } else {
        printf("false");
    }
?>
