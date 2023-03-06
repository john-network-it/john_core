/* Application */
var app = {
	id: '#app',
	isMobile: ((/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) || window.innerWidth < 992),
	bootstrap: {
		tooltip: {
			attr: 'data-bs-toggle="tooltip"'
		},
		popover: {
			attr: 'data-bs-toggle="popover"'
		},
		modal: {
			attr: 'data-bs-toggle="modal"',
			dismissAttr: 'data-bs-dismiss="modal"',
			event: {
				hidden: 'hidden.bs.modal'
			}
		},
		nav: {
			class: 'nav',
			tabs: {
				class: 'nav-tabs',
				activeClass: 'active',
				itemClass: 'nav-item',
				itemLinkClass: 'nav-link'
			}
		}
	},
	header: {
		id: '#header',
		class: 'app-header',
		hasScrollClass: 'has-scroll'
	},
	sidebar: {
		id: '#sidebar',
		class: 'app-sidebar',
		scrollBar: {
			localStorage: 'appSidebarScrollPosition',
			dom: ''
		},
		menu: {
			class: 'menu',
			initAttr: 'data-init',
			animationTime: 0,
			itemClass: 'menu-item',
			itemLinkClass: 'menu-link',
			hasSubClass: 'has-sub',
			activeClass: 'active',
			expandingClass: 'expanding',
			expandClass: 'expand',
			submenu: {
				class: 'menu-submenu',
			}
		},
		mobile: {
			toggleAttr: 'data-toggle="app-sidebar-mobile"',
			dismissAttr: 'data-dismiss="app-sidebar-mobile"',
			toggledClass: 'app-sidebar-mobile-toggled',
			closedClass: 'app-sidebar-mobile-closed',
			backdrop: {
				class: 'app-sidebar-mobile-backdrop'
			}
		},
		minify: {
			toggleAttr: 'data-toggle="app-sidebar-minify"',
			toggledClass: 'app-sidebar-minified',
			cookieName: 'app-sidebar-minified'
		},
		floatSubmenu: {
			id: '#app-sidebar-float-submenu',
			dom: '',
			timeout: '',
			class: 'app-sidebar-float-submenu',
			container: {
				class: 'app-sidebar-float-submenu-container'
			},
			arrow: {
				id: '#app-sidebar-float-submenu-arrow',
				class: 'app-sidebar-float-submenu-arrow'
			},
			line: {
				id: '#app-sidebar-float-submenu-line',
				class: 'app-sidebar-float-submenu-line'
			},
			overflow: {
				class: 'overflow-scroll mh-100vh'
			}
		},
		search: {
			class: 'menu-search',
			toggleAttr: 'data-sidebar-search="true"',
			hideClass: 'd-none',
			foundClass: 'has-text'
		},
		transparent: {
			class: 'app-sidebar-transparent'
		}
	},
	scrollBar: {
		attr: 'data-scrollbar="true"',
		skipMobileAttr: 'data-skip-mobile',
		heightAttr: 'data-height',
		wheelPropagationAttr: 'data-wheel-propagation'
	},
	content: {
		id: '#content',
		class: 'app-content',
		fullHeight: {
			class: 'app-content-full-height'
		},
		fullWidth: {
			class: 'app-content-full-width'
		}
	},
	layout: {
		sidebarLight: {
			class: 'app-with-light-sidebar'
		},
		sidebarEnd: {
			class: 'app-with-end-sidebar'
		},
		sidebarWide: {
			class: 'app-with-wide-sidebar'
		},
		sidebarMinified: {
			class: 'app-sidebar-minified'
		},
		sidebarTwo: {
			class: 'app-with-two-sidebar'
		},
		withoutHeader: {
			class: 'app-without-header'
		},
		withoutSidebar: {
			class: 'app-without-sidebar'
		},
		topMenu: {
			class: 'app-with-top-menu'
		},
		boxedLayout: {
			class: 'boxed-layout'
		}
	},
	scrollToTopBtn: {
		showClass: 'show',
		heightShow: 200,
		toggleAttr: 'data-toggle="scroll-to-top"',
		scrollSpeed: 500
	},
	scrollTo: {
		attr: 'data-toggle="scroll-to"',
		target: 'data-target',
		linkTarget: 'href'
	},
	themePanel: {
		class: 'app-theme-panel',
		toggleAttr: 'data-toggle="theme-panel-expand"',
		cookieName: 'app-theme-panel-expand',
		activeClass: 'active',
		themeListCLass: 'app-theme-list',
		themeListItemCLass: 'app-theme-list-item',
		themeCoverClass: 'app-theme-cover',
		themeCoverItemClass: 'app-theme-cover-item',
		theme: {
			toggleAttr: 'data-toggle="theme-selector"',
			classAttr: 'data-theme-class',
			cookieName: 'app-theme',
			activeClass: 'active'
		},
		themeCover: {
			toggleAttr: 'data-toggle="theme-cover-selector"',
			classAttr: 'data-theme-cover-class',
			cookieName: 'app-theme-cover',
			activeClass: 'active'
		}
	},
	dismissClass: {
		toggleAttr: 'data-dismiss-class',
		targetAttr: 'data-dismiss-target'
	},
	toggleClass: {
		toggleAttr: 'data-toggle-class',
		targetAttr: 'data-toggle-target'
	},
	font: {
		family: (getComputedStyle(document.body).getPropertyValue('--bs-body-font-family')).trim(),
		size: (getComputedStyle(document.body).getPropertyValue('--bs-body-font-size')).trim(),
		weight: (getComputedStyle(document.body).getPropertyValue('--bs-body-font-weight')).trim()
	},
	color: {
		theme: (getComputedStyle(document.body).getPropertyValue('--bs-theme')).trim(),
		blue: (getComputedStyle(document.body).getPropertyValue('--bs-blue')).trim(),
		green: (getComputedStyle(document.body).getPropertyValue('--bs-green')).trim(),
		orange: (getComputedStyle(document.body).getPropertyValue('--bs-orange')).trim(),
		red: (getComputedStyle(document.body).getPropertyValue('--bs-red')).trim(),
		cyan: (getComputedStyle(document.body).getPropertyValue('--bs-cyan')).trim(),
		purple: (getComputedStyle(document.body).getPropertyValue('--bs-purple')).trim(),
		yellow: (getComputedStyle(document.body).getPropertyValue('--bs-yellow')).trim(),
		indigo: (getComputedStyle(document.body).getPropertyValue('--bs-indigo')).trim(),
		pink: (getComputedStyle(document.body).getPropertyValue('--bs-pink')).trim(),
		black: (getComputedStyle(document.body).getPropertyValue('--bs-black')).trim(),
		white: (getComputedStyle(document.body).getPropertyValue('--bs-white')).trim(),
		gray: (getComputedStyle(document.body).getPropertyValue('--bs-gray')).trim(),
		dark: (getComputedStyle(document.body).getPropertyValue('--bs-dark')).trim(),
		gray100: (getComputedStyle(document.body).getPropertyValue('--bs-gray-100')).trim(),
		gray200: (getComputedStyle(document.body).getPropertyValue('--bs-gray-200')).trim(),
		gray300: (getComputedStyle(document.body).getPropertyValue('--bs-gray-300')).trim(),
		gray400: (getComputedStyle(document.body).getPropertyValue('--bs-gray-400')).trim(),
		gray500: (getComputedStyle(document.body).getPropertyValue('--bs-gray-500')).trim(),
		gray600: (getComputedStyle(document.body).getPropertyValue('--bs-gray-600')).trim(),
		gray700: (getComputedStyle(document.body).getPropertyValue('--bs-gray-700')).trim(),
		gray800: (getComputedStyle(document.body).getPropertyValue('--bs-gray-800')).trim(),
		gray900: (getComputedStyle(document.body).getPropertyValue('--bs-gray-900')).trim(),

		themeRgb: (getComputedStyle(document.body).getPropertyValue('--bs-theme-rgb')).trim(),
		blueRgb: (getComputedStyle(document.body).getPropertyValue('--bs-blue-rgb')).trim(),
		greenRgb: (getComputedStyle(document.body).getPropertyValue('--bs-green-rgb')).trim(),
		orangeRgb: (getComputedStyle(document.body).getPropertyValue('--bs-orange-rgb')).trim(),
		redRgb: (getComputedStyle(document.body).getPropertyValue('--bs-red-rgb')).trim(),
		cyanRgb: (getComputedStyle(document.body).getPropertyValue('--bs-cyan-rgb')).trim(),
		purpleRgb: (getComputedStyle(document.body).getPropertyValue('--bs-purple-rgb')).trim(),
		yellowRgb: (getComputedStyle(document.body).getPropertyValue('--bs-yellow-rgb')).trim(),
		indigoRgb: (getComputedStyle(document.body).getPropertyValue('--bs-indigo-rgb')).trim(),
		pinkRgb: (getComputedStyle(document.body).getPropertyValue('--bs-pink-rgb')).trim(),
		blackRgb: (getComputedStyle(document.body).getPropertyValue('--bs-black-rgb')).trim(),
		whiteRgb: (getComputedStyle(document.body).getPropertyValue('--bs-white-rgb')).trim(),
		grayRgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-rgb')).trim(),
		darkRgb: (getComputedStyle(document.body).getPropertyValue('--bs-dark-rgb')).trim(),
		gray100Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-100-rgb')).trim(),
		gray200Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-200-rgb')).trim(),
		gray300Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-300-rgb')).trim(),
		gray400Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-400-rgb')).trim(),
		gray500Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-500-rgb')).trim(),
		gray600Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-600-rgb')).trim(),
		gray700Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-700-rgb')).trim(),
		gray800Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-800-rgb')).trim(),
		gray900Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-900-rgb')).trim()
	},
	card: {
		expand: {
			status: false,
			toggleAttr: 'data-toggle="card-expand"',
			toggleTitle: 'Expand / Compress',
			class: 'card-expand'
		}
	},
	init: {
		attr: 'data-init',
		class: 'app-init'
	}
};



