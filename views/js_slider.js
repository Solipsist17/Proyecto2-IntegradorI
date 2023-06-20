

var images = document.getElementsByClassName('slider-image');
var currentIndex = 0;
var interval;

function startSlider() {
    interval = setInterval(showNextImage, 3000);
}

function showNextImage() {
    images[currentIndex].style.display = 'none';
    currentIndex = (currentIndex + 1) % images.length;
    images[currentIndex].style.display = 'block';
}

startSlider();
