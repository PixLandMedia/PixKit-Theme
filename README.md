#PixKit - Wordpress Starter Theme

PixKit is a Wordpress starter theme with Codekit, Bootstrap 3, SASS, jQuery, Sidebars.js

##Installation

Install PixKit either by [direct download], or git: 

	git clone https://github.com/PixLandMedia/PixKit-Theme.git


##Demo

[demo page]


## Compiled files

The following files are automatically compiled by PixKit and should not be edited directly.
- style.css
- style.map
- js/app.min.js

##Build Files:

All Build files reside in the **build** directory

## Included libraries:

All third-party library files reside in the **build/bower_components** directory.
The library's js files include the **build/js/app.js** file. For example:

    // @codekit-prepend "../bower_components/jquery/dist/jquery.min.js"

The library's sass files include the **build/sass/style.scss** file. For example: 

    @import '../bower_components/bootstrap-sass-official/assets/stylesheets/_bootstrap';

The library's css files copy the **build/sass/layouts** or **build/sass/modules**. You should change the file's extension .scss for example: 

    /build/bower_components/distribution/0.10.2/slidebars.min.css

to

    /build/sass/layouts/_slidebars.scss



##Contact

**PixLand Media**

web: [www.pixlandmedia.com]

email: [support@pixlandmedia.com]


**Tamás Németh**

[nemeth@pixlandmedia.com]


## Changelog

**01.28.15 v0.1.0:**
- Initial Release
- ADDED PixKit - HTML version
- ADDED Theme structure
- ADDED Bootstrap 3.3.1
- ADDED Font Awesome 4.2.0
- ADDED normalize-css 3.0.2
- ADDED Slidebars.js 0.10.2 
- ADDED Theme options example on backend
- ADDED pixkit-child.zip - Child theme for PixKit Starter Theme


[www.pixlandmedia.com]: http://www.pixlandmedia.com
[support@pixlandmedia.com]: mailto:support@pixlandmedia.com
[nemeth@pixlandmedia.com]: mailto:nemeth@pixlandmedia.com
[direct download]: https://github.com/PixLandMedia/PixKit-Theme/archive/master.zip
[more info to Kit]: http://incident57.com/codekit/kit.php
[demo page]: http://kickoff.pixlandmedia.com/pixkit-theme/demo