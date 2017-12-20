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
            <form class="formAdmin" method="post" name="formCo" action="index.php?route=validationConnexion">
                <div class="form-group">
                    <label for="login">Login:</label>
                    <input type="text" class="form-control" value="<?= $dVue['admin']  ?>" name="txtAdmin">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" value="<?= $dVue['mdp'] ?>" name="txtmdp">
                </div>
                <button type="submit" class="btn btn-primary">Enter</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <input type="hidden" name="action" value="validationFormulaire">
            </form>
        </div>
    </body>
</html>