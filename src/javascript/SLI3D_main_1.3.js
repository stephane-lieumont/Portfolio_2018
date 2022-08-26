/**
 * Fichier script principale
 * Vers 1.09 19/05/2020
 * Copyright Stéphane LIEUMONT
 */

//Initialisation des constantes
const FOLDER_IMG_MAINSLIDER	= 'images/MainSlider/';
const LIST_SECTIONS = [// LIST SECTIONS SITE
    {
        elmnt : $('#presentation-sli3d-stephane-lieumont'),
        deltaOffset : 100,
        animDuration : 300,
        title : "presentation"
    },
    {
        elmnt : $('#portfolio-travaux-stephane-lieumont'),
        deltaOffset : 100,
        animDuration : 100,
        title : "portfolio"
    },
    {
        elmnt : $('#profil-stephane-lieumont-graphiste3d-toulouse'),
        deltaOffset : 100,
        animDuration : 200,
        title : "profil"
    },
    {
        elmnt : $('#contact-stephane-lieumont-graphiste-3d'),
        deltaOffset : 100,
        animDuration : 500,
        title : "contact"
    }
];
const LIS_IMG_BG_SLIDER = [// LIST IMAGES BG SLIDER
    {
        url : FOLDER_IMG_MAINSLIDER + "maison-moderne-2014.jpg",
        url_min : FOLDER_IMG_MAINSLIDER + "maison-moderne-2014_min.jpg",
        author : "Stéphane LIEUMONT",
        title :  "Concept Architecture",
        annee :  "2015"
    },
    {
        url : FOLDER_IMG_MAINSLIDER + "escart-wild-2015.jpg",
        url_min : FOLDER_IMG_MAINSLIDER + "escart-wild-2015_min.jpg",
        author : "Stéphane LIEUMONT",
        title :  "Escart Wild",
        annee :  "2015"
    },
    {
        url : FOLDER_IMG_MAINSLIDER + "Extraterrestre-2016.jpg",
        url_min : FOLDER_IMG_MAINSLIDER + "Extraterrestre-2016_min.jpg",
        author : "Stéphane LIEUMONT",
        title :  "Extraterrestre",
        annee :  "2016"
    },
    {
        url : FOLDER_IMG_MAINSLIDER + "Legos-Minions-2015.jpg",
        url_min : FOLDER_IMG_MAINSLIDER + "Legos-Minions-2015_min.jpg",        
        author : "Stéphane LIEUMONT",
        title :  "Legos Minions",
        annee :  "2015"
    }
];

//Initialisation des variables
var animProfilState = false; // Observer status animation Skills
var animLogState = false; // Observer status animation Logiciels
var form = document.querySelector( '#contactForm' );
var buttonSubmit = document.querySelector( '[type=submit]' );
var reCAPTCHAload = false;
var isMobile = isMobileDevice();

//InitPortfolioClass
const Portfolio = new PortfolioGrid(
    ".grid-container",
    ".grid-loader",
    ".grid-item",
    ".grid-menu",
    {
        Plugins : ['lightGallery']
    },
    
);

/**
 * INITIALISATION
 */

$(document).ready(function () {
    $('#nav-icon').on('click',function(){
        if( $('header').hasClass('show-menu')){            
            $('header').removeClass('show-menu');
            $(this).removeClass('open');
        }else{
            $('header').addClass('show-menu');
            $(this).addClass('open');
        }
    })

    $('.menu li a').on('click',function(){
        if( $('header').hasClass('show-menu')){
            $('header').removeClass('show-menu');
            $('#nav-icon').removeClass('open');
        }
    })  

    //init Canvas Logiciels
    $('#logiciels li').each(function() {
        $(this).append(createCanvas);
    })

    //init Boutons Anchors
    $('#ScrollTop').on('click',function(evt){
        evt.preventDefault();
        scrollToPos();
        window.location.hash = $(this).find('a').attr("href");
    });

    $('.anchor-link').on('click',function(evt){
        evt.preventDefault();
        var anchorLink = $(this).attr("href");
        menuActive($(this).attr("href"));
        scrollToPos($(anchorLink)[0].offsetTop, 800);
        setTimeout(function(){window.location.hash = anchorLink;},800)
    })

    //Animation du loader de la Page
    $('#loadPage img').ready(function(){
        $('#loadPage img').stop(true).fadeIn(1000);
        $('.loaderHTML').stop(true).fadeIn(2000);
    });
    
    //Initialisation du parallax contact
    $('#contact-stephane-lieumont-graphiste-3d .parallax').parallaxie({
        'pos_x': 'right',
    });
    
    //Init ScrollTop
    var opacityAppearTopBtn = Math.round(($(this).scrollTop()- 200)/2) / 100;
    
    if(opacityAppearTopBtn < 0.1){
        $('#ScrollTop').css({opacity:0});
    }

    if(opacityAppearTopBtn > 0 && opacityAppearTopBtn <= 1){
        $('#ScrollTop').css({opacity:opacityAppearTopBtn});
    }

    //Init de l'affichage du footer
    if($(this).scrollTop() < 200 || $(this).scrollTop() > ($('main').height() - $(window).height() -  400)){
        $('footer').data('display', 'show').show(0);
    }else{
        $('footer').data('display', 'hide').hide(0);
    }
})

