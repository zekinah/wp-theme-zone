(function( $ ) {
    'use strict';
	$( window ).load(function() {
        console.log('Wp Theme Zone Initialized');
        lazyLoad();
        scrollBar();
        scrollToTop();
    });

    function scrollToTop() {
        $(window).scroll(function() {
            if ($(this).scrollTop()) {
                $('#zn-scroll-to-top').fadeIn();
            } else {
                $('#zn-scroll-to-top').fadeOut();
            }
        });
    
        $("#zn-scroll-to-top").on('click', function () {
            $("html, body").animate({scrollTop: 0}, 500);
        });
    }

    function scrollBar() {
        $("#zn-bar").css("width", "0%");
        if (document.body.clientWidth > 860) { 
            $(window).scroll(function () {
                var s = $(window).scrollTop(),
                    a = $(document).height(),
                    b = $(window).height(),
                result = parseInt(s / (a - b) * 100);
                 $("#zn-bar").css("width", result + "%");
            });
        }
    }

    function lazyLoad() {
        if("loading"in HTMLImageElement.prototype){document.querySelectorAll('img[loading="lazy"]').forEach(e=>{e.src=e.dataset.src})}else{const e=document.createElement("script");e.src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js",document.body.appendChild(e)}
    }
})( jQuery );
