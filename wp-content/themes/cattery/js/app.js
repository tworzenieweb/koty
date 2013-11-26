(function($) {

    var scroller = {
        wrapper: null,
        scrollable: null,
        replacePhoto: function(target, photoLink)
        {

            target.empty();

            var img = new Image();

            $(img)
                    // once the image has loaded, execute this code
                    .load(function() {
                        // set the image hidden by default    
                        $(this).hide();

                        // with the holding div #loader, apply:
                        target
                                // remove the loading class (so no background spinner), 
                                .removeClass('loading')
                                // then insert our image
                                .append(this);

                        // fade our image in to create a nice effect
                        $(this).fadeIn();
                    })

                    // if there was an error loading the image, react accordingly
                    .error(function() {
                        // notify the user that the image could not be loaded
                    })

                    // *finally*, set the src attribute of the new image to our image
                    .attr('src', photoLink);

        },
        initPhotoClick: function()
        {
            var self = this;
            var pic = $('.pic', this.wrapper);

            this.scrollable.on('click', 'a', function(e) {

                e.preventDefault();

                pic.addClass('loading');

                var href = $(this).attr('href');
                self.replacePhoto(pic, href);

            });

            pic.bind('click', function(e) {

                e.preventDefault();

                $(this).addClass('loading');
                var src = $('img', $(this)).attr('src');

                var current = $('li:has(a[href="' + src + '"])', self.scrollable);

                var next = current.next();

                var link = null;

                if (next.length)
                {
                    link = $('a', next);
                }
                else
                {
                    link = $('li:first-child a', self.scrollable)
                }

                self.replacePhoto($(this), link.attr('href'));



            });

            var link = $('li:first-child a', this.scrollable).attr('href');

            this.replacePhoto(pic, link);

            this.scrollable.css('display', 'block');


        },
        init: function()
        {

            this.wrapper = $('.ngg-galleryoverview');

            if (this.wrapper.length) {

                this.scrollable = $("#makeMeScrollable");

                this.scrollable.smoothDivScroll({
                    mousewheelScrolling: "allDirections",
                    manualContinuousScrolling: true,
                    autoScrollingMode: "onStart",
                    autoScrollingInterval: 50,
                    autoScrollingStarted: this.initPhotoClick()
                });

            }


        }

    };

    function call_lazy_load_images() {
        $("#content img").unveil(300);
    }

    function call_slider_sequence() {
        if ($('#sequence').length > 0) {
            var options = {
                autoPlay: true,
                autoPlayDelay: 12000,
                pauseOnHover: false,
                hidePreloaderDelay: 1000,
                nextButton: true,
                prevButton: true,
                pauseButton: true,
                preloader: true,
                hidePreloaderUsingCSS: false,
                animateStartingFrameIn: true,
                navigationSkipThreshold: 1700,
                preventDelayWhenReversingAnimations: true,
                customKeyEvents: {
                    80: "pause"
                }
            };


            var sequence = $("#sequence").sequence(options).data("sequence");
        }
    }



    function call_scroll() {
        /*Show back to top*/

        $("#back_to_top").localScroll({
            target: 'body'
        });
    }


    var body = $('body'), _window = $(window);

    $(function() {

        body.waitForImages(function() {

            call_scroll();
            call_slider_sequence();
            call_lazy_load_images();

            scroller.init();

        });

    });

})(jQuery);