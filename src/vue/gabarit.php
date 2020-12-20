<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <base href="/gestion-eleves-mvc/src/" >
        <link rel="stylesheet/less" type="text/css" href="index.less" />
        <script src="lib/less.js"></script>
        <script src="lib/jquery-3.5.1.min.js"></script>
        <script src="lib/jquery.validate.js"></script>
        <script src="lib/messages_fr.js"></script>
        <title><?= $title?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreSite"> Gestion des Elèves</h1></a>
            </header>
            <div id="contenu" class="contenu">
                <?= $contenu?>
            </div>
            <footer>
                <p> &copycopyright 2020 by Mazen</p>
                <p> Gestion des Elèves- MVC</p>
            </footer>
        
        </div>
    </body>

</html>