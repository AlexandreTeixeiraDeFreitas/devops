<?php
        function create_user($login, $password)
        {
                file_put_contents("/var/www/html/users/".$login, $password);
        }
        create_user("admin", "toto");
?>