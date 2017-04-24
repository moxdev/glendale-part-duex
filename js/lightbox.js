
jQuery(window).load(function() {

    var activityIndicatorOn = function() {
        jQuery( '<div id="imagelightbox-loading"><div></div></div>' ).appendTo( 'body' );
    }

    activityIndicatorOff = function() {
        jQuery( '#imagelightbox-loading' ).remove();
    }

    overlayOn = function() {
        jQuery( '<div id="imagelightbox-overlay"></div>' ).appendTo( 'body' );
    }

    overlayOff = function() {
        jQuery( '#imagelightbox-overlay' ).remove();
    }

    closeButtonOnPlans = function( instance ) {
        jQuery( '<div class="wrapper"><button type="button" id="imagelightbox-close" title="Close">X</button></div>' ).appendTo( '#imagelightbox-overlay' ).on( 'click touchend', function(){ jQuery( this ).remove(); instance.quitImageLightbox(); return false; });
    }

    closeButtonOnGallery = function( instance ) {
        jQuery( '<div class="wrapper"><button type="button" id="imagelightbox-close" title="Close">&lt; Return to Gallery</button></div>' ).appendTo( '#imagelightbox-overlay' ).on( 'click touchend', function(){ jQuery( this ).remove(); instance.quitImageLightbox(); return false; });
    }

    closeButtonOff = function() {
        jQuery( '#imagelightbox-close' ).remove();
    }

    captionOn = function() {
        var description = jQuery( 'a[href="' + jQuery( '#imagelightbox' ).attr( 'src' ) + '"] img' ).attr( 'description' );
        if( description.length > 0 ) {
                jQuery( '<div id="imagelightbox-caption">' + description + '</div>' ).appendTo( 'body' );
        }
    }

    captionOff = function() {
        jQuery( '#imagelightbox-caption' ).remove();
    }

    arrowsOn = function( instance, selector ) {
        var $arrows = jQuery( '<button type="button" class="imagelightbox-arrow imagelightbox-arrow-left">&lt;</button><button type="button" class="imagelightbox-arrow imagelightbox-arrow-right">&gt;</button>' );
        $arrows.appendTo( 'body' );

        $arrows.on( 'click touchend', function( e ) {
        e.preventDefault();
        var $this   = jQuery( this ),
            $target = jQuery( selector + '[href="' + jQuery( '#imagelightbox' ).attr( 'src' ) + '"]' ),
            index   = $target.index( selector );

            if( $this.hasClass( 'imagelightbox-arrow-left' ) ) {
                index = index - 1;
                if( !jQuery( selector ).eq( index ).length )
                    index = jQuery( selector ).length;
            } else {
                index = index + 1;
                if( !jQuery( selector ).eq( index ).length )
                    index = 0;
            }

            instance.switchImageLightbox( index );
            return false;
        });
    }

    arrowsOff = function() {
        jQuery( '.imagelightbox-arrow' ).remove();
    };

    var selectorC = 'a[data-imagelightbox="c"]';
    var instanceC = jQuery( 'a[data-imagelightbox="c"]' ).imageLightbox({
        onLoadStart: function() { activityIndicatorOn(); captionOff();},
        onLoadEnd:   function() { activityIndicatorOff(); captionOn();},
        onStart: function() { overlayOn(); closeButtonOnPlans(instanceC); arrowsOn( instanceC, selectorC );},
        onEnd: function() { overlayOff(); captionOff(); closeButtonOff(); arrowsOff();}
    });

    var selectorA = 'a[data-imagelightbox="a"]';
    var instanceA = jQuery( 'a[data-imagelightbox="a"]' ).imageLightbox({
        onLoadStart: function() { activityIndicatorOn(); captionOff();},
        onLoadEnd:   function() { activityIndicatorOff(); captionOn();},
        onStart: function() { overlayOn(); closeButtonOnGallery(instanceA); arrowsOn( instanceA, selectorA );},
        onEnd: function() { overlayOff(); captionOff(); closeButtonOff(); arrowsOff();}
    });
});