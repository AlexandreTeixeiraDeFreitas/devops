<?php
include '../fonction.php';

create_user("username", "P@ssword1");
$r1 = connect_user('username', 'P@ssword1');
$r2 = connect_user('username5', 'wrong_password');
$r3 = connect_user('nonexistentuser', 'P@ssword1');
$r4 = connect_user('usernama', 'P@ssword1');
printf("r1: ".$r1." r2: ".$r2." r3: ".$r3." r4: ".$r4);
if ($r1 !== 2 && $r2 !== 2 && $r3 === 2 && $r4 === 2) {
    printf("true");
} else {
    printf("false");
}