/* Handle Scrollbar */
var handleScrollbar = function() {
	"use strict";
	var elms = document.querySelectorAll('['+ app.scrollBar.attr +']');

	for (var i = 0; i < elms.length; i++) {
		generateScrollbar(elms[i])
	}
};
var generateScrollbar = function(elm) {
  "use strict";

	if (elm.scrollbarInit || (app.isMobile && elm.getAttribute(app.scrollBar.skipMobileAttr))) {
		return;
	}
	var dataHeight = (!elm.getAttribute(app.scrollBar.heightAttr)) ? elm.offsetHeight : elm.getAttribute(app.scrollBar.heightAttr);

	elm.style.height = dataHeight;
	elm.scrollbarInit = true;

	if(app.isMobile) {
		elm.style.overflowX = 'scroll';
	} else {
		var dataWheelPropagation = (elm.getAttribute(app.scrollBar.wheelPropagationAttr)) ? elm.getAttribute(app.scrollBar.wheelPropagationAttr) : false;

		if (elm.closest('.'+ app.sidebar.class) && elm.closest('.'+ app.sidebar.class).length !== 0) {
			app.sidebar.scrollBar.dom = new PerfectScrollbar(elm, {
				wheelPropagation: dataWheelPropagation
			});
		} else {
			new PerfectScrollbar(elm, {
				wheelPropagation: dataWheelPropagation
			});
		}
	}
	elm.setAttribute(app.init.attr, true);
	elm.classList.remove('invisible');
};



