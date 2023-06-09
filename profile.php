<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <style>
        input[type="submit"]:hover, button[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <h1>Profil</h1>
    <?php
    // session_start();
    include 'fonction.php';
    if (isset($_SESSION["CONNECTED"])) {
        printf("Bienvenue, " . $_SESSION["CONNECTED"] . "!");

        if (isset($_POST['logout'])) {
            disconnect_user($_SESSION["CONNECTED"]);
            printf('<script>window.location.href = "index.php";</script>');
        }

        if (isset($_POST['delete_user'])) {
            delete_user($_SESSION["CONNECTED"]);
            printf('<script>window.location.href = "index.php";</script>');
        }
    }else{
        printf('<script>window.location.href = "index.php";</script>');
    }
    ?>
    <form method="post">
        <button type="submit" name="logout">Se déconnecter</button>
        <button type="submit" name="delete_user">Supprimer l'utilisateur</button>
    </form>
</body>
</html>
