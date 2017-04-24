var activeClass = 'active';
var viewBtns = document.querySelectorAll('.view');
var closeBtns = document.querySelectorAll('.close');

for(var i = 0; i < viewBtns.length; i++) {
    viewBtns[i].addEventListener("click", viewImage);
}

for(var j = 0; j < closeBtns.length; j++) {
    closeBtns[j].addEventListener("click", hideImage);
}

function viewImage() {
    this.parentNode.classList.add(activeClass);
}

function hideImage() {
    this.parentNode.classList.remove(activeClass);
}