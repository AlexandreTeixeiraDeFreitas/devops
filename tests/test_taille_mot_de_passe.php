<?php
    include 'fonction.php';

    $r1 = create_user("username", "P@ss1");
    $r2 = create_user("username", "P@ssw0rd!");

    if (!$r1 && $r2) {
        printf("true");
    } else {
        printf("false");
    }