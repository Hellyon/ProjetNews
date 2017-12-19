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
            echo ("<div align='center'>$value</div>");
        }
        exit(1);
    }
    ?>
</div>
</body> </html>