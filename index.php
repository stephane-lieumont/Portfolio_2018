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
        <meta property="og:title" content="SLI3D" />
        <meta property="og:type" content="portfolio" />
        <meta property="og:image" content="https://portfolio.sli-3d.fr/Images/SLI-3D-portfolio.jpg" />
        <meta property="og:image:url" content="https://portfolio.sli-3d.fr/Images/SLI-3D-portfolio.jpg" />
        <meta property="og:image:type" content="image/jpeg" />
        <meta property="og:image:width" content="250" />
        <meta property="og:image:height" content="250" />
        <meta property="og:site_name" content="Portfolio Stéphane Lieumont" />
        <meta property="og:description" content="Stéphane lieumont - CG Artist Toulouse | Portfolio 3D - Zbrush, 3DSmax, Vray, Substance... ">
        <meta property="og:url" content="https://portfolio.sli-3d.fr/" />
        <meta property="og:language" content="fr" />
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#303135">
        <meta name="description" content="Stéphane lieumont - CG Artist Toulouse | Portfolio 3D - Zbrush, 3DSmax, Vray, Substance... ">
        <title>SLI3D | Stéphane LIEUMONT | Graphiste 3D Toulouse</title>
        <link rel="apple-touch-icon" sizes="57x57" href="Images/Favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="Images/Favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="Images/Favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="Images/Favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="Images/Favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="Images/Favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="Images/Favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="Images/Favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="Images/Favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="Images/Favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="Images/Favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="Images/Favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="Images/Favicon/favicon-16x16.png">
        <link rel="manifest" href="Images/Favicon/manifest.json">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "Portfolio",
                "url": "https://portfolio.sli-3d.fr",
                "name": "Portfolio stephane LIEUMONT - Graphiste 3D Toulouse",
                "sameAs" : [
                    "https://www.linkedin.com/in/stéphane-lieumont-143b54100",
                    "https://www.artstation.com/s-lieumont"
                ],
                "contactPoint": {
                    "@type": "ContactPoint",
                    "telephone": "+33-6-37-35-35-79",
                    "contactType": "Contact"
                }
            }
        </script>
        <?= CreateLink('css', CSS_LINKS) ?>
	</head>
	<body>
        <?php require '_loader.php' ?>
        <?php require '_header.php' ?>
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
            <script async>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', 'UA-167354753-1');
            </script>
            <script src="https://www.google.com/recaptcha/api.js"></script>
    </body>
</html>
<?php
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['errors']);
?>