/* Handle Sidebar Menu */
var handleSidebarMenuToggle = function(menus) {
	menus.map(function(menu) {
		menu.onclick = function(e) {
			e.preventDefault();
			var target = this.nextElementSibling;

			menus.map(function(m) {
				var otherTarget = m.nextElementSibling;
				if (otherTarget !== target) {
					otherTarget.style.display = 'none';
					otherTarget.closest('.'+ app.sidebar.menu.itemClass).classList.remove(app.sidebar.menu.expandClass);
				}
			});

			var targetItemElm = target.closest('.'+ app.sidebar.menu.itemClass);

			if (targetItemElm.classList.contains(app.sidebar.menu.expandClass) || (targetItemElm.classList.contains(app.sidebar.menu.activeClass) && !target.style.display)) {
				targetItemElm.classList.remove(app.sidebar.menu.expandClass);
				target.style.display = 'none';
			} else {
				targetItemElm.classList.add(app.sidebar.menu.expandClass);
				target.style.display = 'block';
			}
		}
	});
};
var handleSidebarMenu = function() {
	"use strict";

	var menuBaseSelector = '.'+ app.sidebar.class +' .'+ app.sidebar.menu.class +' > .'+ app.sidebar.menu.itemClass +'.'+ app.sidebar.menu.hasSubClass;
	var submenuBaseSelector = ' > .'+ app.sidebar.menu.submenu.class +' > .'+ app.sidebar.menu.itemClass + '.' + app.sidebar.menu.hasSubClass;

	// menu
	var menuLinkSelector =  menuBaseSelector + ' > .'+ app.sidebar.menu.itemLinkClass;
	var menus = [].slice.call(document.querySelectorAll(menuLinkSelector));
	handleSidebarMenuToggle(menus);

	// submenu lvl 1
	var submenuLvl1Selector = menuBaseSelector + submenuBaseSelector;
	var submenusLvl1 = [].slice.call(document.querySelectorAll(submenuLvl1Selector + ' > .' + app.sidebar.menu.itemLinkClass));
	handleSidebarMenuToggle(submenusLvl1);

	// submenu lvl 2
	var submenuLvl2Selector = menuBaseSelector + submenuBaseSelector + submenuBaseSelector;
	var submenusLvl2 = [].slice.call(document.querySelectorAll(submenuLvl2Selector + ' > .' + app.sidebar.menu.itemLinkClass));
	handleSidebarMenuToggle(submenusLvl2);
};

