<?php
    include '../fonction.php';
    $r1 = create_user("username", "P@ssw0rd!");
    $r2 = create_user("usern@me", "P@ssw0rd!");
    $r3 = create_user("user_name", "P@ssw0rd!");
    $r4 = create_user("user123", "P@ssw0rd!");
    $r4 = connect_user('username\' OR 1=1 --', 'p@ssword1');
    // printf("r1: ".$r1." r2: ".$r2." r3: ".$r3." r4: ".$r4);
    if ($r1 < 2 && $r2 == 3 && $r3 == 3 && $r4 = 3) {
        printf("true");
    } else {
        printf("false");
    }