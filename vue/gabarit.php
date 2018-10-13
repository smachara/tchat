<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <base href="<?= $racineWeb ?>" >
    <link rel="stylesheet" href="template/style.css" />
    <title><?= $titre ?></title>
</head>
<body>
<div id="global">
    <header>
<!--        <a href=""><h1 id="titreChat">T - Chat</h1></a>-->
       <h2> <span class="conected-bar">Salut, <?= $_SESSION ["surnom"]?></span></h2>

    </header>
    <div id="contenu">
        <?= $contenu ?>
    </div> <!-- #contenu -->

</div>
</body>
</html>