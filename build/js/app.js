// Custom JS Application Code

// If using JSLint for syntax debugging, include the following
/*global $, console */

// import libraries
// @codekit-prepend "../bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js"
// @codekit-prepend "../bower_components/Slidebars/distribution/0.10.2/slidebars.min.js"

var App = {

    settings: {
        name: "PixKit",
        version: "0.1.3",
        ga: {
            urchin: "UA-XXXXXX-XX",
            url: "https://github.com/PixLandMedia/PixKit"
        }
    },

    init: function() {
        // Kick off the listeners
        this.listen();
        
        // Slidebars has been initalized
        this.slidebars();

        // Application has been initalized
        console.log(this.settings.name + "(v" + this.settings.version + ") Started");
    },

    listen: function() {
        // Application Listeners can be loaded here for easy configuration      
        console.log("Ready and Listening");
    },

    slidebars: function() {

        // Slidebars initalization
        var mySlidebars = new jQuery.slidebars(),
            submenu;

        jQuery('.sb-left-button').on('click', function() {
            mySlidebars.slidebars.toggle('left');
        });

        jQuery('.sb-right-button').on('click', function() {
            mySlidebars.slidebars.toggle('right');
        });

        jQuery('.sb-toggle-submenu').off('click').on('click', function() {
            submenu = jQuery(this).parent().children('.sb-submenu');
            jQuery(this).add(submenu).toggleClass('sb-submenu-active'); // Toggle active class.
            
            if (submenu.hasClass('sb-submenu-active')) {
                submenu.slideDown(200);
            } else {
                submenu.slideUp(200);
            }
        });

        jQuery('.sb-slidebar a[href^="#"]').on('touchend click', function(e) {
            e.preventDefault();
            var id = jQuery(this).attr("href");
            var offset = 70;
            var target = jQuery(id).offset().top - offset;
            
            jQuery('html, body').animate({scrollTop:target}, 500);
        });

    },
};

(function($) {

    App.init();

})( jQuery );
