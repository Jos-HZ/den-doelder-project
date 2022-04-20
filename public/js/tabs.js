function openTab(evt, tabName) {
    const x = document.getElementsByClassName("content-tab");
    for (let i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    const tablinks = document.getElementsByClassName("tab");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" is-active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " is-active";
}

function XcrollBy(param) {
    const viewportWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
    document.querySelector('container.horizontal.flexContainer').scrollBy({
        top: 0,
        left: param * viewportWidth,
        behavior: 'smooth'
    });
}   

function XcrollTo(param) {
    const viewportWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
    document.querySelector('container.horizontal.flexContainer').scrollTo({
        top: 0,
        left: param * viewportWidth,
        behavior: 'smooth'
    });
}
