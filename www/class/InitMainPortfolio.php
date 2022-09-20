<?php
    class InitMainPortfolio{
        private $ListImg;
        private $directory;

        public function __construct ($ListImg, $directory){
            $this->ListImg = $ListImg;
            $this->directory = $directory;
        }

        public function ConstructHTML(){
            $contentHTML = '';

            foreach ($this->ListImg as $imgData){
                $contentHTML .= $this->ConstructHTML_item($imgData);
            }

            return $contentHTML;
        }

        public function ConstructHTMLnav(){
            $TabCategorie = [];

            foreach ($this->ListImg as $imgData){
                array_push($TabCategorie, $imgData['Categorie']);
            }
            $TabCategorie = array_unique($TabCategorie);
            $MenucontentHTML ="<nav><ul><li class='reveal' href='#MAIN-PORTFOLIO' data-filter='all' title='Tous les projets'><span class='btn active'>Tous les projets</span></li>";
            foreach ($TabCategorie as $categorie){
                $MenucontentHTML .= "<li class='reveal' href='#MAIN-PORTFOLIO' data-filter='$categorie' title='$categorie'><span class='btn'>$categorie</span></li>";
            }
            $MenucontentHTML .="</ul></nav>";

            return $MenucontentHTML;
        }

        private function ConstructHTML_item($imgData){
            $item_div = "<li class='grid-item filter' data-categorie='".$imgData['Categorie']."'>";
            $item_link ="<a class='grid-hover-wrap' href='".$this->directory.$imgData['Image']."'>";
            $item_link .="<p class='title-thumb'>".$imgData['Image_Title'];
            if(isset($imgData['RealeaseDate'])){
                $item_link .="<span class='date'> ".$imgData['RealeaseDate']." </span>";
            }
            $item_link .="</p>";
            $item_link .="<ul class='icon-list'>";
            foreach ($imgData['Logiciels'] as $logiciel){
                //COMPLETE LES ATTRIBUTS $IMGDATA
                $item_link .="<li class='icon'><span class='SLI3D-icon icon-".$logiciel."'></span><span class='txt-icon'>".$logiciel."</span></li>";
            }
            $item_link .="</ul>";

            $item_link .="</a>";
            $item_img = "<img class='thumb' src='".$this->directory."thumb-default.jpg' data-src='".$this->directory.$imgData['Image_Thumb']."' alt='".$imgData['Image_Title']."' />";
            $item_img .= "<noscript><img src='".$this->directory.$imgData['Image_Thumb']."' alt='".$imgData['Image_Title']."' /></noscript>";
            $item_div_close = "</li>";

            $contentHTML = $item_div.$item_link.$item_img.$item_div_close;
            return $contentHTML;
        }
    }