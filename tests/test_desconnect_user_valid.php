<?php
include '../fonction.php';
session_start();
create_user("username8", "P@ssword1");
connect_user('username8', 'P@ssword1');
$r1 = disconnect_user('username8');
// printf("r1: ".$r1);
if ($r1 === 0) {
    printf("true");
} else {
    printf("false");
}
