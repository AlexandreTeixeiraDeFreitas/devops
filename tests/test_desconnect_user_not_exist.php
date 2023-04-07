<?php
include '../fonction.php';
session_start();
create_user("username6", "P@ssword1");
connect_user('username6', 'P@ssword1');
$r1 = disconnect_user('nonexistentuser');
$r2 = disconnect_user("username6'; DROP TABLE users; --");
// printf("r1: ".$r1);
if ($r1 === 1 && $r2 === 1) {
    printf("true");
} else {
    printf("false");
}
