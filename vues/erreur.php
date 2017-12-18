<html>
    <head>
        <title>Erreur</title>
    </head>

<body>

<h2>ERREUR !!!!!</h2>
<div>
    <?php
    if (isset($dVueErreur)) {
        foreach ($dVueErreur as $value){
            echo $value;
        }
    }
    ?>
</div>
</body> </html>