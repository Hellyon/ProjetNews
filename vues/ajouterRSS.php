<html>
<head>
    <title>AjouterRSS</title>
</head>
<body>
<?php
// on v�rifie les donn�es provenant du mod�le
if (isset($dVue))
?>
<div align="center">

    <h2>Ajouter un flux - formulaire</h2>
    <?php
    if (isset($_SESSION['droits'])){
        $droits = filter_var($_SESSION['droits'], FILTER_SANITIZE_NUMBER_INT);
        if($droits == $_SESSION['droits'] && $droits != 2){
            print($droits);
            $dVueEreur[]="EREEUR 403 - INTERDIT</br>Vous n'avez pas les droits requis afin d'accéder cette page !!";
            require('erreur.php');
            return;
        }
    }
    ?>

    <form method="post" name="formAjoutRSS" action="index.php?route=validationAjouterRSS">
        <table> <tr>
                <td>URL</td>
                <td><input name="txturl" value="<?= $dVue['url']  ?>" type="text" size="50" required></td>
            </tr>
            <tr><td>Nom du site</td>
                <td><input name="txtsite" value="<?= $dVue['site'] ?>" type="text" size="30" required></td>
            </tr>
            <tr>
        </table>
        <table> <tr>
                <td><input type="submit" value="Envoyer"></td>
                <td><input type="reset" value="Rétablir"></td>
                </td> </tr> </table>

        <!-- action !!!!!!!!!! -->
        <input type="hidden" name="action" value="validationFormulaire">
    </form>
</div>
</body>
</html>