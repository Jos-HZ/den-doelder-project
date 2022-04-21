// const tabs = document.querySelector('container.tabs');
// const pages = document.querySelector('container.horizontal.flexContainer');
// function scrollX(tab, absolute, param, event) {
//     const tabs = document.querySelector('container.tabs');
//     const viewportWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
//     const element = document.querySelector('container.horizontal.flexContainer');
//     const options = {
//         top: 0,
//         left: param * viewportWidth,
//         behavior: 'smooth'
//     };
//     console.log(999);
//     element.scrollTo(options);
//     // new Array().slice.call(tabs).forEach((element, index, array) => { (new Array().slice.call(element.classList).includes('current') || index === param ? element.classList.toggle('current') : '') }); // één regel woohoo
//     new Array().slice.call(tabs).forEach((element, index, array) => {
//         if ((new Array().slice.call(element.classList).includes('current')) || (index === param)) {
//             element.classList.toggle('current');
//         }
//     });
//     new Array().slice.call(tabs).forEach((element, index, array) => {
//         console.log(element.classList);
//     });
// }

function xOnClick(currentTab) {
    const viewportWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
    const element = document.querySelector('container.horizontal.flexContainer');
    const options = {
        top: 0,
        left: currentTab * viewportWidth,
        behavior: 'smooth'
    }
    element.scrollTo(options);
    changeClass(currentTab);
}

function xOnScroll() {
    const tabs = document.querySelector('container.tabs');
    const element = document.querySelector('container.horizontal.flexContainer');
    // console.log('\n\n');
    // console.log(element.scrollLeft);
    // console.log(element.scrollWidth);
    // console.log(element.clientWidth);
    // console.log(element.scrollLeft / element.clientWidth);
    const currentPage = Math.round(element.scrollLeft / element.clientWidth);
    console.log(currentPage);
    // tabs[currentPage].click();
    // xOnClick(currentPage);
    changeClass(currentPage);
}

function changeClass(current) {
    const tabs = new Array().slice.call(document.querySelector('container.tabs').children);
    const element = document.querySelector('container.horizontal.flexContainer');
    console.log('\n\n\n');
    console.log(current);
    tabs.forEach((element, index, array) => {
        if (tabs.includes('current') || index === current) {
            element.classList.add('current');
        } else {
            element.classList.remove('current');
        }
    });
    // tabs.forEach((element, index, array) => {
    //     (tabs.includes('current') || index === current ? element.classList.toggle('current') : '')
    // });
    tabs.slice.call(tabs).forEach((element, index, array) => {
        console.log(element.classList);
    });
}

window.addEventListener('load', function() {
    scrollStop(xOnScroll, 66);
    // document.querySelector('container.horizontal.flexContainer').addEventListener('scroll', changeClass)
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
