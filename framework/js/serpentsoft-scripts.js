
// Camera Slider on http://www.rosemultimedia.com/
//jQuery(document).ready(function($) {
//    jQuery('#camera_wrap_11').parents('.camera-wrapper').each(function(){
//        jQuery(this).prependTo(jQuery(this).parents('.section-inner').parent());
//    });
//});

//jQuery(document).ready(function($) {
////jQuery(window).load(function () {
////window.onload = function(e){
//if ( jQuery.isFunction(jQuery.fn.camera) ) {
//    jQuery('#camera_wrap_11').camera({
//        alignment: 'center',           //topLeft, topCenter, topRight, centerLeft, center, centerRight, bottomLeft, bottomCenter, bottomRight
//        autoAdvance: true,
//        mobileAutoAdvance: true,
//        barDirection: 'leftToRight',   //'leftToRight', 'rightToLeft', 'topToBottom', 'bottomToTop'
//        barPosition: 'bottom',         //'left', 'right', 'top', 'bottom'
//        cols: 6,                      //nr of cols
//        rows: 4,					//nr of rows
//        slicedCols: 12,
//        slicedRows: 8,
//        easing: 'easeInOutExpo',      //all easings
//        mobileEasing: '',
//        fx: 'random',              //'random','simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft', 'curtainBottomRight', 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft', 'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse', 'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight', 'scrollLeft', 'scrollRight', 'scrollHorz', 'scrollBottom', 'scrollTop'
//        mobileFx: '',
//        hover: true,
//        navigation: true,
//        navigationHover: true,
//        mobileNavHover: true,
//        pagination: false,
//        thumbnails: false,
//        playPause: false,
//        pauseOnClick: false,
//        loader: 'bar',               //pie, bar, none
//        loaderColor: '#eeeeee',
//        loaderBgColor: '#222222',
//        loaderOpacity: 0.8,
//        loaderPadding: 2,
//        pieDiameter: 38,
//        piePosition: 'rightTop',
//        portrait: false,
//        slideOn: 'random', 			//next, prev, random
//        time: 7000,			//milliseconds between the end of the sliding effect and the start of the nex one
//        transPeriod: 1500	 //length of the sliding effect in milliseconds
//    }); 
//}
////	}
//});


jQuery(document).ready(function () {

    // Bootstrap Responsive Javascript Code

    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement("style");
        msViewportStyle.appendChild(
            document.createTextNode(
                "@-ms-viewport{width:auto!important}"
            )
        );
        document.getElementsByTagName("head")[0].
            appendChild(msViewportStyle);
    }

    // Breaking News Ticker
    jQuery('#js-news').bticker({
        speed: 0.2,
        ajaxFeed: false,
        feedUrl: '',      //Test > http://feeds.bbci.co.uk/news/world/rss.xml
        feedType: 'xml',
        displayType: 'reveal',
        htmlFeed: true,
        debugMode: true,
        controls: false,
        titleText: '',
        direction: 'ltr',
        pauseOnItems: 5000,
        fadeInSpeed: 600,
        fadeOutSpeed: 300
    });
});

/* ==================================== OWL Carousel Function ============================================ */
function serpentsoft_owlStartCarousel(divID, itemsCount, options) {

    var owl_ScrollBox = jQuery('#' + divID + ' .scroll-box');

    jQuery('#' + divID + ' .forward').click(function () {
        owl_ScrollBox.trigger('owl.next');
        return false;
    })
    jQuery('#' + divID + ' .backward').click(function () {
        owl_ScrollBox.trigger('owl.prev');
        return false;
    })

    owl_ScrollBox.owlCarousel(options);

    //var owl_ScrollBox_itemsCount = jQuery('#' + divID + ' .scroll-box').children().length;

    //if (owl_ScrollBox_itemsCount <= itemsCount) {
    //    jQuery('#' + divID + ' ul.nav-arrows').hide();
    //}
    //else {
    //    // Custom Navigation Events
    //    jQuery('#' + divID + ' .forward').click(function () {
    //        owl_ScrollBox.trigger('owl.next');
    //        return false;
    //    })
    //    jQuery('#' + divID + ' .backward').click(function () {
    //        owl_ScrollBox.trigger('owl.prev');
    //        return false;
    //    })
    //}

}

/* ==================================== Tooltip ============================================ */
jQuery('.tooltip_item').tooltip();

/* ==================================== Social Icons (16 px) animation ============================================ */
jQuery("li[class$='-metro-but-16']").hover(function () {
    jQuery(this).find('.sc-icon').toggleClass('white');
});


/* ==================================== Social Icons (16 px) animation ============================================ */
//jQuery(".imgLiquidFill").imgLiquid();


/* ==================================== Data Animation ============================================ */
//function detectAnim() {
//    jQuery('*').each(function () {
//        if (jQuery(this).attr('data-animation') != null) {
//            var $animationName = jQuery(this).attr('data-animation');
//            jQuery(this).addClass('animated').addClass($animationName);
//        }
//    });
//}

//detectAnim();

