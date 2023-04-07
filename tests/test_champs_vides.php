<?php
    include '../fonction.php';

    $r1 = create_user("", "P@ssw0rd!");
    $r2 = create_user("username", "");
    $r3 = create_user("", "");
    $r4 = create_user("username", "P@ssw0rd!");
    // printf("r1: ".$r1." r2: ".$r2." r3: ".$r3." r4: ".$r4);
    if ($r1 == 4 && $r2 == 4 && $r3 == 4 && $r4 < 2) {
        printf("true");
    } else {
        printf("false");
    }