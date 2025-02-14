[![Gitter chat](https://badges.gitter.im/woothemes/FlexSlider.png)](https://gitter.im/woothemes/FlexSlider)

# FlexSlider 2.7.0

http://www.woothemes.com/flexslider/ - Copyright (c) 2015 WooThemes

## Releases

The `master` branch of this repository is always the latest development version of FlexSlider. Please view the [Releases](https://github.com/woocommerce/FlexSlider/releases) section for a list of official FlexSlider builds.

### Contributing

We encourage contributions to FlexSlider and will review all pull requests submitted.

Before contributing, please see our [Contributing Guide](https://github.com/woocommerce/FlexSlider/blob/master/CONTRIBUTING.md).

### Roadmap

To keep up to date with how FlexSlider's development roadmap looks, please see our [development roadmap](https://github.com/woocommerce/FlexSlider/wiki/Roadmap).

## Updates

** Version 2.7.0 **

** Fixes resize method call for orientationchange. Adds RTL feature - param "rtl" added. **

** Version 2.6.3 **

** Rollback fade fixes, due to harsh fade reports. **

** Version 2.6.2 **

** Minor update to fix issues with varying heights and overflow onto content below the slider. Fixes the visibility of the pagination and the navigation in the "fade" mode. **

** Version 2.6.1 **

** SmoothHeight now uses innerHeight() instead of height() to account for padding in calculation. Defining var altText to prevent error. bower.json add fonts folder on main field. Changed true to false in order to make sure whether or not to allow a slider comprised of a single slide. **

** Version 2.6.0 **

** Adds composer json file, scope fix for focused keyword, fixes bower demo folder exclusion, z-index fix for disabled nav arrow, play/pause accessibility fix, itemMargin fix for slider items, fixes accessibility for in focus elements and pagination controls, firefox fix for text selection on slider carousel, adds data-thumb-alt image alt attribute. **

** Version 2.5.0 **

** Bumped compatibility support starting with jQuery 1.7+. pausePlay icon fix. Firefox touch event fix. Adds customDirectionNav param. **

** Version 2.4.0 **

** Update for improved standards. Adds classes to li nav elements. Reset for li elements in stylesheet. **

** Version 2.3.0 **

** Fixes pauseInvisible attribute issue with Chrome and the Page Visibility API. **

** Version 2.2.2 **

** Fixes minified JavaScript file to remove merge conflicts. **

** Version 2.2.0 **

- Fixed event handler conflicts with devices that are both click and touch enabled. e.g., Windows 8.
- Made all slider variables public, stored in `slider.vars`. This allows manipulation of `slider.vars.minItems` and `slider.vars.maxItems` on the fly to create different fluid grids at certain breakpoints. [Check out this example demonstrating a basic technique](http://flexslider.woothemes.com/dynamic-carousel-min-max.html)
- Fixed calculations that were causing strange issues with paging and certain FlexSliders to move out of alignment.

_Be sure to test v2.2.0 with your current slider, before pushing live, to ensure everything is playing nicely._

---

## General Notes

FlexSlider is no longer licensed under the MIT license. FlexSlider now uses the license, GPLv2 and later.

In an effort to move the plugin forward, support for jQuery 1.4.2 has been dropped. The plugin now requires jQuery 1.7.0+. If you don't have access to the later versions of jQuery, [FlexSlider 1.8](https://github.com/woocommerce/FlexSlider/tree/flexslider1) should be a perfectly suitable substitute for your needs!

Your old styles and properties _might not work out of the box_. Some property names have been changed, noted below, as well as namespacing prefixes being applied to all elements. This means that `.flex-direction-nav .next` is now `.flex-direction-nav .flex-next` by default. The namespacing property is exposed, free for you to change.

No more overflow hidden woes! The plugin now generates a viewport element to handle the tedious task of working around overflow hidden. Yay!

The slider element is now accessible outside of the callback API via the jQuery .data() method. Example use: `$('#slider').data('flexslider')`

Helper strings have been added for performing actions quickly on FlexSlider elements. Example uses:

- `$('#slider').flexslider("play")  //Play slideshow`
- `$('#slider').flexslider("pause") //Pause slideshow`
- `$('#slider').flexslider("stop") //Stop slideshow`
- `$('#slider').flexslider("next")  //Go to next slide`
- `$('#slider').flexslider("prev")  //Go to previous slide`
- `$('#slider').flexslider(3)       //Go fourth slide`

Two new methods are available for adding/removing slides, `slider.addSlide()` and `slider.removeSlide()`. More details about this coming soon.

- `slider.addSlide(obj, pos)` accepts two parameters, a string/jQuery object and an index.
- `slider.removeSlide(obj)` accepts one parameter, either an object to be removed, or an index.

## Examples

- [Basic Slider](http://flexslider.woothemes.com/)
- [Basic Slider customDirectionNav](http://flexslider.woothemes.com/basic-slider-with-custom-direction-nav.html)
- [Basic Slider with Simple Caption](http://flexslider.woothemes.com/basic-slider-with-caption.html)
- [Slider w/thumbnail controlNav pattern](http://flexslider.woothemes.com/thumbnail-controlnav.html)
- [Slider w/thumbnail slider](http://flexslider.woothemes.com/thumbnail-slider.html)
- [Basic Carousel](http://flexslider.woothemes.com/basic-carousel.html)
- [Carousel with min and max ranges](http://flexslider.woothemes.com/carousel-min-max.html)
- [Carousel with min and max ranges](http://flexslider.woothemes.com/dynamic-carousel-min-max.html)
- [Video with Vimeo API](http://flexslider.woothemes.com/video.html)
- [Video with Wistia API](http://flexslider.woothemes.com/video-wistia.html)

## RTL Examples

- [Basic Slider](http://flexslider.woothemes.com/index-rtl.html)
- [Slider with Simple Caption w/thumbnail slider](http://flexslider.woothemes.com/asnavfor-rtl.html)
- [Basic Slider with Simple Caption](http://flexslider.woothemes.com/basic-carousel-rtl.html)

## Properties

### namespace: _{new}_

`namespace` controls the prefixes attached to elements created by the plugin. In previous releases, only certain elements were tagged with a prefix class, which was causing class generalization issues for some users. FlexSlider now prefixes all generated elements with the appropriate namespace.

_Hint: `namespace` can be an empty string._

### selector: _{new}_

The markup structure for FlexSlider has been limited to a "ul.slide li" pattern in previous versions of FlexSlider; no longer. You can now take full control of the markup structure used for your FlexSlider. The `selector` pattern "{container} > {slide}" is mandatory, allowing the plugin to predictably interpret the selector property. Omitting the ">" from the selector is not suggested, but is possible if your markup doesn't follow the immediate descendant pattern.

_Examples: "section > article", ".slides > .slide", "#hero .slide"_

### easing: _{new}_

`easing` allows support for jQuery easing! Default options provided by jQuery are "swing" and "linear," but more can be used by included the jQuery Easing plugin. _If you chose a non-existent easing method, the slider will break._

_Note: You need to set `useCSS: false` to force transitions in browsers that support translate3d._
_Optional: [jQuery Easing Plugin](http://gsgd.co.uk/sandbox/jquery/easing/)_

### direction: _{changed}_

Previously called "slideDirection" in v1.8 and below.

### reverse: _{new}_

`reverse` will reverse the animation direction of the slider. Meaning, horizontal sliders can move from right to left, and vertical sliders can move bottom to top.

### smoothHeight: _{new}_

`smoothHeight` allows for smooth height transitions between slides. This property currently works for the fade and horizontal slide animation. The property has no effect on horizontal sliding carousels, however.

### startAt: _{changed}_

Previously called "slideToStart" in v1.8 and below.

### animationSpeed: _{changed}_

Previously called "animationDuration" in v1.8 and below.

### initDelay: _{new}_

`initDelay` will delay the initial slideshow of a slider, given in milliseconds. The slider will still initialize, generating controls and displaying the first image, but the slideshow will wait until the `initDelay` time has completed before starting the slideshow.

### useCSS: _{new}_

`useCSS` allow users to override using CSS3 for animation. Translate3d still has numerous bugs that can crop up and wreak havoc, so this is a great property to play with if you are experiencing unexplainable issues in Webkit browsers.

_Hint: Use conditionals to enable/disable the use of CSS3 on desktops and mobile devices. Mobile devices, in my experience, do not share many of the translate3d bugs seen on desktop browsers._

### touch: _{new}_

`touch` allows users to exclude touch swipe functionality from their sliders.

### keyboard: _{changed}_

Previously called "keyboardNav" in v1.8 and below.

### multipleKeyboard _{new}_

`multipleKeyboard` allows users to override the default plugin keyboard behavior, enabling keyboard control of more than one slider on the page. This means that all visible sliders will animate, at the same time, via keyboard input.

_Hint: You can use `multipleKeyboard` to allow keyboard navigation on pages where multiple sliders are present, but only one is visible._

### mousewheel: _{updated}_

`mousewheel` now requires the jQuery Mousewheel plugin. There are a few reasons for this, but primarily because there is no need for FlexSlider itself to reinvent the awkward complexity of mousewheel interactivity that is handled perfectly by the Mousewheel plugin.

_Required: [jQuery Mousewheel Plugin](https://github.com/brandonaaron/jquery-mousewheel)_

### controlsContainer: _{updated}_

`controlsContainer` is one of the more painstaking, potentially confusing properties within FlexSlider. First, the property is no longer required to workaround `overflow: hidden` on slide animation. Second, the property now accepts a **jQuery object**, giving you precise control over the object you want. The plugin no longer attempts to guess what element you are selecting.

### customDirectionNav: _{new}_

`customDirectionNav` allows the ability to add custom directional navigation elements. Can be used in conjunction with controlsContainer for pagination controls container.

_[Example of customDirectionNav being used](http://flexslider.woothemes.com/basic-slider-with-custom-direction-nav.html)_

### sync: _{new}_

`sync` is a new property that will allow other slider(s) to hook into the current slider via a given selector. The selector should describe an object that has already been initialized as a FlexSlider. Right now, `sync` will synchronize animation, play, and pause behaviors. More behaviors can be added in the future as the property matures.

_[Example of sync being used](http://flex.madebymufffin.com/examples/basic-carousel.html)_

### asNavFor: _{new}_

Description to be added.

### itemWidth: _{new}_

`itemWidth` is the primary property for the new carousel options. Without this property, your slider is not considered a carousel. To use `itemWidth`, give an integer value of the width of your individual slides. This should include borders and paddings applied to your slides; a total width measurement.

### itemMargin: _{new}_

`itemMargin` describes the gutter between the slide elements. If each slide has a margin-left of 10px, your itemMargin value would be 10. If elements have margin: 0 10px, your itemMargin would be 20.

### minItems: _{new}_

`minItems` describes the minimum number of slide elements that should be visible in the carousel. When the slider reaches the minimum item count, the slides will resize fluidly with the slider.

### maxItems: _{new}_

`maxItems` describes the maximum number of slide elements that should be visible in the carousel. When the slider reaches the maximum item count, the slides will resize fluidly with the sider.

### move: _{new}_

`move` determines how many slides should be animated within the carousel. When left at 0, the slider will animate the number of visible slides. If any value greater than 0 is given, the slider will animate that number of slides in the carousel on each animation interval.

_Hint: The move property will be ignored if the value is higher than the number of visible slides, which can be utilized in responsive design._

### added: _{new}_

`added()` is a new callback event fired in the new slider.addSlide() function.

### removed: _{new}_

`removed()` is a new callback event fired in the new slider.removeSlide() function.

### allowOneSlide: _{new}_

Boolean. Whether or not you'd like FlexSlider to initialize as usual if only one slide is present.

### rtl: _{new}_

Boolean. False by default. Supports RTL functionality in the slider.
_Note: you must add `style="direction:rtl"` to your container div in order for this to work._
