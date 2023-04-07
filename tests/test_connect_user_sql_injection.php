<?php
include '../fonction.php';

create_user("username8", "P@ssword1");
session_start();
$r1 = connect_user('username8', 'P@ssword1');
$r2 = connect_user('username8', 'wrong_password');
$r3 = connect_user('non_existent_user', 'p@ssword1');
$r4 = connect_user('username8\' OR 1=1 --', 'p@ssword1');
    // printf("r1: ".$r1." r2: ".$r2." r3: ".$r3." r4: ".$r4);
if ($r1 === 0 && $r2 === 1 && $r3 === 3 && $r4 === 3) {
    printf("true");
} else {
    printf("false");
}