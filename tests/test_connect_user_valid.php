<?php
include '../fonction.php';

create_user("username3", "P@ssword1");

$r1 = connect_user('username3', 'P@ssword1');

if ($r1 === 0) {
    printf("true");
} else {
    printf("false");
}