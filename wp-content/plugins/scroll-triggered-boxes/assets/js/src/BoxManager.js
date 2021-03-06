module.exports = (function($) {
	'use strict';

	// Global Variables
	var boxes = {},
		windowHeight = window.innerHeight,
		scrollTimer = 0,
		resizeTimer = 0,
		overlay = document.getElementById('stb-overlay'),
		options = window.STB_Global_Options || {},
		EventEmitter = require('./EventEmitter.js'),
		events = new EventEmitter;

	var Box = require('./Box.js');

	// Functions

	// initialise & add event listeners
	function init() {
		$(".scroll-triggered-box").each(createBoxFromDOM);

		// event binds
		$(window).bind('scroll.stb', onScroll);
		$(window).bind('resize.stb', onWindowResize);
		$(window).bind('load', onLoad );
		$(document).keyup(onKeyUp);
		$(overlay).click(dismissAllBoxes);

		// print message when test mode is enabled
		if( options.testMode ) {
			console.log( 'Scroll Triggered Boxes: Test mode is enabled. Please disable test mode if you\'re done testing.' );
		}
	}

	function onLoad() {
		recalculateHeights();

		// show box if MailChimp for WordPress printed a request object in JS
		// todo: decouple this, make it better..
		if( typeof( window.mc4wpFormRequest ) === "object" && typeof( window.mc4wpFormRequest.element ) === "object" ) {
			var request = window.mc4wpFormRequest;
			var $parentBox = $(request.element).parents('.stb');

			// check if form is inside box
			if( $parentBox.length ) {
				showBox( parseInt( $parentBox.attr('id').substring(4) ) );
			}

		}
	}

	// create a Box object from the DOM
	function createBoxFromDOM() {
		var $box = $(this);
		var id = parseInt(this.id.substring(4));
		var boxOptions = STB_Box_Options[id];
		boxOptions.element = this;
		boxOptions.$element = $box;
		boxOptions.testMode = options.testMode;
		boxes[boxOptions.id] = new Box(boxOptions, events);
	}

	function onWindowResize() {
		resizeTimer && clearTimeout(resizeTimer);
		resizeTimer = window.setTimeout(recalculateHeights, 100);
	}

	// "scroll" listener
	function onScroll() {
		scrollTimer && clearTimeout(scrollTimer);
		scrollTimer = window.setTimeout(checkBoxCriterias, 100);
	}

	// "keyup" listener
	function onKeyUp(e) {
		if (e.keyCode == 27) {
			dismissAllBoxes();
		}
	}

	// hide and disable all registered boxes
	function dismissAllBoxes() {
		for( var boxId in boxes ) {
			if( boxes[boxId].visible ) {
				boxes[boxId].dismiss();
			}
		}
	}

	// show all registered boxes
	function showAllBoxes() {
		for( var boxId in boxes ) {
			if( ! boxes[boxId].visible ) {
				boxes[boxId].show();
			}
		}
	}

	// hide all registered boxes
	function hideAllBoxes() {
		for( var boxId in boxes ) {
			if( boxes[boxId].visible ) {
				boxes[boxId].hide();
			}
		}
	}

	// check criteria for all registered boxes
	// todo: refactor part of this into box object?
	function checkBoxCriterias() {

		var scrollY = $(window).scrollTop();
		var scrollHeight = scrollY + ( windowHeight * 0.9 );

		for( var boxId in boxes ) {
			var box = boxes[boxId];

			if( ! box.mayAutoShow() ) {
				continue;
			}

			if( scrollHeight > box.triggerHeight ) {
				if( ! box.visible ) {
					box.show();
					box.triggered = true;
				}
			} else if( box.mayAutoHide() ) {
				if( box.visible ) {
					box.hide();
				}
			}
		}
	}

	// recalculate heights and variables based on height
	function recalculateHeights() {
		windowHeight = window.innerHeight;

		for( var boxId in boxes ) {
			var box = boxes[boxId];
			box.setCustomBoxStyling();
		}
	}

	// dismiss a single box (or all by omitting id param)
	function dismiss(id) {
		// if no id given, dismiss all current open boxes
		if( typeof(id) === "undefined" ) {
			dismissAllBoxes();
		} else if( typeof( boxes[id] ) === "object" ) {
			boxes[id].dismiss();
		}
	}

	function hideBox(id) {
		if( typeof( boxes[id] ) === "object" ) {
			boxes[id].hide();
		}
	}

	function showBox(id) {
		if( typeof( boxes[id] ) === "object" ) {
			boxes[id].show();
		}
	}

	function toggleBox(id) {
		if( typeof( boxes[id] ) === "object" ) {
			boxes[id].toggle();
		}
	}

	// init on document.ready
	$(document).ready(init);

	// expose a simple API to control all registered boxes
	return {
		boxes: boxes,
		showBox: showBox,
		hideBox: hideBox,
		toggleBox: toggleBox,
		showAllBoxes: showAllBoxes,
		hideAllBoxes: hideAllBoxes,
		dismissAllBoxes: dismissAllBoxes,
		dismiss: dismiss,
		events: events
	}

})(window.jQuery);