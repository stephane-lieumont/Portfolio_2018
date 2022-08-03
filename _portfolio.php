<section id="portfolio-travaux-stephane-lieumont" class="color2">
    <h2 class="marginStd reveal">Réalisations</h2>
    <div class="grid-container">
        <?php
        $InitMainPortfolio = new InitMainPortfolio(PORTFOLIO_IMG_LIST, CHEMIN_RELATIF_IMG_PORTFOLIO);
        $ConstructHTML = $InitMainPortfolio->ConstructHTML();
        $ConstructHTMLnav = $InitMainPortfolio->ConstructHTMLnav();
        ?>
        <div class="grid-menu marginStd">
            <?= $ConstructHTMLnav ?>
        </div>
        <div class="grid">
            <div class="grid-loader">
                <img alt="SLI3D - Stéphane LIEUMONT - CGArtist" title="SLI3D Logo" src="Images/Logo-sli-3D-pixmodels-portfolio002.png" />
                <div class="loaderPortfolio">
                    <div class="grid-load inner">
                        <div class="inner one"></div>
                        <div class="inner two"></div>
                        <div class="inner three"></div>
                    </div>
                </div>
                <div class="loader-progressbar"><div class="loader-progressbar-inner"></div></div>
            </div>
            <ul class="grid-content">
                <?= $ConstructHTML ?>
            </ul>
        </div>
    </div>
</section>