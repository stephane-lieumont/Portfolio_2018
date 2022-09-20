/**
 * CLASS PORTFOLIO
 * Vers 1.1.0 07/07/2020
 * Copyright Stéphane LIEUMONT
 */

class PortfolioGrid {
    constructor(container, loader, elements, menu = null, options = {}){
        this.container = $(container);
        this.loader = this.container.find(loader);
        this.elements = this.container.find(elements);
        this.loadComplete = false;
        this.currentFilter = null;
        this.options = Object.assign( {},{
            //Options par default
            Plugins:[]
        },options);

        if(menu != null){
            this.menu = this.container.find(menu + " li");
            this.menu.find('span').removeClass('active');
            this.menu.find('span').addClass('desactive');
            this.currentFilter = this.menu[0].textContent;
            
            //EventClickFilters
            this.menu.find('span').on('click', function(id){
                this.menu.find('span').removeClass('active'); 
                if($(id.target).hasClass('desactive') == false){
                    this.filter(id.target.textContent, 30);                
                    $(id.target).addClass('active');
                }
            }.bind(this));
        }else{
            this.menu = menu;
        }

        //Initialisation des plugins
        this.options.Plugins.forEach(function(e){
            this.pluginsInit(e);
        }.bind(this))

        //Initialisation
        this.elements.css('display', 'none');//Initialise les Item de la grille
        this.elements.addClass('desactive');//Desactive le Hover le temps que l'animation se joue 
        $(this.menu[0]).find('span').addClass('active');//Selection la valeur par defaut du menu        
    }

    get infos(){
        console.log(this.container)
        console.log(this.loader)
        console.log(this.elements)
        console.log(this.loadComplete)
        console.log(this.currentFilter)
    }

    load(){
        var nbElment = this.elements.length;
        var pctImg = 100 / nbElment;
        var compteur = 0;

        this.loadComplete = true;

        this.elements.each(function(id){
            var url = $(this.elements[id]).find('img').data('src');
            $(this.elements[id]).find('img').attr('src', url);
            $(this.elements[id]).find('img').on('load', function(){                
                compteur++;
                if(id == nbElment - 1){
                    // Load des images completes
                    this.loader.find('.loader-progressbar-inner').css('width', "100%");                    
                    this.loader.fadeOut(1000,function(){
                        this.filter(this.currentFilter, 80, true);//Apparition du portfolio
                    }.bind(this));                    
                }else{
                    this.loader.find('.loader-progressbar-inner').css('width', pctImg*compteur + "%");
                }                
            }.bind(this))
        }.bind(this))
    }

    filter(filter, delay, init = false){

        var defualtFilter = this.menu[0].textContent;
        var allFilterElmnt = this.elements;
        var targetFilter = $({});
        var currentFilter = this.container.find('.filter');
        var duration = 0;
        var delayTransitionCSS = 700;

        //Desactivation des evenement Click et Hover
        this.elements.addClass('desactive');
        this.menu.find('span').addClass('desactive');

        //Tableau des elements filtres
        this.elements.each(function(e){
            if($(this).data('categorie') == filter){
                targetFilter[e] = this;
                targetFilter.length = e;
            }else if(filter == defualtFilter){
                targetFilter = allFilterElmnt;
            }
        })

        if(init == false){            
            //Disparition des element en visu
            currentFilter.each(function(e){
                var Time = setTimeout(function(){
                    $(this).removeClass('filter');   
                    $(this).removeClass('transition-show');
                    if(e == currentFilter.length - 1){
                        clearTimeout(Time);
                    }
                }.bind(this), delay*e);
                duration += delay;
            })
            duration += delayTransitionCSS; // Ajout de la transtion CSS au Timer
        }

        //Apparition des elements filtres
        var nextAnim = setTimeout(function(){
            this.elements.css('display', 'none');
            targetFilter.css('display', 'block');
            targetFilter.each(function(e){
                var Time = setTimeout(function(){
                    $(this).addClass('filter');   
                    $(this).addClass('transition-show');
                    if(e == targetFilter.length - 1){
                        clearTimeout(Time);
                    }
                }.bind(this), delay*(e+1));
            })
            
            //Initialisation des Plugins (A TRAVAILLER)        
            var initPlugins = setTimeout(function(){
                this.pluginsInit("lightGallery", true);
                this.elements.removeClass('desactive');// Reactivation Hover Item
                this.menu.find('span').removeClass('desactive');// Reactivation Menu
                clearTimeout(initPlugins); 
            }.bind(this), delay*targetFilter.length)

            clearTimeout(nextAnim);           
        }.bind(this), duration)

        setTimeout(function(){
            this.resize();
        }.bind(this),duration)
    }

    pluginsInit(value, destroy = false){        
        switch(value){
            case "lightGallery":
                if(!destroy){
                    //Initialisation des attributs
                    for(var u = 0; u < this.elements.length; u++){                    
                        this.elements[u].dataset.src = this.elements[u].querySelector('a').getAttribute('href');
                        this.elements[u].dataset.facebookShareUrl = this.elements[u].querySelector('a').getAttribute('href');
                        this.elements[u].dataset.twitterShareUrl = this.elements[u].querySelector('a').getAttribute('href');
                    }
                }else{
                    //destruction du lightgallery
                    $(this.container).data('lightGallery').destroy(true);
                }

                $(this.container).lightGallery({
                    selector : '.filter',
                    download : false,
                    fullScreen : false,
                    showThumbByDefault: false,
                    mode: 'lg-lollipop',
                    backdropDuration:800,
                    getCaptionFromTitleOrAlt:false,
                    googlePlus:false,
                    zoom: false,
                    hash: false,
                    pinterest:false
                });
            break;
            default :
                return false;
        }
    }

    resize(){
        var calcHeight = 0;
        this.container.parent().children().each(function(e){
            calcHeight += $(this).innerHeight();
        })

        calcHeight = Math.round(calcHeight);
        this.container.parent().css('height', calcHeight + 'px')
    }

    static LoadPortfolio(eClass){
        eClass.load();
    }

    static FiltrePortfolio(eClass, filter = this.currentFilter){
        eClass.filter(filter, 10);
    }
    
    static ResizeSection(eClass){
        eClass.resize();
    }
}