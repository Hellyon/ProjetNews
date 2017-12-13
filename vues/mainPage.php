<html>
    <div><h1 align="center" >Actualité du Friday</h1></div>
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
            foreach ($results as $news) {
                echo ("<tr>");
                echo ($news);
                echo ("</tr>");
            }
        }
        catch(\Exception $e){
            global $rep, $vues;
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }
        ?>
    </table>
<div><a href="index.php?route=connectionAdmin">Connection Administrateur</a></div>
</html>