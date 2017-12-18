<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Lea News du Friday</title>
    <link type="text/css" href="vues/stylesheet.css" rel="stylesheet" media="all" />
    <link type="text/css" href="vues/Index.css" rel="stylesheet" media="all" />
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