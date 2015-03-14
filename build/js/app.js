// Custom JS Application Code

// If using JSLint for syntax debugging, include the following
/*global $, console */

var App = {

    settings: {
        name: "PixKit",
        version: "0.1.1",
        ga: {
            urchin: "UA-XXXXXX-XX",
            url: "https://github.com/PixLandMedia/PixKit"
        }
    },

    init: function() {
        
        // Slidebars has been initalized
        this.mMenu();

        // Application has been initalized
        console.log(this.settings.name + "(v" + this.settings.version + ") Started");
    },

    mMenu: function() {

       jQuery(document).ready(function() {
            
            jQuery("#mm-menu").mmenu({
               "slidingSubmenus": false,
               "classes": "mm-slide",
               "footer": {
                  "add": true,
                  "title": "PixKit Theme"
               },
               "header": {
                  "title": "Menu",
                  "add": true,
                  "update": true
               }
            });
         });



    },

};

(function($) {

    App.init();

})( jQuery );
