<?php
include '../fonction.php';

create_user("username", "p@ssword1");

$r1 = connect_user('username', 'p@ssword1');
$r2 = connect_user('username', 'wrong_password');
$r3 = connect_user('non_existent_user', 'p@ssword1');
$r4 = connect_user('username\' OR 1=1 --', 'p@ssword1');

if ($r1 === 0 && $r2 !== 0 && $r3 !== 0 && $r4 !== 0) {
    printf("true");
} else {
    printf("false");
}