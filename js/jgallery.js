 /**
 * Place your JS-code here.
 */
window.jGallery = (function(){
  'use strict';


    /**
     * Fade a element out
     *
     */
    function fadeOut(element, speed) 
    {
        $(element).animate({"opacity": 0}, speed, function() {
            $(element).css("display", "none");
            $(element).css("opacity", 1);
        });
    };



    /**
     * Fade a element in
     *
     */
    function fadeIn(element, speed) 
    {
        $(element).css("opacity", 0.5);
        $(element).animate({"opacity": 1}, speed, function() {
            $(element).css("display", "block");
        });
    };



    /**
     * Init the gallery
     *
     */
    function init(opt) 
    {
        var i, img, link,
            wrapOuter = $(opt.idOuter),
            wrap    = $(opt.idInner),
            lightbox = $(opt.lightbox.id),
            lightboxImg = $(opt.lightbox.idImg),
            overlay = $(opt.lightbox.idOverlay),
            host    = wrap.data('host'),
            path    = wrap.data('path'),
            thumb   = wrap.data('thumb'),
            images  = wrap.data('images'),
            nr      = images.length + 1,
            leftMost = 1,
            wrapLeft = 0;


        // Visible width
        wrapOuter.css("width", (opt.thumb.width + opt.thumb.padding * 2) * opt.thumb.visible);
        wrapOuter.css("height", opt.thumb.width + opt.thumb.padding * 2);
        wrapOuter.css("overflow", "hidden");
        wrapOuter.css("position", "relative");
        wrapOuter.css("background-color", opt.backgroundColor);
        
        // Actual width
        wrap.css("width", (opt.thumb.width + opt.thumb.padding * 2) * nr);
        wrap.css("padding", opt.padding);
        wrap.css("position", "absolute");
        wrap.css("left", wrapLeft);
        wrap.css("top", 0);

        // Lightbox
        //lightbox.css("width", opt.lightbox.width);
        //lightbox.css("height", opt.lightbox.height);

        // Should left/right be displayed?
        $(opt.thumb.right).css("display", "none");

        if (opt.thumb.visible >= nr) {
            $(opt.thumb.left).css("display", "none");
        }

        // Move thumbs left and right
        $(opt.thumb.left).on("click", function(event) {
            
            $(opt.thumb.right).css("display", "block");

            if ((leftMost + 1 + opt.thumb.visible) == nr) {
                fadeOut(this, opt.thumb.speed);
            }

            if (leftMost < (nr - opt.thumb.visible)) {
                leftMost += 1;
                console.log(leftMost);
                wrapLeft = wrapLeft - (opt.thumb.width + opt.thumb.padding * 2);
                wrap.animate({"left": wrapLeft}, opt.thumb.speed);
            }

            event.preventDefault();
        });

        // Move thumbs left and right
        $(opt.thumb.right).on("click", function(event) {

            $(opt.thumb.left).css("display", "block");

            if ((leftMost + 1) == (nr - opt.thumb.visible)) {
                fadeOut(this, opt.thumb.speed);
            }

           if (leftMost > 1) {
                leftMost -= 1;
                wrapLeft = wrapLeft + (opt.thumb.width + opt.thumb.padding * 2);
                wrap.animate({"left": wrapLeft}, opt.thumb.speed);
            }

            event.preventDefault();
        });

        // Add all thumbnails
        for (i = 0; i < images.length; i++) {
            link = $("<a></a>", {
                "href": "#", 
                "class": "jg-click",
                "data-src": host + path + images[i]
            });
            img = $("<img>", {src: host + thumb + images[i]});
            img.css("padding", opt.thumb.padding);
            link.append(img);
            wrap.append(link);
        }

        // On click thumbnail
        $(".jg-click").on("click", function(event) {

            lightboxImg.attr('src', $(this).data("src"));

            if (lightbox.css("display") !== "block") {
                overlay.css("display", "block");
                fadeIn(lightbox, opt.thumb.speed);
            }

            event.preventDefault();
        });

        // On click lightbox
        lightbox.on("click", function(event) {
            overlay.css("display", "none");
            fadeOut(lightbox, opt.thumb.speed);
            event.preventDefault();
        });

        // On click overlay lightbox
        overlay.on("click", function(event) {
            overlay.css("display", "none");
            fadeOut(lightbox, opt.thumb.speed);
            event.preventDefault();
        });
    }

    console.log("jgallery")

    return {
        "init": init
    }

}());
