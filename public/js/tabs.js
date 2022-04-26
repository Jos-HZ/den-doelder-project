function changeClass(current) {
    const tabs = new Array().slice.call(document.querySelector('container.tabs').children);
    const element = document.querySelector('container.horizontal.flexContainer');
    tabs.forEach((element, index, array) => {
        (tabs.includes('current') || index === current ? element.classList.add('current') : element.classList.remove('current'))
    });
    return tabs[current].dataset.cape;
}

function xOnClick(tabIndex) {
    xScrollTo(tabIndex);
}

function changeUrl(cape) {
    history.replaceState({}, '', `?cape=${cape}`);
}

function xScrollTo(tabIndex, behavior = 'smooth') {
    const viewportWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
    const element = document.querySelector('container.horizontal.flexContainer');
    const options = {
        top: 0,
        left: tabIndex * viewportWidth,
        behavior: behavior
    }
    element.scrollTo(options);
}

function xOnScroll() {
    const tabs = document.querySelector('container.tabs');
    const element = document.querySelector('container.horizontal.flexContainer');
    const currentPage = Math.round(element.scrollLeft / element.clientWidth);
    changeUrl(changeClass(currentPage));
    console.log(999);
}

window.addEventListener('load', function() {
    // console.log((new URL(document.location)).searchParams.get('cape'))
    if ((new URL(document.location)).searchParams.get('cape') !== null) {
        const cape = (new URL(document.location)).searchParams.get('cape');
        const element = document.querySelector(`[data-cape="${cape}"]`);
        const array = new Array().slice.call(element.parentElement.children)
        scrollStop(xOnScroll, 66);
        xScrollTo(array.indexOf(element), 'instant');
    }
});
/*!
 * Run a callback function after scrolling has stopped
 * (c) 2017 Chris Ferdinandi, MIT License, https://gomakethings.com
 * @param  {Function} callback The callback function to run after scrolling
 * @param  {Integer}  refresh  How long to wait between scroll events [optional]
 */
function scrollStop (callback, refresh = 66) {

	// Make sure a valid callback was provided
	if (!callback || typeof callback !== 'function') return;

	// Setup scrolling variable
	let isScrolling;

	// Listen for scroll events
    document.querySelector('container.horizontal.flexContainer').addEventListener('scroll', function (event) {

		// Clear our timeout throughout the scroll
		window.clearTimeout(isScrolling);

		// Set a timeout to run after scrolling ends
		isScrolling = setTimeout(callback, refresh);

	}, false);

}
