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
            if (isset($_SESSION['droits'])){
                $droits = filter_var($_SESSION['droits'], FILTER_SANITIZE_NUMBER_INT);
                if($droits == $_SESSION['droits'] && $droits >= 1){
                    $dVueEreur[]='Erreur utilisateur déjà connecté !</br>Tu n\'aurais jamais du te retrouver là...';
                    require('erreur.php');
                    return;
                }
            }
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