$(window).on('load', function(){    
    $('#loadPage img').stop(true).fadeOut(500);
    $('.loaderHTML').stop(true).fadeOut(100);
    $( '#loadPage' ).stop(true).delay(200).fadeOut( 500 );

    if(isMobile){
        $('.reveal').removeClass('reveal');
    }

    //Detection AnchorLink à l'arrivé sur le site
    LIST_SECTIONS.forEach(function(e){
        if(window.location.hash == "#" +  e.elmnt[0].id){
            setTimeout(function(){
                scrollToPos(e.elmnt[0].offsetTop, 0);
            },100)            
        }
    })
    //init BGslider
    initBgSlider(LIS_IMG_BG_SLIDER, $('#BG-Container'), 500, 12000, isMobile);    
    
    setTimeout(function(){
        //Apparition du titre su site
        $('header h1').fadeIn(1000);
        var revealId = reveal(LIST_SECTIONS, $(this).scrollTop());//Recuperation du title de la section qui apparait

        //Animation Profil apres premiere apparition (anchor link)  
        if(revealId == "profil" && animLogState == false){        
            animLogState = true; 

            setTimeout(function(){
                $('#profil-stephane-lieumont-graphiste3d-toulouse').find('.reveal').removeClass('reveal'); 
                $('#profil-stephane-lieumont-graphiste3d-toulouse').find('h2').addClass('reveal'); 
                $('#profil-stephane-lieumont-graphiste3d-toulouse').find('h2').addClass('reveal-show'); 
            },1000)
            
                
            $('.Progress-skill').each(function (i) {
                animSkills($(this), 500+(i*150), 1000);
            })        
    
            $('.log-progress').each(function (i) {
                animCanvas($(this), 500+(i*10), 500);
            })
        }
        // Initialisation du portfolio (anchor link)
        if(!Portfolio.loadComplete && revealId =="portfolio"){
            PortfolioGrid.LoadPortfolio(Portfolio);            
        }
        // Init reCAPTCHA v3
        if(!reCAPTCHAload && revealId == "contact"){
            //load Capchca Google
            var timetTmp = setTimeout(function(){
                $('body').append('<script async src="https://www.google.com/recaptcha/api.js"></script>' );
                reCAPTCHAload = true;
                clearTimeout(timetTmp);
            },100)  
        }
    }, 700)
})

/**
 * SCROLLEVENT Window
 */

//Scroll debounce
$(window).on('scroll', debounce(function(){
    var revealId = reveal(LIST_SECTIONS, $(this).scrollTop());//Recuperation du title de la section qui apparait

    //Animation Profil apres premiere apparition (scroll)  
    if(revealId == "profil" && animLogState == false){        
        animLogState = true;

        setTimeout(function(){
            $('#profil-stephane-lieumont-graphiste3d-toulouse').find('.reveal').removeClass('reveal'); 
            $('#profil-stephane-lieumont-graphiste3d-toulouse').find('h2').addClass('reveal'); 
            $('#profil-stephane-lieumont-graphiste3d-toulouse').find('h2').addClass('reveal-show'); 
        },1000)

        $('.Progress-skill').each(function (i) {
            animSkills($(this), 1000+(i*200), 1000);
        })        

        $('.log-progress').each(function (i) {
            animCanvas($(this), 2000+(i*200), 500);
        })
    }
    // Initialisation du portfolio (scroll)
    if(!Portfolio.loadComplete && revealId =="portfolio"){
        PortfolioGrid.LoadPortfolio(Portfolio);
    }
    // Init reCAPTCHA v3
    if(!reCAPTCHAload && revealId == "contact"){
        //load Capchca Google
        var timetTmp = setTimeout(function(){
            $('body').append('<script async src="https://www.google.com/recaptcha/api.js"></script>' );
            reCAPTCHAload = true;
            clearTimeout(timetTmp);
        },100)  
    }

}, 100));

