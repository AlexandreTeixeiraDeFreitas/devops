<?php
include '../fonction.php';

create_user("username5", "P@ssword1");
connect_user('username5', 'P@ssword1');
$r1 = disconnect_user('username5', 'wrong_password');
printf("r1: ".$r1);
if ($r1 === 1) {
    printf("true");
} else {
    printf("false");
}