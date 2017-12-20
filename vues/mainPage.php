<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <h3><?php
        if(isset($_SESSION['pseudo_admin'])) print("Bienvenue " . $_SESSION['pseudo_admin'] . " !");
        ?></h3>
    <ul class="navbar-nav">
        <?php
        if(!isset($_SESSION['pseudo_admin'])){
            echo('<li class="nav-item"><a class="nav-link" href="index.php?route=connexionAdmin">Connexion Administrateur</a></li>');
        }
        else{
            echo('<li class="nav-item"><a class="nav-link" href="index.php?route=deconnexion">Se deconnecter</a></li>');
            echo('<li class="nav-item"><a class="nav-link" href="index.php?route=ajouterRSS">Ajouter flux RSS</a></li>');
            echo('<li class="nav-item"><a class="nav-link" href="index.php?route=supprimerRSS">Supprimer flux RSS</a></li>');
            echo('<li class="nav-item"><a class="nav-link" href="index.php?route=updateNbNews">Nombre de News à afficher</a></li>');
        }
        ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                RSS Feeds
            </a>
            <div class="dropdown-menu">
                <?php
                $string = NULL;
                if(count($results) >= 1){
                    foreach ($results as $result){
                        $string .= "<a class='dropdown-item' href='./index.php?site=".$result['site']."'>".$result['site']."</a>";
                    }
                    echo($string);
                }
                ?>
            </div>
        </li>
    </ul>
    <?php
    if(isset($site)){
        echo("<p class=\"navbar-brand\">Vous regardez les news de ".$site."</p>");
    }

    ?>
</nav>
<?php
if(isset($site)) {
    try {
        $string = NULL;
        foreach ($parserResults->channel as $channel) {
            $string .= "<table class='table table-striped' align=\"center\">
            <tr>
                <th>Date</th>
                <th>URL</th>
                <th>Description</th>
            </tr>";
            foreach ($channel->item as $item) {
                $string .= "<tr>";
                $string .= "<td>" . $item->pubDate . "</td>" . '<td><a href="' . $item->link . '">'
                    . $item->title . '</a></td><td>'.strip_tags($item->description).'</td>';
                $string .= "</tr>";
            }
            $string .= "</table>";
        }
        echo($string);
    } catch (\Exception $e) {
        global $rep, $vues;
        $dVueEreur[] = "Erreur inattendue!!! ";
        require($rep . $vues['erreur']);
    }
}
else{
    echo("<div><p>Bonjour, veuillez choisir un flux.</p></div>");
}
?>
