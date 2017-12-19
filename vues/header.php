<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Les News du Friday</title>
    <link type="text/css" href="assets/stylesheet.css" rel="stylesheet" media="all" />
    <link type="text/css" href="assets/Index.css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css"></style>
</head>
<body>
<header>
    <h1><a href="index.php">Les News du Friday</a></h1>
</header>
<nav class="Rubrique">
    <ul class="menu">
        <li class="navigation-lien media">
            <?php
                if(isset($_SESSION['pseudo_admin'])) print("Bienvenue " . $_SESSION['pseudo_admin'] . " !");
                else echo("-");
            ?>
        </li>
    </ul>
</nav>
</body>
