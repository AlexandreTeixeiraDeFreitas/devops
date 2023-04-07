<?php
include '../fonction.php';
session_start();
create_user("username2", "P@ssword1");
$r1 = connect_user('username4', 'P@ssword1');
$r2 = connect_user('username5', 'P@ssword1');
$r3 = connect_user('nonexistentuser', 'P@ssword1');
$r4 = connect_user('usernama', 'P@ssword1');
// printf("r1: ".$r1." r2: ".$r2." r3: ".$r3." r4: ".$r4);
if ($r1 === 2 && $r2 === 2 && $r3 === 2 && $r4 === 2) {
    printf("true");
} else {
    printf("false");
}
