var mapWrapper = document.getElementById(map).parentNode;
var catNav = document.createElement('nav');
catNav.id = 'map-nav';
mapWrapper.insertBefore(catNav, document.getElementById(map));
var catNavUl = document.createElement('ul');
catNav.appendChild(catNavUl);