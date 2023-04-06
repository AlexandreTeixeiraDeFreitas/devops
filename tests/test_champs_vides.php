<?php
    include 'fonction.php';

    $r1 = create_user("", "P@ssw0rd!");
    $r2 = create_user("username", "");
    $r3 = create_user("", "");

    if ($r1 == 4 && $r2 == 4 && $r3 == 4) {
        printf("true");
    } else {
        printf("false");
    }