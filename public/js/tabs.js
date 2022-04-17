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
