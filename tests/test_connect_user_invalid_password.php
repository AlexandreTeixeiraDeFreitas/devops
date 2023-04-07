<?php
include '../fonction.php';

create_user("username1", "P@ssword1");
$r1 = connect_user('username1', 'wrong_password');
$r2 = connect_user('username1', 'P@sswor');
$r3 = connect_user('username1', 'P@sswor');

// printf("r1: ".$r1." r2: ".$r2." r3: ".$r3);

if ($r1 === 1 && $r2 === 1 && $r3 === 1) {
    printf("true");
} else {
    printf("false");
}