<?php
    include '../fonction.php';

    $r1 = create_user("username", "P@ss1");
    $r2 = create_user("username", "P@ssw0rd!");
    $r3 = create_user("username", "P@ssw0rd!P@ssw0rd!");
    $r4 = create_user("username", "P@ssw0rd!P@ssw0rd!azertyuiopazertyuiopazertyuiopazertyuiop");

    if ($r1 == 2 && $r2 < 2 && $r3 < 2 && $r4 == 2) {
        printf("true");
    } else {
        printf("false");
    }