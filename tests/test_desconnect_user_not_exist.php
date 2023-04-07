<?php
include '../fonction.php';

create_user("username6", "P@ssword1");
connect_user('username6', 'P@ssword1');
$r1 = disconnect_user('nonexistentuser', 'P@ssword1');
printf("r1: ".$r1);
if ($r1 === 2) {
    printf("true");
} else {
    printf("false");
}