/* ==================================== Lightbox ============================================ */
jQuery('*').each(function () {
    if (jQuery(this).attr('data-lightbox') != null && jQuery(this).attr('data-lightbox') == "true") {
        jQuery(this).nivoLightbox({
            effect: 'fade',                             // The effect to use when showing the lightbox
            theme: 'default',                           // The lightbox theme to use
            keyboardNav: true,                          // Enable/Disable keyboard navigation (left/right/escape)
            clickOverlayToClose: true,                  // If false clicking the "close" button will be the only way to close the lightbox
            onInit: function () { },                       // Callback when lightbox has loaded
            beforeShowLightbox: function () { },           // Callback before the lightbox is shown
            afterShowLightbox: function (lightbox) { },    // Callback after the lightbox is shown
            beforeHideLightbox: function () { },           // Callback before the lightbox is hidden
            afterHideLightbox: function () { },            // Callback after the lightbox is hidden
            onPrev: function (element) { },                // Callback when the lightbox gallery goes to previous item
            onNext: function (element) { },                // Callback when the lightbox gallery goes to next item
            errorMessage: 'The requested content cannot be loaded. Please try again later.' // Error message when content can't be loaded
        });
    }
});

/* ==================================== Inview ============================================ */
function performAnimations(dataConditionName, dataAnimation, additionalOption) {
    jQuery('*').each(function () {
        if (jQuery(this).attr('data-' + dataConditionName) == 'true') {
            if (jQuery(this).attr('data-' + dataAnimation) != null) {
                var $animationName = jQuery(this).attr('data-' + dataAnimation);
                jQuery(this).appear(function () {
                    jQuery(this).addClass('animated ' + additionalOption).addClass($animationName);
                }, { accX: 50, accY: 100 });
            }
        }
    });
}

    
performAnimations("dropdownanimation", "animation", "");
performAnimations("showonscroll", "animation", "fast");


/* ==================================== Sticky Main Menu ============================================ */

function fixingMenu(menu) {
    var headerHeight = jQuery('.main-site-container').offset().top;
    var scrollY = jQuery(window).scrollTop();

    if (scrollY >= (headerHeight - 80)) {
        menu.stop().addClass('animated fadeInDown navbar-fixed-top');
    } else {
        menu.removeClass('animated fadeInDown navbar-fixed-top');
    }
}

jQuery('*').each(function () {
    if (jQuery(this).attr('data-sticky-header') == 'true') {
        
        var menu = jQuery(this);

        jQuery(window).scroll(function () {
            fixingMenu(menu);

            
        });
        jQuery(window).load(function () {
            fixingMenu(menu);
        });
    }
});

/* ==================================== Scroll To Top ============================================ */
jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 200) {
        jQuery('.btn-goto-top').css({ bottom: "20px" });
    } else {
        jQuery('.btn-goto-top').css({ bottom: "-200px" });
    }
});
jQuery('.btn-goto-top').click(function () {
    jQuery('html, body').animate({ scrollTop: '0px' }, 1000);
    return false;
});

/* ==================================== Fit Videos ============================================ */
//if (jQuery(".article-container .article-content").length > 0) {
//    jQuery(".article-container .article-content").fitVids();
//}


/* ==================================== Blog (Style 1) - Post Type ============================================ */
jQuery('*').each(function () {
    if (jQuery(this).attr('data-posttype')) {
        var $postType = jQuery(this).attr('data-posttype');

        if ($postType == 'gallery') {
            var $itemId = jQuery(this).attr('id');

            serpentsoft_owlStartCarousel($itemId, 1, {
                itemsCustom: [
	                [0, 1],
                    [992, 1],
	                [765, 1],
                    [480, 1],
                    [150, 1],
                ],

                itemsTablet: false, //2 items between 600 and 0
                itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
                rewindNav: true,
                lazyLoad: true,
            });
        }
    }
});

/* ==================================== Bootstrap Hover Dropdown Menu ============================================ */
(function ($, window, undefined) {
    var $allDropdowns = $(); $.fn.dropdownHover = function (options) {
        $allDropdowns = $allDropdowns.add(this.parent()); return this.each(function () {
            var $this = $(this).parent(), defaults = { delay: 10, instantlyCloseOthers: true }, data = { delay: $(this).data("delay"), instantlyCloseOthers: $(this).data("close-others") }, settings = $.extend(true, {}, defaults, options, data), timeout; $this.hover(function () {
                if (settings.instantlyCloseOthers === true) { $allDropdowns.removeClass("open"); $allDropdowns.children(".dropdown-menu").hide() } window.clearTimeout(timeout);
                $("> .dropdown-menu", this).stop().slideDown('fast'); $(this).addClass("open")
            }, function () { timeout = window.setTimeout(function () { $this.removeClass("open"); $this.children(".dropdown-menu").hide() }, settings.delay) }); $this.children(".dropdown-menu").find(".dropdown-submenu").hover(function () { $(this).parent().css({ overflow: "visible" }) })
        })
    }; $(document).ready(function () { $('[data-hover="dropdown"]').dropdownHover() })
})(jQuery, this);


