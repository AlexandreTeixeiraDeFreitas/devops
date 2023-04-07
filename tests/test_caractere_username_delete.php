<?php
include '../fonction.php';

create_user("username123", "P@ssword1");
$r1 = delete_user('username@');
$r2 = delete_user('username-');
$r3 = delete_user('username_');
$r4 = delete_user('username!');
printf("r1: ".$r1." r2: ".$r2." r3: ".$r3." r4: ".$r4);

if ($r1 === 3 && $r2 === 3 && $r3 === 3 && $r4 === 3) {
    printf("true");
} else {
    printf("false");
}
