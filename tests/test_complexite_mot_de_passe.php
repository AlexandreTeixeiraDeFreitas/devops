<?php
    include '../fonction.php';

    $r1 = create_user("username", "password");
    $r2 = create_user("username", "P@ssw0rd!");
    $r3 = create_user("username", "P@SSW0RD!");
    $r4 = create_user("username", "password1");
    $r5 = create_user("username", "Passw0rd");
    $r6 = create_user("username", "P@ssword");

    if ($r1 == 2 && $r2 < 2 && $r3 == 2 && $r4 == 2 && $r5 == 2 && $r6 == 2) {
        printf("true");
    } else {
        printf("false");
    }