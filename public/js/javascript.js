window.addEventListener('DOMContentLoaded', function () {
    textareaAutoGrow();
})
window.addEventListener('load', function () {
    //
})

function textareaOnInput(textarea) {
    textarea.parentNode.dataset.replicatedValue = textarea.value;
}

function textareaAutoGrow() {
    let dis = document.querySelectorAll('div.grow-wrap > textarea').forEach((element, index, array) => {
        element.parentNode.dataset.replicatedValue = element.value;
    });
}

