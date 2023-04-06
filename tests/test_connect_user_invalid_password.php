<?php
include '../fonction.php';

create_user("username", "P@ssword1");

$r1 = connect_user('username', 'P@ssword1');
$r2 = connect_user('username', 'wrong_password');
$r3 = connect_user('username', 'p@ssword1');
$r4 = connect_user('username', 'P@/ssword1');

// printf($r1.' : '.$r2.' : '.$r3.' : '.$r4);

if ($r1 !== 1 && $r2 === 1 && $r3 === 1 && $r4 === 1) {
    printf("true");
} else {
    printf("false");
}