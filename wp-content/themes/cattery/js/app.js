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
                var src = $('img',$(this)).attr('src');
                
                var current = $('li:has(a[href="' + src + '"])', self.scrollable);
                
                var next = current.next();
                
                var link = null;
                
                if(next.length)
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


$(function() {
    
    $('body').waitForImages(function() {

        call_scroll();
        call_slider_sequence();    
        call_tab();
        call_lightbox();
        call_lazy_load_images();
        scroller.init();

    });
    
});


function call_lazy_load_images(){
  //$("#content img").unveil(300)
  $("#content img").unveil(300);
}


function call_tab(){
  $('.lobster_tab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  })
}

function call_slider_sequence(){
  if($('#sequence').length > 0){
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


function call_grid(){
  setTimeout(function() {
    var selector = $('.gridmasonry');
    if($(selector).length > 0){
      $(selector).fadeIn();
      var $container = $('.gridmasonry');
      // trigger masonry
      $container.masonry({
        itemSelector: '.item_grid'
      });
      
    }
  }, 500);
    
}

function call_scroll(){
  /*Show back to top*/    
  
  $("#back_to_top").localScroll({
    target:'body'   
  });
}

function call_lightbox(){
  if($('.image_link').length > 0){
    $('.image_link').magnificPopup({
      type:'image'
    
    });  
  }
  
  if($('.galeries_footer').length > 0){
    $('.galeries_footer').magnificPopup({
      delegate: 'a',
      type: 'image',
      tLoading: 'Loading image...',
      mainClass: 'mfp-img-mobile',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      },
      image: {
        tError: 'The image could not be loaded.',
        titleSrc: function(item) {
          return item.el.attr('title') + '<small>by Your name</small>';
        }
      }
    }); 
  }
}