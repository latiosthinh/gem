document.addEventListener( 'DOMContentLoaded', function() {
	// const $ = jQuery;

	const header = document.getElementById( 'masthead' );
	const progressBar = document.getElementById( 'progress-bar' );

	const headerHeight    = header.offsetHeight + 'px';
	const postContent     = document.querySelector( '.single-content' );
	const caseStudyBanner = document.querySelector( '.case-study-banner' );
	const blog            = document.querySelector( '.page-template-blog' );
	const blogPost        = document.querySelector( '.blog-posts' );

	const stickeyHeader = () => {
		postContent ? postContent.style.marginTop = headerHeight : null;
		header.classList.add( 'sticky' );
	}

	if ( postContent || blogPost ) {
		if ( !caseStudyBanner && !blog ) {
			stickeyHeader();
		}
	}

	// if ( window.innerWidth < 992 ) {
		// header.classList.add( 'sticky' );
	// }

	const searchControl = document.getElementById( 'search-control' );
	const searchClose   = document.getElementById( 'btn-search-close' );
	const searchWraper  = document.querySelector( '.header-search__wrapper' );

	searchControl.addEventListener( 'click', () => {
		searchWraper.classList.add( 'search--open' );
	} )

	searchClose.addEventListener( 'click', () => {
		searchWraper.classList.remove( 'search--open' );
	} )

	document.addEventListener( 'keydown', e => {
		if (e.keyCode == 27) {
			searchWraper.classList.remove( 'search--open' );
		}
	})

	/** Carousel */
	let slideIndex = 1;
	const slides = document.querySelectorAll( '.gem-item' );

	const showSlides = ( n ) => {
		slideIndex = n > slides.length ? 1 : ( n < 1 ? slides.length : slideIndex );

		for ( let i = 0; i < slides.length; i++ ) {
			slides[ i ].style.display = "none";  
		}

		const dots = document.querySelectorAll( '.dot' );
		for ( let i = 0; i < dots.length; i++ ) {
			dots[i].className = dots[i].className.replace(" active", "");
		}

		slides[ slideIndex - 1 ].style.display = "flex";

		if ( dots.length !== 0 ) {
			dots[ slideIndex - 1 ].className += " active";
		}
	}

	const insdustrySliderWrapper = document.querySelector( '.industry-offer' );
	const gemPathSliderWrapper   = document.querySelector( '.gem-path' );
	const gemTestimonial         = document.querySelector( '.home-testimonial' );

	if ( gemTestimonial ) {
		new Splide( '.splide', {
			pagination: true,
			arrows: true,
			arrowPath: 'M18.4687 1.90735e-05C18.6648 1.90735e-05 18.8609 0.0750809 19.0102 0.224445C19.3097 0.523933 19.3097 1.00802 19.0102 1.30751L2.70148 17.617L19.0102 33.9266C19.3097 34.2261 19.3097 34.7101 19.0102 35.0096C18.7115 35.3091 18.2267 35.3091 17.9272 35.0096L1.07689 18.1586C0.777395 17.8591 0.777395 17.375 1.07689 17.0755L17.9272 0.224445C18.0773 0.0750809 18.2726 1.90735e-05 18.4687 1.90735e-05Z'
		} ).mount();
	}

	if ( gemPathSliderWrapper ) {
		let options = {
			perPage: 4,
			gap: '20px',
			arrows: false,
			pagination: false
		};

		if ( window.innerWidth < 992 ) {
			options = {
				perPage: 2,
				gap: '20px',
				padding: {
					left : 0,
					right: '3.5rem',
				},
				arrows: false,
			}
		}
		new Splide( '.splide', options ).mount();
	}

	if ( insdustrySliderWrapper ) {
		let options = {
			perPage: 3,
			gap: '20px',
			arrows: false,
			pagination: false
		};

		if ( window.innerWidth < 992 ) {
			options = {
				gap: '20px',
				padding: {
					left : 0,
					right: '6rem',
				},
				arrows: false,
				type   : 'loop',
				pagination: true,
			}
		}
		new Splide( '.splide', options ).mount();
	}
	// if ( sliders.length !== 0 ) {
	// 	sliders.forEach( e  => {
	// 		new Splide( e ).mount();
	// 	});
	// }

	const navControl   = document.getElementById( 'nav-control' );
	const mainMenu     = document.querySelector( '.main-menu' );
	const back         = document.querySelectorAll( '.back' );
	const menuItems    = document.querySelectorAll( '.menu-parent__item' );
	const menuChildren = document.querySelectorAll( '.menu-children' );

	navControl.addEventListener( 'click', () => {
		navControl.classList.contains( 'active' ) ? navControl.classList.remove( 'active' ) : navControl.classList.add( 'active' )
		header.classList.contains( 'sticky' ) ? header.classList.remove( 'sticky' ) : header.classList.add( 'sticky' )
		mainMenu.classList.contains( 'active' ) ? mainMenu.classList.remove( 'active' ) : mainMenu.classList.add( 'active' )

		menuItems.forEach( e => {
			e.parentElement.classList.remove( 'active' );
		} )

		menuChildren.forEach( e => {
			e.classList.remove( 'active' );
		} )
	} )

	menuItems.forEach( e => {
		e.addEventListener( 'mouseenter', () => {
			menuItems.forEach( e => {
				e.parentElement.classList.remove( 'active' );
			} )

			menuChildren.forEach( e => {
				e.classList.remove( 'active' );
			} )

			e.parentElement.classList.add( 'active' )

			document.getElementById( e.dataset.href ).classList.add( 'active' );
		} )

		e.addEventListener( 'touchstart', ( event ) => {
			event.preventDefault();

			menuItems.forEach( e => {
				e.parentElement.classList.remove( 'active' );
			} )

			menuChildren.forEach( e => {
				e.classList.remove( 'active' );
			} )

			e.parentElement.classList.add( 'active' )

			document.getElementById( e.dataset.href ).classList.add( 'active' );
		} )
	});

	back.forEach( e => {
		e.addEventListener( 'touchstart', () => {
			menuChildren.forEach( e => {
				e.classList.remove( 'active' );
			} )
		} )
	
		e.addEventListener( 'click', () => {
			menuChildren.forEach( e => {
				e.classList.remove( 'active' );
			} )
		} )
	} )

	/** Tabs */
	const tabLinks    = document.querySelectorAll( '.tab-link' );
	const tabContents = document.querySelectorAll( '.tab-content' );

	tabLinks.forEach( e => {
		e.addEventListener( 'click', () => {
			tabLinks.forEach( e => {
				e.classList.remove( 'active' );
			} )
	
			tabContents.forEach( e => {
				e.classList.remove( 'active' );
			} )

			e.classList.add( 'active' )
			document.getElementById( e.dataset.href ).classList.add( 'active' )
		} )
	});

	const guestItems   = document.querySelectorAll( '.guest-item' );
	const guestDetails = document.querySelectorAll( '.guest-detail' );

	guestItems.forEach( (e, index) => {
		e.addEventListener( 'click', () => {
			guestDetails.forEach( (g, i) => {
				if ( i !== index ) {
					g.classList.remove( 'active' )
				}
			} )

			guestDetails[ index ].classList.toggle( 'active' ) 
		} )
	});

	const home = document.querySelector( '.page-template-home' );
	document.addEventListener( 'scroll', function() {
		let offsetTop = -document.body.getBoundingClientRect().top;

		if ( offsetTop > 100 ) {
			header.classList.add( 'fixed' );

			if ( home ) {
				header.classList.add( 'hidden' );
			}
		} else {
			header.classList.remove( 'fixed' );
			header.classList.remove( 'hidden' );
		}

		const scrollTop = document.documentElement["scrollTop"] || document.body["scrollTop"];
		const scrollBottom = (document.documentElement["scrollHeight"] || document.body["scrollHeight"]) - document.documentElement.clientHeight;
		const scrollPercent = scrollTop / scrollBottom * 100 + '%';

		progressBar.style.setProperty( '--scroll', scrollPercent );
	} );

	const filterForm = document.querySelector( '.gem-select' );
	const x = document.getElementsByClassName( "custom-select" );
	const gemSelect = () => {
		var ll, selElmnt, a, b, c;
		const l = x.length;
		for ( let i = 0; i < l; i++ ) {
			selElmnt = x[i].getElementsByTagName( "select" )[0];
			ll = selElmnt.length;
			a = document.createElement( "DIV" );
			a.setAttribute( "class", "select-selected" );
			a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
			x[i].appendChild( a );
			b = document.createElement( "DIV" );
			b.setAttribute( "class", "select-items select-hide" );

			for ( let j = 1; j < ll; j++ ) {
				c = document.createElement( "DIV" );
				c.innerHTML = selElmnt.options[j].innerHTML;
				c.setAttribute( "data-query", selElmnt.options[j].value );
				c.addEventListener( "click", function(e) {
					var y, s, h, sl, yl;
					s = this.parentNode.parentNode.getElementsByTagName( "select" )[ 0 ];
					sl = s.length;
					h = this.parentNode.previousSibling;

					for ( let i = 0; i < sl; i++ ) {
						if ( s.options[i].innerHTML == this.innerHTML ) {
							s.selectedIndex = i;
							h.innerHTML = this.innerHTML;
							y = this.parentNode.getElementsByClassName( "same-as-selected" );
							yl = y.length;
							for ( let k = 0; k < yl; k++ ) {
								y[k].removeAttribute( "class" );
							}
							this.setAttribute( "class", "same-as-selected" );
							break;
						}
					}

					h.click();
					filterForm.submit()
				});
				b.appendChild( c );
			}

			x[ i ].appendChild( b );

			a.addEventListener( "click", function( e ) {
				e.stopPropagation();
				closeAllSelect( this );
				this.nextSibling.classList.toggle( "select-hide" );
				this.classList.toggle( "select-arrow-active" );
			});
		}

		const closeAllSelect = ( elmnt ) => {
			const x = document.getElementsByClassName( "select-items" );
			const y = document.getElementsByClassName( "select-selected" );
			const xl = x.length;
			const yl = y.length;
			let arrNo = [];

			for ( let i = 0; i < yl; i++ ) {
				if (elmnt == y[ i ]) {
					arrNo.push( i )
				} else {
					y[i].classList.remove( "select-arrow-active" );
				}
			}

			for ( let i = 0; i < xl; i++ ) {
				if ( arrNo.indexOf( i ) ) {
					x[ i ].classList.add( "select-hide" );
				}
			}
		}
	}

	if ( x ) {
		gemSelect();
	}

	/** Breadcrumbs handler */
	// const parentNode = [
	// 	{ name: 'Services', slug: 'services' }
	// ]
	// const breadcrumbsItems = document.querySelectorAll( '.breadcrumbs-item a span' );
	// breadcrumbsItems.forEach( e => {
	// 	// console.log(  )
	// 	if ( e.innerText === 'Services' ) {
	// 		// console.log (e.parentElement.parentElement)
	// 	}
	// } )
} );