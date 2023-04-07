<?php
    include '../fonction.php';
    $r1 = create_user("username", "P@ssw0rd!");
    $r2 = create_user("usern@me", "P@ssw0rd!");
    $r3 = create_user("user_name", "P@ssw0rd!");
    $r4 = create_user("user123", "P@ssw0rd!");
    $r5 = connect_user('username\' OR 1=1 --', 'p@ssword1');
    $r6 = connect_user('username1741852963741852963azertyuiopdfghjklvbncvghj', 'p@ssword1');
    // printf("r1: ".$r1." r2: ".$r2." r3: ".$r3." r4: ".$r4." r5: ".$r5." r6: ".$r6);
    if ($r1 < 2 && $r2 == 3 && $r3 == 3 && $r4 = 3 && $r5 = 3 && $r6 = 3) {
        printf("true");
    } else {
        printf("false");
    }
    