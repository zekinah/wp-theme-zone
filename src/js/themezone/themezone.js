(function( $ ) {
    'use strict';
	$( window ).load(function() {
        console.log('Wp Theme Zone Initialized');
        scrollBar();
        lazyLoad();
    });

    function scrollBar() {
        $("#bar").css("width", "0%");
        if (document.body.clientWidth > 860) { 
            $(window).scroll(function () {
                var s = $(window).scrollTop(),
                    a = $(document).height(),
                    b = $(window).height(),
                result = parseInt(s / (a - b) * 100);
                 $("#bar").css("width", result + "%");
            });
        }
    }

    function lazyLoad() {
        if("loading"in HTMLImageElement.prototype){document.querySelectorAll('img[loading="lazy"]').forEach(e=>{e.src=e.dataset.src})}else{const e=document.createElement("script");e.src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js",document.body.appendChild(e)}
    }
})( jQuery );