var handleSidebarActiveLink = function() {
	var url = window.location.toString().split('?')[0];
	if(url == window.location.origin+"/admin" || url == window.location.origin+"/admin/") {
                url = window.locatiom.origin+"/admin/index.php";
	} else if(url == window.location.origin || url == window.location.origin+"/") {
		url = window.location.origin+"/index.php";
	}
	$('div.menu-item a').filter(function() {
		return this.href == url;
	}).parent().addClass('active');
}

var handleSidebarAutoCollapse = function() {
	$(document).ready(function(){
		var app = document.getElementById("app");

    	if(localStorage.getItem('collapseSideBar') == '1') {
        	app.classList.add("app-sidebar-collapsed");
        	app.classList.remove("app-sidebar-toggled", true);
    	} else {
        	app.classList.remove("app-sidebar-collapsed", true);
        	app.classList.add("app-sidebar-toggled", true);
    	}

    	$(".mobile-toggler").click(function(){
			app.classList.toggle("app-sidebar-mobile-toggled");
		});

    	$(".desktop-toggler").click(function(){
        	if(localStorage.getItem('collapseSideBar') == '0') {
           		localStorage.setItem('collapseSideBar', '1');
            	app.classList.remove("app-sidebar-toggled", true);
            	app.classList.add("app-sidebar-collapsed");
        	} else {
            	localStorage.setItem('collapseSideBar', '0');
            	app.classList.remove("app-sidebar-collapsed", true);
            	app.classList.add("app-sidebar-toggled", true);
        	}
    	});
	});

}




/* Handle Sidebar Scroll Memory*/
var handleSidebarScrollMemory = function() {
	if (!app.isMobile) {
		try {
			if (typeof(Storage) !== 'undefined' && typeof(localStorage) !== 'undefined') {
				var elm = document.querySelector('.'+ app.sidebar.class +' ['+ app.scrollBar.attr +']');

				if (elm) {
					elm.onscroll = function() {
						localStorage.setItem(app.sidebar.scrollBar.localStorage, this.scrollTop);
					}
					var defaultScroll = localStorage.getItem(app.sidebar.scrollBar.localStorage);
					if (defaultScroll) {
						document.querySelector('.'+ app.sidebar.class +' ['+ app.scrollBar.attr +']').scrollTop = defaultScroll;
					}
				}
			}
		} catch (error) {
			console.log(error);
		}
	}
};



