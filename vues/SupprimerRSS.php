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

    <form method="post" name="formSupprRSS" action="index.php?route=validationSupprimerRSS">
        <table> <tr>
                <?php
                    foreach ($tRSS as $RSS){
                        print('<td><input name="SuppRSS" value="$RSS" type="submit" value="Supprimer"></td>');
                    }
                ?>
        </table>
        <table> <tr>
                <td><input type="submit" value="Supprimer"></td>
                </td> </tr> </table>

        <!-- action !!!!!!!!!! -->
        <input type="hidden" name="action" value="validationFormulaire">
    </form>
</div>
</body>
</html>