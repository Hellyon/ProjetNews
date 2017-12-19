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

    <h2>Supprimer un flux - formulaire</h2>
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
                if(count($tRSS) >= 1){
                    foreach ($tRSS as $RSS){
                        print("<td><input name='txtsite' value='{$RSS->getSite()}' type='submit'></td>");
                    }
                }
                else{
                    print("<p>Il n'y a pas de flux à supprimer</br></p>");
                }
                ?>
        </table>
</div>
</body>
</html>