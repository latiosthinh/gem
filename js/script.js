document.addEventListener( 'DOMContentLoaded', function() {
	// const $ = jQuery;

	const header = document.getElementById( 'masthead' );
	const progressBar = document.getElementById( 'progress-bar' );

	document.addEventListener( 'scroll', function() {
		let offsetTop = -document.body.getBoundingClientRect().top;

		offsetTop > 100 ? header.classList.add( 'fixed' ) : header.classList.remove( 'fixed' );

		const scrollTop = document.documentElement["scrollTop"] || document.body["scrollTop"];
		const scrollBottom = (document.documentElement["scrollHeight"] || document.body["scrollHeight"]) - document.documentElement.clientHeight;
		const scrollPercent = scrollTop / scrollBottom * 100 + '%';

		progressBar.style.setProperty( '--scroll', scrollPercent );
	} );

} );