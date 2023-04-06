<?php
    include 'fonction.php';

    $r1 = create_user("username", "P@ss1");
    $r2 = create_user("username", "P@ssw0rd!");
    $r3 = create_user("username", "P@ssw0rd!P@ssw0rd!");

    if ($r1 == 2 && $r2 == 0 && $r3 == 0) {
        printf("true");
    } else {
        printf("false");
    }