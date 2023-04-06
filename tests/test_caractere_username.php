<?php
    include 'fonction.php';

    $r1 = create_user("username", "P@ssw0rd!");
    $r2 = create_user("usern@me", "P@ssw0rd!");
    $r3 = create_user("user_name", "P@ssw0rd!");

    if ($r1 && !$r2 && !$r3) {
        printf("true");
    } else {
        printf("false");
    }