
// adjust margin to fixed footer
function adjustMarginToFooter() {
	let footerWrapper = document.querySelector('.js-footer-wrapper');
	const FOOTER_HEIGHT = footerWrapper.offsetHeight; 
	const MAIN = document.getElementById('main');
	MAIN.style.marginBottom = FOOTER_HEIGHT + 'px';
}

function fixFooterDependingOnScrollPosition() {
	const MAIN = document.getElementById('main');
	const MAIN_OFFSETTOP = MAIN.offsetTop;
	const MAIN_HEIGHT = MAIN.offsetHeight;
	const WINDOW_HEIGHT = window.innerHeight;
	const WINDOW_OFFSET = window.pageYOffset; 
	let footerWrapper = document.querySelector('.js-footer-wrapper');

	if ((WINDOW_HEIGHT + WINDOW_OFFSET) > (MAIN_OFFSETTOP + MAIN_HEIGHT)) {
		footerWrapper.classList.add('fixed');
	} else {
		footerWrapper.classList.remove('fixed');
	}
}

// reopen complianz cookie layer
function initReopenCookieLayer() {
	const COMPLIANZ_COOKIE_TRIGGER = document.querySelector('.js-open-complianz-modal');
	const COMPLIANZ_COOKIE_MODAL = document.querySelector('.cc-revoke');

	if (COMPLIANZ_COOKIE_TRIGGER && COMPLIANZ_COOKIE_MODAL) {
		COMPLIANZ_COOKIE_TRIGGER.addEventListener('click', function() {
			COMPLIANZ_COOKIE_MODAL.click();
		});
	}
}

// toggle mobile menu
function initMobileMenuTrigger() {
	let menu = document.getElementsByClassName('js-toggle-hnavi')[0];
	let hnavi = document.querySelector('#hnavi');

	if (menu && hnavi) {
		menu.addEventListener('click', function() {
			const ICON = menu.querySelector('i');
			menu.classList.toggle('active');
			ICON.classList.toggle('fa-times');
			ICON.classList.toggle('fa-bars');
			hnavi.classList.toggle('active');
		});
	}
}

function initDetailSlider() {
	let slider = tns({
		container: '.js-detail-teaser-slider',
		items: 2,
		gutter: 15,
		slideBy: 2,
		autoplay: false, 
		controls: false,
		nav: true,
		navPosition: 'bottom',
		autoplayButton: false,
		autoplayButtonOutput: false,
		autoHeight: true,
		mouseDrag: true,
		responsive: {
			600: {
				items: 3,
				slideBy: 3,
			},
		}
	});
}

// Vanilla
document.addEventListener('DOMContentLoaded', function() {
	initReopenCookieLayer();

	initMobileMenuTrigger();

	fixFooterDependingOnScrollPosition();

	initDetailSlider();

	setTimeout(function(){
		adjustMarginToFooter();
	}, 1);

	window.addEventListener('resize', function() {
		adjustMarginToFooter();
	});

	window.addEventListener('scroll', function() {
		fixFooterDependingOnScrollPosition();

		const WINDOW_OFFSET = window.pageYOffset; // scrollTop
		const HEADERTOP_HEIGHT = document.getElementById('header-top').offsetHeight; // outerHeight
		const HEADER = document.getElementById('header');
		const MOBILE_TITLE = document.querySelector('.js-header-mobile-title');

		if (WINDOW_OFFSET > HEADERTOP_HEIGHT) {
			HEADER.classList.add('fixed-header');
			document.body.style.marginTop = HEADER.offsetHeight + 'px';

			if (window.matchMedia("(max-width: 991px)").matches) {
				MOBILE_TITLE.style.display = 'block';
			}
        } else {
			HEADER.classList.remove('fixed-header');
			document.body.style.marginTop = 0 + 'px';

			if (window.matchMedia("(max-width: 991px)").matches) {
				MOBILE_TITLE.style.display = 'none';
			}
        }
	});
})