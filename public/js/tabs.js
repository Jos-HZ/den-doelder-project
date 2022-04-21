function scrollX(tab, absolute, param, event) {
    const viewportWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
    const element = document.querySelector('container.horizontal.flexContainer');
    const options = {
        top: 0,
        left: param * viewportWidth,
        behavior: 'smooth'
    };
    console.log(999);
    element.scrollTo(options);
    new Array().slice.call(tab.parentNode.children).forEach((element, index, array) => { (new Array().slice.call(element.classList).includes('current') || index === param ? element.classList.toggle('current') : '') }); // één regel woohoo
    // new Array().slice.call(tab.parentNode.children).forEach((element, index, array) => {
    //     if ((new Array().slice.call(element.classList).includes('current')) || (index === param)) {
    //         element.classList.toggle('current');
    //     }
    // });
    // new Array().slice.call(tab.parentNode.children).forEach((element, index, array) => {
    //     console.log(element.classList);
    // });
}