//Scroll throttle
$(window).on('scroll', throttle(function(){
    //Apparition, Disparition ScrollTop bouton
    var opacityAppearTopBtn = Math.round(($(this).scrollTop()- 200)/2) / 100;
    
    if(opacityAppearTopBtn < 0.1){   $('#ScrollTop').css({opacity:0});   }
    if(opacityAppearTopBtn > 0 && opacityAppearTopBtn <= 1){   $('#ScrollTop').css({opacity:opacityAppearTopBtn});   }
    if(opacityAppearTopBtn > 1){  $('#ScrollTop').css({opacity:1});  }

    //Gestion de l'affichage du footer
    if($(this).scrollTop() < 200 || $(this).scrollTop() > ($('main').height() - $(window).height() -  400)){        
        if($('footer').data('display', 'hide')){
            $('footer').data('display', 'show').fadeIn(1000);
        }        
    }else{
        if($('footer').data('display', 'show')){
            $('footer').data('display', 'hide').fadeOut(1000);
        }        
    }
}, 250));

//Scroll imgBG
if(!isMobile){
    $(window).on('scroll', throttle(function(){
        if($(this).scrollTop() <= LIST_SECTIONS[1].elmnt[0].offsetTop){
            $('#BG-Container .slideBG').css('background-position', 'center ' + -($(this).scrollTop()*0.2) + 'px');
        }
    },20));
}



/**
 * RESIZE Window
 */
//Detection Portrait ou paysage affichage BGSlider + Dimension Section Portfolio
//Correction Bug Mobile 100vh navigateur Chrome (SLIDER BG)
$(window).on('resize', debounce(function(){    
    PortfolioGrid.ResizeSection(Portfolio);
},500))

/**
 * ORIENTATION MOBILE
 */

$( window ).on( "orientationchange", function( event ) {
    if(isMobile){
        var minHeight =  window.innerHeight;
        $(".slideBG").parent().css({'height': minHeight + 'px'});
        $(".slideBG").parent().parent().css({'min-height': '0', 'height':minHeight+'px', padding:0,width:'100%'});
    }
});



/**
 * FONCTIONS
 */

 /**
 * Bouton actif
 * @param href
 */
function menuActive(href){        
    $('header .anchor-link').each(function(){
        if($(this).attr("href") === href){
            $(this).addClass('active')
        }else{
            $(this).removeClass('active')
        }
    })
}

/**
 * Creation de Canvas dans la section Profil (liste de logiciel)
 */
function createCanvas(){
    $circle = $('<canvas class="log-progress" width="100px" height="100px" style="display:none;" />');
    $canvas = $circle[0].getContext('2d');
   
    $grd = $canvas.createLinearGradient(0, 0, 100, 0);
    $grd.addColorStop(0, "#9e77e1");
    $grd.addColorStop(1, "#92e5bb");
    
    $canvas.createLinearGradient(0, 0, 200, 0);
    $canvas.strokeStyle = $grd;
    $canvas.lineWidth = 20;

    return $circle;
}

/**
 * Animation de Canvas dans la section Profil (liste de logiciel)
 * @param {*} canvas canvas concerné
 * @param {*} delay delai avant apparition
 * @param {*} duration animation durée
 */
function animCanvas(canvas, delay, duration){
    var ctx = canvas[0].getContext('2d');
    var pct = 1;
    var maxValue = canvas.parent().data('pct');

    $({i:1}).stop(true).delay(delay).animate({i:maxValue}, {
        duration: duration,
        easing: "swing",
        step: function() { 
            ctx.beginPath();
            ctx.clearRect(0, 0, 100, 100);
            ctx.arc(50,50,15, Math.PI,(((this.i*2)/100)*Math.PI) - Math.PI);
            ctx.stroke();
        }
    });
    canvas.fadeIn();
}

/**
 * Animation Skills Barres dans la section profil
 * @param {*} elmnt element selectionné
 * @param {*} delay delai avant apparition
 * @param {*} duration animation durée
 */
function animSkills(elmnt, delay, duration){    
    maxValue = elmnt.data('pct') + "%";
    
    elmnt.find('.Progress-skill-inner').stop(true).delay(delay).animate({width:maxValue}, {
        duration: duration,
        easing: "swing"
    });
}

 /**
  * Animation ScrollTo anchorLinks
  * @param {*} scrollPosition //Position du anchorLink
  * @param {*} duration //Durée de l'animation
  */
function scrollToPos(scrollPosition = 0, duration = 800){
    $("html, body").animate({ scrollTop: scrollPosition },{
        duration: duration,
        easing:"swing"
    });
}

