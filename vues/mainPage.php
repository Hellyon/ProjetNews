<?php
/**
 * Created by PhpStorm.
 * User: ilbenjello
 * Date: 04/12/17
 * Time: 15:49
 */

$string = NULL;
$string .= "<table align=\"center\">
            <tr>
                <th>Site</th>
            </tr>";
if(count($results) >= 1){
    foreach ($results as $result){
        $string .= "<tr><td><a href='./index.php?site=".$result['site']."'>".$result['site']."</a></td>";
    }
}
else{
        print("<div><p>Il n'y a pas de news à afficher. Ajoutez des flux à la base de données !</p></div>");
        return;
}
if(isset($site)) {
    echo($string);
    try {
        $string = NULL;
        foreach ($parserResults->channel as $channel) {
            $string .= "<table align=\"center\">
            <tr>
                <th>Date</th>
                <th>Site</th>
                <th>URL</th>
            </tr>";
            foreach ($channel->item as $item) {
                $string .= "<tr>";
                $string .= "<td>" . $item->pubDate . "</td>" . '<td><img src="' . $channel->image->url . '"/> ' . $channel->title . ' </td>' . '<td><a href="' . $item->link . '">'
                    . $item->title . '</a></td>';
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
