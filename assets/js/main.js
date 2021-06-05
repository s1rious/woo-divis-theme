'use strict';
jQuery(window).on('load', function () {
	/*------------------
		Preloder
	--------------------*/
	jQuery(".loader").fadeOut();
	jQuery("#preloder").delay(400).fadeOut("slow");
	jQuery('.main-menu').slicknav({
		prependTo: '.main-navbar .container',
		closedSymbol: '<i class="flaticon-right-arrow"></i>',
		openedSymbol: '<i class="flaticon-down-arrow"></i>'
	});
	/*------------------
		ScrollBar
	--------------------*/
	jQuery('.woocommerce-product-gallery--with-images').append("<div class='product-thumbs'></div>")
	jQuery('.product-thumbs').append(jQuery('.flex-control-thumbs'));
	jQuery('.product-thumbs').niceScroll({
		cursorborder: "",
		cursorcolor: "#afafaf",
		boxzoom: false,
		cursoropacitymin: 1,
		cursorwidth: "3px", // cursor width in pixel (you can also write "5px")
	});
	jQuery('.cart-table-wrap').niceScroll({
		cursorborder: "",
		cursorcolor: "#afafaf",
		boxzoom: false,
		cursoropacitymin: 1,
		cursorwidth: "2px"
	});
	/*------------------
		Background Set
	--------------------*/
	jQuery('.set-bg').each(function () {
		var bg = jQuery(this).data('setbg');
		jQuery(this).css('background-image', 'url(' + bg + ')');
	});
	/*------------------
		Hero Slider
	--------------------*/
	var hero_s = jQuery(".hero-slider");
	jQuery(".hero-slider").owlCarousel({
		nav: false,
		loop: true,
		dots: true,
		margin: 0,
		items: 1,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
		smartSpeed: 1200,
		autoHeight: false,
		autoplay: false,
		responsive: {
			480: {
				nav: true
			},
		},
		onInitialized: function () {
			var a = this.items().length;
			jQuery("#snh-1").html("<span>1</span><span>" + a + "</span>");
		}
	}).on("changed.owl.carousel", function (a) {
		var b = --a.item.index,
			a = a.item.count;
		jQuery("#snh-1").html("<span> " + (1 > b ? b + a : b > a ? b - a : b) + "</span><span>" + a + "</span>");

	});

	hero_s.append('<div class="slider-nav-warp"><div class="slider-nav"></div></div>');
	jQuery(".hero-slider .owl-nav, .hero-slider .owl-dots").appendTo('.slider-nav');


	/*------------------
		Brands Slider
	--------------------*/
	jQuery('.product-slider').owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		margin: 30,
		autoplay: true,
		navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
		responsive: {
			0: {
				items: 1,
			},
			480: {
				items: 2,
			},
			768: {
				items: 3,
			},
			1200: {
				items: 4,
			}
		}
	});
	/*------------------
		Accordions
	--------------------*/
	jQuery('.panel-link').on('click', function (e) {
		jQuery('.panel-link').removeClass('active');
		var jQuerythis = jQuery(this);
		if (!jQuerythis.hasClass('active')) {
			jQuerythis.addClass('active');
		}
		e.preventDefault();
	});
	/*-------------------
		Quantity change
	--------------------- */
	String.prototype.getDecimals = function () {
		var num = this,
			match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
		if (!match) {
			return 0;
		}
		return Math.max(0, (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
	}
	jQuery('body').on('click', '.qty_button', function () {
		var $qty = $(this).closest('.quantity').find('.qty'),
			currentVal = parseFloat($qty.val()),
			max = parseFloat($qty.attr('max')),
			min = parseFloat($qty.attr('min')),
			step = $qty.attr('step');
		// Format values
		if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
		if (max === '' || max === 'NaN') max = '';
		if (min === '' || min === 'NaN') min = 0;
		if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;

		// Change the value
		if ($(this).is('.plus')) {
			if (max && (currentVal >= max)) {
				$qty.val(max);
			} else {
				$qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
			}
		} else {
			if (min && (currentVal <= min)) {
				$qty.val(min);
			} else if (currentVal > 0) {
				$qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
			}
		}
		$qty.trigger('change');
		$("[name='update_cart']").trigger("click");
	});
})