document.addEventListener("DOMContentLoaded", function () {

	// Custom JS

});

const header = document.querySelector('.header');
const togglemenu = document.querySelector('#toggle-menu');
const menu = document.querySelector('.menu');
const overlay = document.querySelector('.overlay');
var scrollPrev = 0;
togglemenu.addEventListener('click', () => {
	togglemenu.classList.toggle("on");
	menu.classList.toggle("on");
	overlay.classList.toggle("active");
	document.body.classList.toggle("noscroll");
	let wsb = widthScrollBar();
	if (togglemenu.classList.contains('on')) {
		header.style.paddingRight = widthScrollBar() + 'px';
		document.querySelector('.main').style.paddingRight = wsb + 'px';
		document.querySelector('.footer').style.paddingRight = wsb + 'px';
	} else {
		header.style.paddingRight = '0px';
		document.querySelector('.main').style.paddingRight = '0px';
		document.querySelector('.footer').style.paddingRight = '0px';
	}
});



window.addEventListener('click', (e) => {
	if (e.target == overlay) {
		togglemenu.classList.remove("on");
		menu.classList.remove("on");
		overlay.classList.remove("active");
		document.body.classList.remove("noscroll");
		header.style.paddingRight = '0px';
		document.querySelector('.main').style.paddingRight = '0px';
		document.querySelector('.footer').style.paddingRight = '0px';
	}
});



window.addEventListener('scroll', () => {
	let scrolled = window.pageYOffset;
	if (scrolled >= 500) {
		header.classList.add("scrolled");
	} else if (scrolled <= 500) {
		header.classList.remove("scrolled");
	}
	if (scrolled >= 900) {
		header.classList.add("on");
	} else if (scrolled <= 900) {
		header.classList.remove("on");
	}

});


var galleries = document.querySelectorAll('.lg');
for (let i = 0; i < galleries.length; i++) {
	lightGallery(galleries[i], {
		thumbnail: false,
		selector: '.lg-item',
		download: false
	})
}

const createProductSingleSlider = () => {

	let thumb = new Swiper(".cottage-thumbs-slider", {
		spaceBetween: 14,

		loop: false,
		slidesPerView: 4,
		autoHeight: false,
		// slidesPerColumnFill: 'row',
		breakpoints: {
			'768': {
				direction: 'vertical',
			}
		},

	});
	let big = new Swiper(".cottage-big-slider", {
		spaceBetween: 16,
		autoHeight: false,
		loop: false,
		navigation: {
			prevEl: ".slider-btn__item_prev",
			nextEl: ".slider-btn__item_next",
		},
		pagination: {
			el: '.slider-pagination',
			clickable: true,
		},
		thumbs: {
			swiper: thumb,
		},
	});

}

createProductSingleSlider();


const createAboutSlider = () => {

	let about = new Swiper(".about-slider", {
		spaceBetween: 8,
		slidesPerView: 1,
		autoHeight: false,
		loop: true,
		navigation: {
			prevEl: ".slider-btn__item_prev",
			nextEl: ".slider-btn__item_next",
		},
		breakpoints: {
			'576': {
				pagination: false,
				slidesPerView: 2,
				spaceBetween: 16,
			},
			'768': {
				slidesPerView: 3,
			},
			'992': {
				slidesPerView: 4,
				spaceBetween: 30,
			}
		},
		pagination: {
			el: ".swiper-pagination",
		},
		// pagination: {
		// 	el: '.slider-pagination',
		// 	clickable: true,
		// },

	});

}

createAboutSlider();


if (document.querySelector('#open-video')) {
	document.querySelector('#open-video').addEventListener('click', openVideo);
}

function openVideo() {
	let modalCallback = document.getElementById("modal-video");
	if (document.getElementById("modal-video").querySelector('video')) {
		document.getElementById("modal-video").querySelector('video').play();
	}
	window.addEventListener('click', function (e) {
		if (e.target.classList.contains("modal") || e.target.classList.contains("modal-content")) {
			fadeOut(modalCallback, 300);
			if (document.getElementById("modal-video").querySelector('video')) {
				document.getElementById("modal-video").querySelector('video').pause();
			}
		}
	});
	let close = modalCallback.querySelector(".modal-content__close");
	fadeIn(modalCallback, 300, 'flex');
	close.onclick = function () {
		fadeOut(modalCallback, 300);
		if (document.getElementById("modal-video").querySelector('video')) {
			document.getElementById("modal-video").querySelector('video').pause();
		}
	}
}

let memoriesItems = document.querySelectorAll('.memories__item');
if (memoriesItems) {
	memoriesItems.forEach(el => {
		el.addEventListener('click', openMemories);
	})
}

function openMemories(e) {
	let trg = e.currentTarget;
	let modal = trg.querySelector('.memories__modal');
	window.addEventListener('click', function (e) {
		if (e.target.classList.contains("memories__modal") && modal.classList.contains('active') || e.target.classList.contains("memories__modal-close")) {
			fadeOut(modal, 300);
			setTimeout(() => {
				modal.classList.remove('active');
				document.body.classList.remove("noscroll");
				header.style.paddingRight = '0px';
				document.querySelector('.main').style.paddingRight = '0px';
			}, 300);

		}
	});
	if (modal !== null && !modal.classList.contains('active')) {
		let wsb = widthScrollBar();
		fadeIn(modal, 300, 'block');
		document.body.classList.add("noscroll");
		header.style.paddingRight = wsb + 'px';
		document.querySelector('.main').style.paddingRight = wsb + 'px';
		setTimeout(() => {
			modal.classList.add('active');
		}, 300);
	}
}

function fadeIn(el, timeout, display) {
	el.style.opacity = 0;
	el.style.display = display || 'block';
	el.style.transition = `opacity ${timeout}ms`;
	setTimeout(() => {
		el.style.opacity = 1;
	}, 10);
}

function fadeOut(el, timeout) {
	el.style.opacity = 1;
	el.style.transition = `opacity ${timeout}ms`;
	el.style.opacity = 0;

	setTimeout(() => {
		el.style.display = 'none';
	}, timeout);
}

function widthScrollBar() {
	let div = document.createElement('div');
	div.style.overflowY = 'scroll';
	div.style.width = '50px';
	div.style.height = '50px';
	document.body.append(div);
	let scrollWidth = div.offsetWidth - div.clientWidth;
	div.remove();
	return scrollWidth;
}