/**
 * Animation de tous les elements Reveal en fonction de la position
 * @param {*} listSection //Liste des Section (contante declaré en debut de fichier)
 * @param {*} positionScroll //Position du Scroll de la (window)
 */
function reveal(listSection, positionScroll){    
    var sectionAppear = [];
    
    listSection.forEach(function(section){
        if(positionScroll >= section.elmnt[0].offsetTop - $(window).height()  + section.deltaOffset
        && positionScroll < section.elmnt[0].offsetTop + section.elmnt[0].clientHeight){
                  
            sectionAppear = section.title;
                     
            menuActive("#" + section.elmnt.attr('id'));
            if(!section.elmnt.find('.reveal').hasClass('reveal-show')){
                revealItem(section.elmnt, "show", section.animDuration);                
            }
        }else{
            if(section.elmnt.find('.reveal').hasClass('reveal-show')){
                revealItem(section.elmnt, "hide");
            }
        }
    })

    return sectionAppear;

    /**
     * Animation d'un seul element Reveal
     * @param {*} elmnt //Element selectionné
     * @param {*} action //Caché ou Montrer
     * @param {*} delay //Delai entre chaques actions
     */
    function revealItem(elmnt, action = "show", delay = 100){
        nbElment = elmnt.find('.reveal').length;
        
        if(action == "show"){
            elmnt.find('.reveal').each(function(i){
                $(this).delay((i)*delay).queue(function(){
                    $(this).addClass('reveal-show');                                  
                });
            })
        }else if(action == "hide"){
            elmnt.find('.reveal').each(function(i){   
                    $(this).stop(true).removeClass('reveal-show');
            })
        }else{
            console.error("Erreur de parametrage de la section reveal");
        }
    }
}


 /**
  * Debounce pour de meilleurs performances
  * @param {*} callback 
  * @param {*} delay 
  */
function debounce(callback, delay){
    var timer;
    return function(){
        var args = arguments;
        var context = this;
        clearTimeout(timer);
        timer = setTimeout(function(){
            callback.apply(context, args);
        }, delay)
    }
}

 /**
  * Throttle pour de meilleurs performances
  * @param {*} callback 
  * @param {*} delay 
  */
function throttle(callback, delay) {
    var last;
    var timer;
    return function () {
        var context = this;
        var now = +new Date();
        var args = arguments;
        if (last && now < last + delay) {
            // le délai n'est pas écoulé on reset le timer
            clearTimeout(timer);
            timer = setTimeout(function () {
                last = now;
                callback.apply(context, args);
            }, delay);
        } else {
            last = now;
            callback.apply(context, args);
        }
    };
}

/**
 * Requete AJAX
 * @returns {boolean}
 */
function getHttpRequest () {
    var httpRequest = false;
    if (window.XMLHttpRequest) {
        httpRequest = new XMLHttpRequest();
        if (httpRequest.overrideMimeType) {
            httpRequest.overrideMimeType( 'text/plain' )
        }
    } else if (window.ActiveXObject) {
        try {
            httpRequest = new ActiveXObject( "Msxml2.XMLHTTP" )
        } catch (e) {
            try {
                httpRequest = new ActiveXObject( 'Microsoft.XMLHTTP' )
            } catch (e) {
            }
        }
    }

    if (!httpRequest) {
        alert( 'Abandon : Impossible de creer une instance XMLHTTP' );
        return false
    }

    return httpRequest
}

/**
 * Soumission du formulaire de contact
 * Verfication Capchka Google + Verfication Ajax ou PHP POST
 * @param {*} token 
 */
function onSubmit(token) {

    var buttonText = buttonSubmit.textContent;
    var data = new FormData(form);
    var xhr = getHttpRequest();
    var errorElmnt = form.querySelectorAll( '.help-block' );

    xhr.open( 'POST', form.getAttribute( 'action' ), true );
    xhr.setRequestHeader( 'X-Requested-With', 'xmlhttprequest' );
    xhr.send( data );

    buttonSubmit.disabled = true;
    buttonSubmit.classList.add( 'disabled' );
    buttonSubmit.textContent = 'Chargement...';

    for (var i = 0; i < errorElmnt.length; i++) {
        errorElmnt[i].classList.remove('has-error');
        errorElmnt[i].innerHTML = '';
    }

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status !== 200) {
                var errors = JSON.parse( xhr.responseText );
                var errorsKey = Object.keys( errors );
                for (var u = 0; u < errorsKey.length; u++) {
                    var key = errorsKey[u];
                    var error = errors[key];
                    var input = document.querySelector( '[name=' + key + ']' );
                    var helpBlock = input.parentNode.querySelector( '.help-block' );

                    helpBlock.classList.add('has-error');
                    helpBlock.innerHTML = error;

                    buttonSubmit.disabled = false;
                    buttonSubmit.classList.remove( 'disabled' );
                    buttonSubmit.textContent = buttonText
                }
            } else {
                var inputs = form.querySelectorAll( 'input' );
                var message = form.querySelector( 'textarea' );

                for (var i = 0; i < inputs.length; i++) {
                    inputs[i].value = ""
                }
                message.value = "";

                buttonSubmit.disabled = true;
                buttonSubmit.classList.add( 'success' );
                buttonSubmit.textContent = 'Message envoyé'
            }
        }
    }
}

