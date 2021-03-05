/* toggle mobile navi */
jQuery('.js-toggle-hnavi').on('click', function(){
	jQuery(this).toggleClass('active');
	jQuery(this).find('i').toggleClass('fa-times fa-bars');
	jQuery('#hnavi').slideToggle();
});

jQuery('.js-toggle-sub-menu').on('click', function(){
	jQuery(this).toggleClass('fa-plus fa-minus').next('ul.sub-menu').slideToggle();
});

/* toggle mobile search */
jQuery('.js-toggle-search').on('click', function(){
   	jQuery(this).toggleClass('active');
   	jQuery('#header .search-form').slideToggle();
});

/* scroll to */
function initScrollTo() {
	jQuery('.js-scrollto').on('click', function(){
		jQuery('html, body').animate({scrollTop: jQuery(jQuery(this).attr('href')).offset().top -0});
		return false;
	});
}

/* cookie notice */
function checkCookieBar() {

	if (jQuery('body').hasClass('cookies-not-set')) {
		var cookieHeight = jQuery('#cookie-notice').height();
		jQuery('body').css('padding-bottom', cookieHeight);
	}
}

function adjustMarginToFooter() {
    var footerHeight = jQuery('.footer--wrapper').outerHeight(true);
    jQuery('#main').css('margin-bottom', footerHeight + 'px');
}

function adjustDetailArrowHeight() {
	let teaserElement = document.querySelector('.detail-teaser__element');
	if (!teaserElement) return;
	let imageHeight = teaserElement.querySelector('.attachment-blog-overview').offsetHeight;
	if (imageHeight) {
		imageHeight = imageHeight / 2;

		let detailTeaserSlider = document.querySelector('.js-detail-teaser-slider');
		let arrows = detailTeaserSlider.querySelectorAll('.slick-arrow');
		arrows.forEach(function(arrow) {
			arrow.style.top = imageHeight + 'px';
		});
	}
}

function initSlider() {
	jQuery('.js-detail-teaser-slider').slick({
		infinite: true,
		slidesToShow: 3,
  		slidesToScroll: 1,
		speed: 300,
		arrows: true,
		autoplay: true,
		autoplaySpeed: 3000,
		prevArrow: '<button class="detail-teaser__arrow-left"><i class="fal fa-chevron-left"></i></button>',
		nextArrow: '<button class="detail-teaser__arrow-right"><i class="fal fa-chevron-right"></i></button>',
		responsive: [
			{
		      breakpoint: 780,
			      settings: {
		          slidesToShow: 2,
      			}
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		      }
		    }
		]
	});
	setTimeout(function() {
		adjustDetailArrowHeight();
	}, 2000);
}

function checkMainPosition() {

	var offsetTop = jQuery("#main").offset().top;
	var mainHeight = jQuery("#main").height();
	var windowHeight = jQuery(window).height();
	var windowScrollPosition = jQuery(window).scrollTop();
	if ((windowHeight+windowScrollPosition)>(offsetTop+mainHeight)) {
	  jQuery('.footer--wrapper').addClass('fixed');
  } else {
	  jQuery('.footer--wrapper').removeClass('fixed');
  }
}

jQuery(document).ready(function() {
	checkCookieBar();
	initScrollTo();
	initSlider();
	setTimeout(function(){
		adjustMarginToFooter();
	}, 1);
	checkMainPosition();

	jQuery(window).resize(function () {
        adjustMarginToFooter();
		checkCookieBar();
		adjustDetailArrowHeight();
    });

    jQuery(window).scroll(function(){
		checkMainPosition();
        if (jQuery(window).scrollTop() > jQuery('#header-top').outerHeight(true)) {
			let $header = jQuery('#header');
			$header.addClass('fixed-header');
			jQuery('body').css('margin-top', $header.outerHeight());
			if (window.matchMedia("(max-width: 991px)").matches) {
				jQuery('.header-bottom--mobile-link').show();
			}
        }
        else {
            jQuery('#header').removeClass('fixed-header');
			jQuery('body').removeAttr("style");
			if (window.matchMedia("(max-width: 991px)").matches) {
				jQuery('.header-bottom--mobile-link').hide();
			}
        }
    });
});
