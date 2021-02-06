document.addEventListener( 'DOMContentLoaded', function() {
	// const $ = jQuery;

	const header = document.getElementById( 'masthead' );
	const progressBar = document.getElementById( 'progress-bar' );

	const headerHeight = header.offsetHeight + 'px';
	const postContent = document.querySelector( '.single-content' );
	if ( postContent ) {
		postContent.style.marginTop = headerHeight;
		header.classList.add( 'sticky' );
	}

	const searchControl = document.getElementById( 'search-control' );
	const searchClose   = document.getElementById( 'btn-search-close' );
	const searchWraper  = document.querySelector( '.header-search__wrapper' );

	searchControl.addEventListener( 'click', () => {
		searchWraper.classList.add( 'search--open' );
	} )

	searchClose.addEventListener( 'click', () => {
		searchWraper.classList.remove( 'search--open' );
	} )


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

	const gemSliderInit = () => {
		if ( slides.length === 0 ) {
			return;
		}

		const prevArrow = document.querySelector( '.prev' )
		const nextArrow = document.querySelector( '.next' )
		const dots      = document.querySelector( '.gem-dots' )
		const dot       = dots.querySelectorAll( '.dot' );

		for ( let i = 0; i < slides.length; i++ ) {
			slides[ i ].style.display = "none";
		}

		showSlides( 1 );

		prevArrow.addEventListener( 'click', () => {
			showSlides( --slideIndex );
		} )

		nextArrow.addEventListener( 'click', () => {
			showSlides( ++slideIndex );
		} )

		dots.addEventListener( 'click', e => {
			console.log(e.target);
			showSlides( 2 );
		} )

		const autoPlayTime = 3000;
		setInterval(() => {
			showSlides( ++slideIndex );
		}, autoPlayTime);
	}

	const navControl = document.getElementById( 'nav-control' );
	const mainMenu   = document.querySelector( '.main-menu' );
	const menuItems    = document.querySelectorAll( '.menu-parent__item' );
	const menuChildren = document.querySelectorAll( '.menu-children' );

	navControl.addEventListener( 'click', () => {
		navControl.classList.contains( 'active' ) ? navControl.classList.remove( 'active' ) : navControl.classList.add( 'active' )
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
	});

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

	/** Init */
	gemSliderInit();

	document.addEventListener( 'scroll', function() {
		let offsetTop = -document.body.getBoundingClientRect().top;

		offsetTop > 100 ? header.classList.add( 'fixed' ) : header.classList.remove( 'fixed' );

		const scrollTop = document.documentElement["scrollTop"] || document.body["scrollTop"];
		const scrollBottom = (document.documentElement["scrollHeight"] || document.body["scrollHeight"]) - document.documentElement.clientHeight;
		const scrollPercent = scrollTop / scrollBottom * 100 + '%';

		progressBar.style.setProperty( '--scroll', scrollPercent );
	} );

} );