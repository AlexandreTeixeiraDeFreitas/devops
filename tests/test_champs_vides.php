<?php
    include '../fonction.php';

    $r1 = create_user("", "P@ssw0rd!");
    $r2 = create_user("username", "");
    $r3 = create_user("", "");
    $r4 = create_user("username", "P@ssw0rd!");

    if ($r1 == 4 && $r2 == 4 && $r3 == 4 && $r4 == 0) {
        printf("true");
    } else {
        printf("false");
    }