/**
 * Fonction du Slider principale + Animations
 * @param {*} ListImg //Liste des images Dans la constante en debut de fichier
 * @param {*} elmnt //Eleemnt selectionné ou integrer le Slider
 * @param {*} delayTransition //Durée de la transition entre les images
 * @param {*} durationTmp //Durée de la temporisation entre les images
 */
function initBgSlider(ListImg, elmnt, delayTransition, durationTmp, is_mobile){
    var id = 0;
    var id2 = 1;

    var imgId1url = "";
    var imgId2url = "";

    if(is_mobile){
        imgId1url = ListImg[id].url_min;
        imgId2url = ListImg[id2].url_min;        
    }else{
        imgId1url = ListImg[id].url;
        imgId2url = ListImg[id2].url;  
    }

    elmnt.append('<div class="slideBG" style="display:none; background-image: url(\'' + imgId2url + '\')"></div>');
    elmnt.append('<div class="slideBG" style="background-image: url(\'' + imgId1url + '\')"></div>');
    elmnt.append('<p class="caption">' + ListImg[0].author + ' - ' + ListImg[0].title + ' © ' + ListImg[0].annee + '</p>');
    elmnt.append('<div class="ProgressSlideBG"></div>');    

    if(is_mobile){
        var minHeight =  window.innerHeight;
        $(".slideBG").parent().css({'height': minHeight + 'px'});
        $(".slideBG").parent().parent().css({'min-height': '0', 'height':minHeight+'px', padding:0,width:'100%'});
    }


    if($(this).scrollTop() <= LIST_SECTIONS[1].elmnt[0].offsetTop){
        $('.slideBG').css('background-position', 'center ' + -($(this).scrollTop()*0.2) + 'px');
    }else if(is_mobile){
        $('.slideBG').css('background-position', 'center 0 px')
    }

    elmnt.find('.slideBG:first').css('display', 'block');   
    ProgressBar(elmnt);

    setInterval(function(){
        id >= (ListImg.length-1) ? id = 0 : id++ ;
        id2 >= (ListImg.length-1) ? id2 = 0 : id2++ ;

        if(is_mobile){
            imgId1url = ListImg[id].url_min;
            imgId2url = ListImg[id2].url_min;
        }else{
            imgId1url = ListImg[id].url;
            imgId2url = ListImg[id2].url;  
        }
            
        elmnt.find('.slideBG:last').fadeOut(delayTransition);
        elmnt.find('p').fadeOut();

        ProgressBar(elmnt);

        var Timer = setTimeout(function(){
            elmnt.find('.slideBG:last').prependTo(elmnt);
            
            elmnt.find('.slideBG:first').css('background-image', 'url(' + imgId2url + ')');       
            elmnt.find('.slideBG:first').stop().show(0);
            
            elmnt.find('.slideBG:last').css('background-image', 'url(' + imgId1url + ')');
            elmnt.find('p').text(ListImg[id].author + ' - ' + ListImg[id].title + ' © ' + ListImg[id].annee).fadeIn();
            
            clearTimeout(Timer);
        }, delayTransition);
    }, durationTmp);
    
    function ProgressBar(elmnt){
        elmnt.find('.ProgressSlideBG').stop().css("width", "0").fadeIn();
        elmnt.find('.ProgressSlideBG').stop().css("opacity", "1").animate({width:"100%"}, {
            duration : durationTmp - 500 ,
            easing :'linear',
            complete: function(){
                $(this).fadeOut();  
            }
        });
    }  
}

/**
 * Detection de mobile
 */
function isMobileDevice() { 
    if( navigator.userAgent.match(/iPhone/i)
    || navigator.userAgent.match(/Android/i)
    || navigator.userAgent.match(/iPod/i)
    || navigator.userAgent.match(/iPad/i)
    || navigator.userAgent.match(/BlackBerry/i)
    || navigator.userAgent.match(/Windows Phone/i)
    ){
       return true;
     }
    else {
       return false;
     }
   }