/* Handle Card Action */
var handleCardAction = function() {
	"use strict";

	if (app.card.expand.status) {
		return false;
	}
	app.card.expand.status = true;

	// expand
	var expandTogglerList = [].slice.call(document.querySelectorAll('['+ app.card.expand.toggleAttr +']'));
	var expandTogglerTooltipList = expandTogglerList.map(function (expandTogglerEl) {
		expandTogglerEl.onclick = function(e) {
			e.preventDefault();

			var target = this.closest('.card');
			var targetClass = app.card.expand.class;
			var targetTop = 40;

			if (document.body.classList.contains(targetClass) && target.classList.contains(targetClass)) {
				target.removeAttribute('style');
				target.classList.remove(targetClass);
				document.body.classList.remove(targetClass);
			} else {
				document.body.classList.add(targetClass);
				target.classList.add(targetClass);
			}

			window.dispatchEvent(new Event('resize'));
		};

		return new bootstrap.Tooltip(expandTogglerEl, {
			title: app.card.expand.toggleTitle,
			placement: 'bottom',
			trigger: 'hover',
			container: 'body'
		});
	});
};




/* Handle Tooltip & Popover Activation */
var handleTooltipPopoverActivation = function() {
	"use strict";

	var tooltipTriggerList = [].slice.call(document.querySelectorAll('['+ app.bootstrap.tooltip.attr +']'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl);
	});

	var popoverTriggerList = [].slice.call(document.querySelectorAll('['+ app.bootstrap.popover.attr +']'))
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl);
	});
};




/* Handle Scroll to Top Button */

var handleScrollToTopButton = function() {
	"use strict";

	var elmTriggerList = [].slice.call(document.querySelectorAll('['+ app.scrollToTopBtn.toggleAttr +']'));

	document.onscroll = function() {
		var doc = document.documentElement;
		var totalScroll = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);
		var elmList = elmTriggerList.map(function(elm) {
			if (totalScroll >= app.scrollToTopBtn.heightShow) {
				if (!elm.classList.contains(app.scrollToTopBtn.showClass)) {
					elm.classList.add(app.scrollToTopBtn.showClass);
				}
			} else {
				elm.classList.remove(app.scrollToTopBtn.showClass);
			}
		});

		var elm = document.querySelectorAll(app.id)[0];

		if (totalScroll > 0) {
			elm.classList.add(app.header.hasScrollClass);
		} else {
			elm.classList.remove(app.header.hasScrollClass);
		}
	}

	var elmList = elmTriggerList.map(function(elm) {
		elm.onclick = function(e) {
			e.preventDefault();

			window.scrollTo({top: 0, behavior: 'smooth'});
		}
	});
};



/* Handle hexToRgba */
var hexToRgba = function(hex, transparent = 1) {
	var c;
	if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
		c= hex.substring(1).split('');
		if(c.length== 3){
				c= [c[0], c[0], c[1], c[1], c[2], c[2]];
		}
		c= '0x'+c.join('');
		return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+','+ transparent +')';
	}
  throw new Error('Bad Hex');
};



/* Handle Scroll To */
var handleScrollTo = function() {
	var elmTriggerList = [].slice.call(document.querySelectorAll('['+ app.scrollTo.attr +']'));
	var elmList = elmTriggerList.map(function(elm) {
		elm.onclick = function(e) {
			e.preventDefault();

			var targetAttr = (elm.getAttribute(app.scrollTo.target)) ? this.getAttribute(app.scrollTo.target) : this.getAttribute(app.scrollTo.linkTarget);
			var targetElm = document.querySelectorAll(targetAttr)[0];
			var targetHeader = document.querySelectorAll(app.header.id)[0];
			var targetHeight = targetHeader.offsetHeight;
			if (targetElm) {
				var targetTop = targetElm.offsetTop - targetHeight - 24;
				window.scrollTo({top: targetTop, behavior: 'smooth'});
			}
		}
	});
};

