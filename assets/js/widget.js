(function ($) {

"use strict";

// progress bar script starts
function animatedProgressbar( id, type, value, strokeColor, trailColor, strokeWidth, strokeTrailWidth ){
  var triggerClass = '.widgetmax-progress-bar-' + id;
  if ( 'function' === typeof ldBar ) {
      if( 'line' === type ) {
          new ldBar( triggerClass, {
              'type'              : 'stroke',
              'path'              : 'M0 10L100 10',
              'aspect-ratio'      : 'none',
              'stroke'			: strokeColor,
              'stroke-trail'	    : trailColor,
              'stroke-width'      : strokeWidth,
              'stroke-trail-width': strokeTrailWidth
          } ).set( value );
      }
      if( 'line-bubble' === type ) {
          new ldBar( triggerClass, {
              'type'              : 'stroke',
              'path'              : 'M0 10L100 10',
              'aspect-ratio'      : 'none',
              'stroke'			: strokeColor,
              'stroke-trail'		: trailColor,
              'stroke-width'      : strokeWidth,
              'stroke-trail-width': strokeTrailWidth
          } ).set( value );
          $( $( '.widgetmax-progress-bar-' + id ).find( '.ldBar-label' ) ).animate( {
              left: value + '%'
          }, 1000, 'swing');
      }
      if( 'circle' === type ) {
          new ldBar( triggerClass, {
              'type'				: 'stroke',
              'path'			    : 'M50 10A40 40 0 0 1 50 90A40 40 0 0 1 50 10',
              'stroke-dir'		: 'normal',
              'stroke'		    : strokeColor,
              'stroke-trail'	    : trailColor,
              'stroke-width'	    : strokeWidth,
              'stroke-trail-width': strokeTrailWidth
          } ).set( value );
      }
      if( 'fan' === type ) {
          new ldBar( triggerClass, {
              'type': 'stroke',
              'path': 'M10 90A40 40 0 0 1 90 90',
              'stroke': strokeColor,
              'stroke-trail': trailColor,
              'stroke-width': strokeWidth,
              'stroke-trail-width': strokeTrailWidth
          } ).set( value );
      }
  }
}

var WidgetmaxProgressBar = function ( $scope, $ ){
  var progressBarWrapper = $scope.find( '[data-progress-bar]' ).eq( 0 );
  if ( $.isFunction( $.fn.waypoint ) ) {
      progressBarWrapper.waypoint( function () {
          var element      = $( this.element ),
          id               = element.data( 'id' ),
          type             = element.data( 'type' ),
          value            = element.data( 'progress-bar-value' ),
          strokeWidth      = element.data( 'progress-bar-stroke-width' ),
          strokeTrailWidth = element.data( 'progress-bar-stroke-trail-width' ),
          color            = element.data( 'stroke-color' ),
          trailColor       = element.data( 'stroke-trail-color' );
          animatedProgressbar( id, type, value, color, trailColor, strokeWidth, strokeTrailWidth );
          this.destroy();
      }, {
          offset: 'bottom-in-view'
      } );
  }
}
// progress bar script ends


// animated text script starts
var WidgetmaxAnimatedText = function( $scope, $ ) {
  
	var animatedWrapper = $scope.find( '.widgetmax-typed-strings' ).eq(0),
	animateSelector     = animatedWrapper.find( '.widgetmax-animated-text-animated-heading' ),
	animationType       = animatedWrapper.data( 'heading_animation' ),
	animationStyle      = animatedWrapper.data( 'animation_style' ),
	animationSpeed      = animatedWrapper.data( 'animation_speed' ),
	typeSpeed           = animatedWrapper.data( 'type_speed' ),
	startDelay          = animatedWrapper.data( 'start_delay' ),
	backTypeSpeed       = animatedWrapper.data( 'back_type_speed' ),
	backDelay           = animatedWrapper.data( 'back_delay' ),
	loop                = animatedWrapper.data( 'loop' ) ? true : false,
	showCursor          = animatedWrapper.data( 'show_cursor' ) ? true : false,
	fadeOut             = animatedWrapper.data( 'fade_out' ) ? true : false,
	smartBackspace      = animatedWrapper.data( 'smart_backspace' ) ? true : false,	
	id                  = animateSelector.attr('id');

	if ( 'function' === typeof Typed ) {
		if( 'widgetmax-typed-animation' === animationType ){
			var typed = new Typed( '#'+id, {
				strings: animatedWrapper.data('type_string'),
				loop: loop,
				typeSpeed: typeSpeed,
				backSpeed: backTypeSpeed,
				showCursor : showCursor,
				fadeOut : fadeOut,
				smartBackspace : smartBackspace,
				startDelay : startDelay,
				backDelay : backDelay
			});
		}
	}


 	if ( $.isFunction( $.fn.Morphext ) ) {
		if( 'widgetmax-morphed-animation' === animationType ){
			$( animateSelector ).Morphext({
				animation: animationStyle,
				speed: animationSpeed
			});
		}
	}
}
// animated text script ends






 // Make sure you run this code under Elementor..
    $(window).on('elementor/frontend/init', function () {;
        elementorFrontend.hooks.addAction('frontend/element_ready/widgetmax-progress-bar.default', WidgetmaxProgressBar);
        elementorFrontend.hooks.addAction('frontend/element_ready/widgetmax-animated.default', WidgetmaxAnimatedText);

    });

})(jQuery);