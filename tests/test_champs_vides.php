<?php
    include 'fonction.php';

    $r1 = create_user("", "p@ssword1");
    $r2 = create_user("username", "");

    if (!$r1 && !$r2) {
        printf("true");
    } else {
        printf("false");
    }