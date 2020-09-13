(function( $ ) {
    'use strict';
	$( window ).load(function() {
        console.log('Wp Theme Zone Initialized');
        /**
         * LazyLoading Laziness
         */
        if("loading"in HTMLImageElement.prototype){document.querySelectorAll('img[loading="lazy"]').forEach(e=>{e.src=e.dataset.src})}else{const e=document.createElement("script");e.src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js",document.body.appendChild(e)}
	});
})( jQuery );
