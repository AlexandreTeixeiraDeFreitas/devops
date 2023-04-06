<?php
include '../fonction.php';

$r1 = connect_user('username', 'p@ssword1');
$r2 = connect_user('username', 'wrong_password');
$r3 = connect_user('non_existent_user', 'p@ssword1');
$r4 = connect_user('username\' OR 1=1 --', 'p@ssword1');

if ($r1 !== 2 && $r2 !== 2 && $r3 === 2 && $r4 !== 2) {
    printf("true");
} else {
    printf("false");
}