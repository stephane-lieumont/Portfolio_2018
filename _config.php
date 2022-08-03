<?php

    /*
     * DIRECTORY SERVEUR
     *
    require dirname(__DIR__).DIRECTORY_SEPARATOR.'Class'.DIRECTORY_SEPARATOR.'Form.php';
    require dirname(__DIR__).DIRECTORY_SEPARATOR.'Class'.DIRECTORY_SEPARATOR.'Validator.php';
    require dirname(__DIR__).DIRECTORY_SEPARATOR.'Class'.DIRECTORY_SEPARATOR.'InitMainPortfolio.php';
    */
    session_start();

    const CHEMIN_RELATIF_IMG_PORTFOLIO = 'Images/Portfolio/';
    const CHEMIN_RELATIF_STYLES = 'Styles/';
    const CHEMIN_RELATIF_SCRIPTS = 'Javascript/';
    const CHEMIN_RELATIF_PLUGINS_JS = 'Javascript/Plugins/';
    const MAIL_DESTINATAIRE = 'stephane-19@hotmail.fr';


    //CONFIGURATION DU HEAD (CSS ASYNC Chargé dans un script JS)
    const CSS_LINKS = [
            CHEMIN_RELATIF_STYLES.'loadpage.css',
    ];
    const CSS_LINKS_ASYN = [
            CHEMIN_RELATIF_STYLES.'main_style.css',
            CHEMIN_RELATIF_STYLES.'Lightgallery.min.css',
    ];
    const JAVA_LINKS = [
            CHEMIN_RELATIF_PLUGINS_JS.'jquery.min.js',
            CHEMIN_RELATIF_PLUGINS_JS.'parallaxie.min.js',
            CHEMIN_RELATIF_PLUGINS_JS.'Lightgallery-all.min.js',
            CHEMIN_RELATIF_SCRIPTS.'SLI3D_Class_Portfolio.min.js',
            CHEMIN_RELATIF_SCRIPTS.'SLI3D_main_1.3.min.js',                     
    ];

    //CONFIGURATION DE LA LISTE D'IMAGES DU PORTFOLIO
    const PORTFOLIO_IMG_LIST = [
        [
            'Image'=>		 '1-1-escart-wild-2015.jpg',
            'Image_Thumb'=>  '1-thumb-escart-wild-2015.jpg',
            'Image_Title'=>  'Escart Wild',
            'Logiciels'=>	 ['3DSmax','Vray','Zbrush', 'Photoshop'],
            'Categorie'=>    'Personnages',
            'RealeaseDate'=> '01/2015'
        ],
        [
            'Image'=>		 '27-Lego-Minions-2016.jpg',
            'Image_Thumb'=>  '27-thumb-Lego-Minions-2016.jpg',
            'Image_Title'=>  'Legos Minions',
            'Logiciels'=>	 ['3DSmax','Vray','Illustrator'],
            'Categorie'=>    'Personnages',
            'RealeaseDate'=> '12/2015'
        ],
        [
            'Image'=>		 '28-Extraterrestre-2016.jpg',
            'Image_Thumb'=>  '28-thumb-Extraterrestre-2016.jpg',
            'Image_Title'=>  'Extraterrestre',
            'Logiciels'=>	 ['3DSmax','Vray','Zbrush'],
            'Categorie'=>    'Personnages',
            'RealeaseDate'=> '05/2016'
        ],
        [
            'Image'=>		 '2-1-bibopp-2015.jpg',
            'Image_Thumb'=>  '2-thumb-bibopp-2015.jpg',
            'Image_Title'=>  'Bibopp',
            'Logiciels'=>	 ['3DSmax','Vray', 'Substance-Painter'],
            'Categorie'=>    'Personnages',
            'RealeaseDate'=> '03/2015'
        ],
        [
            'Image'=>		 '4-1-gorgotte-2015.jpg',
            'Image_Thumb'=>  '4-thumb-gorgotte-2015.jpg',
            'Image_Title'=>  'Gorgotte',
            'Logiciels'=>	 ['3DSmax','Vray','Zbrush'],
            'Categorie'=>    'Personnages',
            'RealeaseDate'=> '09/2014'
        ],
        [
            'Image'=>		 '5-1-auto-portrait-pixmodels-2014.jpg',
            'Image_Thumb'=>  '5-thumb-auto-portrait-pixmodels-2014.jpg',
            'Image_Title'=>  'Auto-portrait',
            'Logiciels'=>	 ['3DSmax','Vray','Zbrush'],
            'Categorie'=>    'Personnages',
            'RealeaseDate'=> '06/2015'
        ],
        [
            'Image'=>		 '6-1-immeuble-2015.jpg',
            'Image_Thumb'=>  '6-thumb-immeuble-2015.jpg',
            'Image_Title'=>  'Immeuble',
            'Logiciels'=>	 ['3DSmax','Vray'],
            'Categorie'=>    'Architecture',
            'RealeaseDate'=> '08/2015'
        ],
        [
            'Image'=>		 '7-1-maison-moderne-2014.jpg',
            'Image_Thumb'=>  '7-thumb-maison-moderne-2014.jpg',
            'Image_Title'=>  'Maison architecte',
            'Logiciels'=>	 ['3DSmax','Vray'],
            'Categorie'=>    'Architecture',
            'RealeaseDate'=> '09/2015'
        ],
        [
            'Image'=>		 '8-1-maison-abondon-2015.jpg',
            'Image_Thumb'=>  '8-thumb-maison-abondon-2015.jpg',
            'Image_Title'=>  'Maison abandonnée',
            'Logiciels'=>	 ['3DSmax','Vray'],
            'Categorie'=>    'Architecture',
            'RealeaseDate'=> '09/2015'
        ],
        [
            'Image'=>		 '9-1-salon-decoration1-nuit-2015.jpg',
            'Image_Thumb'=>  '9-thumb-salon-decoration1-nuit-2015.jpg',
            'Image_Title'=>  'Interieur Salon',
            'Logiciels'=>	 ['3DSmax','Vray'],
            'Categorie'=>    'Architecture',
            'RealeaseDate'=> '10/2015'
        ],
        [
            'Image'=>		 '9-2-salon-decoration1-nuit-2015.jpg',
            'Image_Thumb'=>  '9-2-thumb-salon-decoration1-nuit-2015.jpg',
            'Image_Title'=>  'Interieur Salon',
            'Logiciels'=>	 ['3DSmax','Vray'],
            'Categorie'=>    'Architecture',
            'RealeaseDate'=> '10/2015'
        ],
        [
            'Image'=>		 '12-1-salon-decoration1-jour-2015.jpg',
            'Image_Thumb'=>  '12-thumb-salon-decoration1-jour.jpg',
            'Image_Title'=>  'Interieur Salon',
            'Logiciels'=>	 ['3DSmax','Vray'],
            'Categorie'=>    'Architecture',
            'RealeaseDate'=> '10/2015'
        ],
        [
            'Image'=>		 '11-1-sdb-decoration-jour-2015.jpg',
            'Image_Thumb'=>  '11-thumb-sdb-decoration-jour-2015.jpg',
            'Image_Title'=>  'Interieur Salle de bain',
            'Logiciels'=>	 ['3DSmax','Vray'],
            'Categorie'=>    'Architecture',
            'RealeaseDate'=> '10/2015'
        ],
        [
            'Image'=>		 '11-3-sdb-decoration-jour-2015.jpg',
            'Image_Thumb'=>  '11-3-thumb-sdb-decoration-jour-2015.jpg',
            'Image_Title'=>  'Interieur Salle de bain',
            'Logiciels'=>	 ['3DSmax','Vray'],
            'Categorie'=>    'Architecture',
            'RealeaseDate'=> '10/2015'
        ],
        [
            'Image'=>		 '10-1-chambre-decoration-jour-2015.jpg',
            'Image_Thumb'=>  '10-thumb-chambre-decoration-jour-2015.jpg',
            'Image_Title'=>  'Interieur Chambre',
            'Logiciels'=>	 ['3DSmax','Vray'],
            'Categorie'=>    'Architecture',
            'RealeaseDate'=> '11/2015'
        ],
        [
            'Image'=>		 '10-2-chambre-decoration-jour-2015.jpg',
            'Image_Thumb'=>  '10-2-thumb-chambre-decoration-jour-2015.jpg',
            'Image_Title'=>  'Interieur Chambre',
            'Logiciels'=>	 ['3DSmax','Vray'],
            'Categorie'=>    'Architecture',
            'RealeaseDate'=> '11/2015'
        ],
        [
            'Image'=>		 '17-1-Interieur-blanc-2014.jpg',
            'Image_Thumb'=>  '17-thumb-Interieur-blanc-2014.jpg',
            'Image_Title'=>  'Interieur Lumineux',
            'Logiciels'=>	 ['3DSmax','Vray'],
            'Categorie'=>    'Architecture',
            'RealeaseDate'=> '06/2015'
        ],
        [
            'Image'=>		 '15-1-salle-des-fetes-2015.jpg',
            'Image_Thumb'=>  '15-thumb-salle-des-fetes-2015.jpg',
            'Image_Title'=>  'Salle des fêtes',
            'Logiciels'=>	 ['3DSmax','Vray','Zbrush'],
            'Categorie'=>    'Architecture',
            'RealeaseDate'=> '06/2014'
        ],
        [
            'Image'=>		 '30-Table-Deco-2017.jpg',
            'Image_Thumb'=>  '30-thumb-Table-Deco-2017.jpg',
            'Image_Title'=>  'Table Pallettes',
            'Logiciels'=>	 ['3DSmax','Vray','Photoshop', 'Illustrator'],
            'Categorie'=>    'Objets',
            'RealeaseDate'=> '02/2017'
        ],
        [
            'Image'=>		 '13-1-ampoule-2014.jpg',
            'Image_Thumb'=>  '13-thumb-ampoule-2014.jpg',
            'Image_Title'=>  'Ampoule',
            'Logiciels'=>	 ['3DSmax','Vray'],
            'Categorie'=>    'Objets',
            'RealeaseDate'=> '03/2013'
        ],
        [
            'Image'=>		 '14-1-canette-de-soda-2014.jpg',
            'Image_Thumb'=>  '14-thumb-canette-de-soda-2014.jpg',
            'Image_Title'=>  'Cannette',
            'Logiciels'=>	 ['3DSmax','Vray', 'Illustrator'],
            'Categorie'=>    'Objets',
            'RealeaseDate'=> '04/2013'
        ],
        [
            'Image'=>		 '20-1-tomates-2014.jpg',
            'Image_Thumb'=>  '20-thumb-tomates-2014.jpg',
            'Image_Title'=>  'Tomates',
            'Logiciels'=>	 ['3DSmax','Vray'],
            'Categorie'=>    'Objets',
            'RealeaseDate'=> '03/2014'
        ],
        [
            'Image'=>		 '21-2-decoration-mariage-2014.jpg',
            'Image_Thumb'=>  '21-thumb-decoration-mariage-2014.jpg',
            'Image_Title'=>  'Décorations Mariage',
            'Logiciels'=>	 ['3DSmax','Vray', 'Photoshop'],
            'Categorie'=>    'Objets',
            'RealeaseDate'=> '04/2014'
        ],
        [
            'Image'=>		 '18-1-herbe-realiste-2014.jpg',
            'Image_Thumb'=>  '18-thumb-herbe-realiste-2014.jpg',
            'Image_Title'=>  'Herbe Photo-réaliste',
            'Logiciels'=>	 ['3DSmax','Vray', 'Illustrator'],
            'Categorie'=>    'Objets',
            'RealeaseDate'=> '02/2014'
        ]
    ];//CONFIGURATION DES ELEMENTS DU PORTFOLIO  

    //FONCTIONS

    /**
     * @param string $type
     * @param array $tab
     * @return string
     */
    function CreateLink($type, $tab){
        $ListLink = '';

        switch ($type) {
            case 'css':
                foreach ($tab as $link) {
                    $ListLink .= '<link type="text/css" href="' . $link . '" rel="stylesheet" />';
                }
                return $ListLink;
            break;
            case 'js':
                foreach ($tab as $link) {
                    $ListLink .= '<script type="application/javascript" src="' . $link . '" ></script>';
                }
                return $ListLink;
            break;
            case 'css_async':
                $ListLinkJS = '<script type="application/javascript">';                
                foreach ($tab as $link) {
                    $ListLinkJS .= '
                        $(document).ready(function () {
                        var head = document.head;
                        var linkElement = document.createElement("link");
                        linkElement.setAttribute("rel", "stylesheet");
                        linkElement.setAttribute("type", "text/css");
                        linkElement.setAttribute("href", "'.$link.'");
                        head.appendChild(linkElement);
                        });
                        ';
                }
                $ListLinkJS .= '</script>';
                
                return $ListLinkJS;
            break;
        }
        return 'error de génération de lien => vérifier les paramatres de la fonction CreateLink';
    }