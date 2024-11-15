let imageList = document.getElementById('imageList');
let imageDisplay = document.querySelector('img');
let backButton = document.getElementById('backButton');
let slideshowButton = document.getElementById('slideshowButton');
let nextButton = document.getElementById('nextButton');
let slideshowInterval;

function updateImage() {
    imageDisplay.src = 'images/' + imageList.value;
}

function nextImage() {
    imageList.selectedIndex = (imageList.selectedIndex + 1) % imageList.options.length;
    updateImage();
}

function previousImage() {
    imageList.selectedIndex = (imageList.selectedIndex - 1 + imageList.options.length) % imageList.options.length;
    updateImage();
}

function startSlideshow() {
    slideshowButton.textContent = 'Stop slideshow';
    backButton.disabled = true;
    nextButton.disabled = true;
    slideshowInterval = setInterval(nextImage, 1000);
}

function stopSlideshow() {
    slideshowButton.textContent = 'Start slideshow';
    backButton.disabled = false;
    nextButton.disabled = false;
    clearInterval(slideshowInterval);
}

backButton.addEventListener('click', previousImage);
nextButton.addEventListener('click', nextImage);
slideshowButton.addEventListener('click', function() {
    if (slideshowButton.textContent === 'Start slideshow') {
        startSlideshow();
    } else {
        stopSlideshow();
    }
});

updateImage();

function updateImage() {
    imageDisplay.src = 'images/' + imageList.value;
}

function nextImage() {
    imageList.selectedIndex = (imageList.selectedIndex + 1) % imageList.options.length;
    updateImage();
}

function previousImage() {
    imageList.selectedIndex = (imageList.selectedIndex - 1 + imageList.options.length) % imageList.options.length;
    updateImage();
}

function startSlideshow() {
    slideshowButton.textContent = 'Stop slideshow';
    backButton.disabled = true;
    nextButton.disabled = true;
    slideshowInterval = setInterval(nextImage, 1000);
}

function stopSlideshow() {
    slideshowButton.textContent = 'Start slideshow';
    backButton.disabled = false;
    nextButton.disabled = false;
    clearInterval(slideshowInterval);
}

backButton.addEventListener('click', previousImage);
nextButton.addEventListener('click', nextImage);
slideshowButton.addEventListener('click', function() {
    if (slideshowButton.textContent === 'Start slideshow') {
        startSlideshow();
    } else {
        stopSlideshow();
    }
});

updateImage();