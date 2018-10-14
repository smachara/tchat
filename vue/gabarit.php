
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
        <?php if (isset($_SESSION['surnom']) && $_SESSION['surnom'] != ""): ?>

            <h2> <span class="conected-bar"><?= 'Salut, ' . $_SESSION['surnom'] ?></span></h2>
            <a href="Connexion\deconnexion">Se deconecter</a>

        <?php endif ?>


    </header>
    <div id="contenu">
        <?= $contenu ?>
    </div> <!-- #contenu -->

</div>
</body>
</html>