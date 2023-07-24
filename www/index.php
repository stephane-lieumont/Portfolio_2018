<?php require '_config.php'; ?>
<?php require '_inc_class.php'; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimal-ui" />
        <meta http-equiv="Content-Type" content="text/html"/>
        <meta http-equiv="content-language" content="fr" />
        <meta name="language" content="fr" />
        <meta name="copyright" content="Stéphane Lieumont" />
        <meta name="author" content="Stéphane Lieumont" />        
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#303135">
        <meta name="description" content="Stéphane lieumont - CG Artist Toulouse | Portfolio 3D - Zbrush, 3DSmax, Vray, Substance... ">
        <title>SLI3D | Stéphane LIEUMONT | Graphiste 3D Toulouse</title>
        <link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="images/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/manifest.json">
        <?= CreateLink('css', CSS_LINKS) ?>
	</head>
	<body>
        <?php require '_loader.php' ?>
        <?php require '_header.php' ?>
        <div class="demo-banner">DEMO</div>
        <main>
            <?php require '_accueil.php' ?>
            <?php require '_portfolio.php' ?>
            <?php require '_profil.php' ?>
            <?php require '_contact.php' ?>
        </main>
        <div id="ScrollTop">
            <a href="#Presentation-sli3d-stephane-lieumont" data-anchor="Presentation-sli3d-stephane-lieumont">Retour</a>
        </div>
        <?php require '_footer.php' ?>
            <?= CreateLink('js', JAVA_LINKS) ?>
            <?= CreateLink('css_async', CSS_LINKS_ASYN) ?>
    </body>
</html>
<?php
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['errors']);
?>