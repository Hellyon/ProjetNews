<html>
<head>
    <title>Connexion</title>
</head>
    <body>
    <?php
    // on v�rifie les donn�es provenant du mod�le
    if (isset($dVue))
    ?>
        <div align="center">

            <h2>Connexion - formulaire</h2>
            <?php
            if (isset($_SESSION['droits'])) $dVueEreur[]='Erreur utilisateur déjà connecté !</br>Tu n\'aurais jamais du te retrouver là...';
            if (isset($dVueEreur) && count($dVueEreur)>0) {
                echo "<h2>ERREUR !!!!!</h2>";
                foreach ($dVueEreur as $value){
                    echo $value;
                    return;
                }}
            ?>

            <form method="post" name="formCo" action="index.php?route=validationConnexion">
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
            </form>
        </div>
    </body>
</html>