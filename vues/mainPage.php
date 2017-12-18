<html>
    <table align="center">
        <tr>
            <th>Date</th>
            <th>Site</th>
            <th>URL</th>
        </tr>
        <?php
        /**
         * Created by PhpStorm.
         * User: ilbenjello
         * Date: 04/12/17
         * Time: 15:49
         */
        try {
            $string = NULL;
            foreach ($parserResults[0]->channel as $channel) {
                foreach ($channel->item as $item){
                    $string .= "<tr>";
                    $string .= "<td>".$item->pubDate."</td>".'<td><img src="'.$channel->image->url.'"/> '.$channel->title.' </td>'.'<td><a href="'.$item->link.'">'
                    .$item->title.'</a></td>';
                    $string .= "</tr>";
                }
            }
            echo($string);
        }
        catch(\Exception $e){
            global $rep, $vues;
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }
        ?>
    </table>
</html>