/* FullScreen */
var handleFullScreen = function() {
	$(document).ready(function(){
		var app = document.documentElement;
		var icon = document.getElementById("fullscreen-toggler-icon");

    	$(".fullscreen-toggler").click(function(){
    		if (!document.fullscreenElement) {
				app.requestFullscreen().catch((err) => {
					console.log("[J.O.H.N.] Error attempting to enable fullscreen mode");
				});
				icon.setAttribute("class", "fa-solid fa-compress nav-icon");
			} else {
    			document.exitFullscreen();
				icon.setAttribute("class", "fa-solid fa-expand nav-icon");
  			}
    	});
	});
}

/* handle Internet connection */
var handleInternetConnection = function() {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 2500,
		timerProgressBar: true,
		icon: 'error',
	})
	
	var lastCheck = true;

	$.ajax({
		url: window.location.href,
        	type: "HEAD",
        	timeout: 2500,
		success: function() {
			if(lastCheck == false) {
				location.reload();
			}
			lastCheck = true;
		},
		error: function() {
        		console.log("[J.O.H.N.] Lost connection to server!");
            		Toast.fire({
				title: "Lost connection to server!"
			})
			lastCheck = false;
        	}
 	});

	setTimeout(handleInternetConnection, 5000);
}

/* handle Page errors */
var handlePageErrors = function() {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 2500,
		timerProgressBar: true,
	})
	var pageErrors = 0;

    	window.onerror = function() {
        	pageErrors++;

        	if(pageErrors < 0) {
            		location.reload();
        	}

        	if(pageErrors == 1) {
            		Toast.fire({
				title: "A problem has been detected!",
				icon: 'info',
			})
        	}
        
        	if(pageErrors == 2) {
            		Toast.fire({
				title: "Some problems has been detected!",
				icon: 'warning',
			})
        	}

        	if(pageErrors == 3) {
            		Toast.fire({
				title: "The WebApp seems to be unstable!",
				icon: 'warning',
			})
        	}

        	if(pageErrors == 4) {
            		Toast.fire({
				title: "The WebApp detected critical errors!",
				icon: 'error',
			})
        	}

        	if(pageErrors >= 5) {
            		location.reload();
        	}
    	};
}

/* handle stuck pace */
var handleStuckPace = function() {
        var counter = 0;
        var refreshIntervalId = setInterval(function () {
                var progress;
                if (typeof document.querySelector('.pace-progress').getAttribute('data-progress-text') !== 'undefined') {
                        progress = Number(document.querySelector('.pace-progress').getAttribute('data-progress-text').replace("%", ''));
                }
                if (progress === 99) {
                        counter++;
                }
                if (counter > 50) {
                        clearInterval(refreshIntervalId);
                        Pace.stop();
                }
       }, 100);
}


/* Application Controller */
var App = function () {
	"use strict";

	return {
		//main function
		init: function () {
			this.initComponent();
			this.initSidebar();
			this.initAppLoad();
		},
		initAppLoad: function() {
			document.querySelector('body').classList.add(app.init.class);
		},
		initSidebar: function() {
			handleSidebarMenu();
			handleSidebarScrollMemory();
			handleSidebarActiveLink();
			handleSidebarAutoCollapse();
		},
		initComponent: function() {
			handleScrollbar();
			handleScrollToTopButton();
			handleScrollTo();
			handleCardAction();
			handleTooltipPopoverActivation();
			handleFullScreen();
			handleInternetConnection();
			handlePageErrors();
			handleStuckPace();
		},
		scrollTop: function() {
			window.scrollTo({top: 0, behavior: 'smooth'});
		}
	};
}();




/* Initialise */
document.addEventListener('DOMContentLoaded', function() {
	App.init();
});
