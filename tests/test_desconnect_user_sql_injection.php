<?php
include '../fonction.php';

create_user("username7", "P@ssword1");
connect_user('username7', 'P@ssword1');
$r1 = disconnect_user("username7'; DROP TABLE users; --", "P@ssword1");
printf("r1: ".$r1);
if ($r1 === 3) {
    printf("true");
} else {
    printf("false");
}

