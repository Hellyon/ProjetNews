<html>
<head><title>Connection</title>
</head>

<body>
<?php


// on v�rifie les donn�es provenant du mod�le
if (isset($dVue))
{?>
    <div align="center">


        <?php
        if (isset($dVueEreur) && count($dVueEreur)>0) {
            echo "<h2>ERREUR !!!!!</h2>";
            foreach ($dVueEreur as $value){
                echo $value;
            }}
        ?>

        <h2>Connection - formulaire</h2>
        <hr>
        <!-- affichage de donn�es provenant du mod�le -->
        <?= $dVue['data']  ?>


        <form method="post" name="formCo" action="index.php">
        <table> <tr>
                <td>Admin</td>
                <td><input name="txtAdmin" value="<?= $dVue['admin']  ?>" type="text" size="20"></td>
            </tr>
            <tr><td>Mot de passe</td>
                <td><input name="txtmdp" value="<?= $dVue['mdp'] ?>" type="text" size="20" required></td>
            </tr>
            <tr>
        </table>
        <table> <tr>
                <td><input type="submit" value="Envoyer"></td>
                <td><input type="reset" value="Rétablir"></td>
                </td> </tr> </table>

        <!-- action !!!!!!!!!! -->
        <input type="hidden" name="action" value="validationFormulaire">
        </form></div>

<?php }
else {
    print ("erreur !!<br>");
    print ("utilisation anormale de la vuephp");
} ?>
</body> </html>