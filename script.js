// JavaScript source code

window.addEventListener("scroll", function () {
    var header = document.getElementById("head");
    if (window.pageYOffset > 0) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
});








var currentDate = new Date(); // Create a new Date object

var hours = currentDate.getHours(); // Get the current hour (0-23)
var minutes = currentDate.getMinutes(); // Get the current minute (0-59)
var seconds = currentDate.getSeconds(); // Get the current second (0-59)

console.log("Current time: " + hours + ":" + minutes + ":" + seconds);

if (0 <= hours && hours < 12) {
   alert("Hello Good Morning \nWelcome my Photography Portfolio");
}
else if (12 <= hours && hours < 18) {
    alert("Hello Good Afternoon \nWelcome my Photography Portfolio");
}
else {
   alert("Hello Good Evening \nWelcome my Photography Portfolio");
}


//SMOOTH SCROLLER NAVIGATION BAR

document.addEventListener('DOMContentLoaded', function () {
    var navLinks = document.querySelectorAll('nav a');

    navLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            var targetId = link.getAttribute('href').substring(1);
            var targetElement = document.getElementById(targetId);

            targetElement.scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});



//ABOUT TRANSITION
const camera = document.querySelector('.camera img');
const blurb = document.querySelector('.blurb');
const socialIcons = document.querySelectorAll('.social a');

// Add transition on image hover
camera.addEventListener('mouseover', () => {
    camera.style.transform = 'scale(1.1)';
});

camera.addEventListener('mouseout', () => {
    camera.style.transform = 'scale(1)';
});

// Add transition on heading and paragraphs
const blurbElements = [blurb.querySelector('h2'), ...blurb.querySelectorAll('p')];
blurbElements.forEach(element => {
    element.addEventListener('mouseover', () => {
        element.style.color = '#FF0000'; // Change the color to your desired value
    });

    element.addEventListener('mouseout', () => {
        element.style.color = ''; // Reset to the default color
    });
});

// Add transition on social icons
socialIcons.forEach(icon => {
    icon.addEventListener('mouseover', () => {
        icon.style.color = '#ADD8E6'; // Change the color to your desired value
    });

    icon.addEventListener('mouseout', () => {
        icon.style.color = ''; // Reset to the default color
    });
});






//Best SHOTS image change

var slideIndex = 0;
var slides = document.getElementsByClassName('slider')[0].getElementsByTagName('img');

function changeSlide(n) {
    slideIndex += n;

    if (slideIndex < 0) {
        slideIndex = slides.length - 1;
    } else if (slideIndex >= slides.length) {
        slideIndex = 0;
    }

    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }

    slides[slideIndex].style.display = 'block';
}

// Automatically change slide every 3 seconds
setInterval(function () {
    changeSlide(1);
}, 3000);



//Change the content of Sigiriya
function toggleVisibility() {
    var sigiri_p_1 = document.getElementById('sigiri_p_1');
    var sigiri_p_2 = document.getElementById('sigiri_p_2');
    var sigiri_p_3 = document.getElementById('sigiri_p_3');
    var sigiri_p_4 = document.getElementById('sigiri_p_4');

    // Show hidden paragraphs
    sigiri_p_3.style.display = 'block';
    sigiri_p_4.style.display = 'block';

    // Hide visible paragraphs
    sigiri_p_1.style.display = 'none';
    sigiri_p_2.style.display = 'none';

    var button = document.getElementById('btn_sigiri');
    button.style.display = 'none';
}

//Dambulla show hidden pharagraph

document.addEventListener('DOMContentLoaded', function () {
    var showButton = document.getElementById('showButton');
    var hiddenParagraph = document.getElementById('dambulla_hide');

    showButton.addEventListener('click', function () {
        hiddenParagraph.style.display = 'block';

        var button = document.getElementById('showButton');
        button.style.display = 'none';
    });
});

//Sigiri change Image.........................


document.addEventListener('DOMContentLoaded', function () {
    var sliderImages = document.querySelectorAll('.slider_sigiri img');
    var currentImageIndex = 0;

    function changeImage() {
        // Hide all images
        for (var i = 0; i < sliderImages.length; i++) {
            sliderImages[i].style.display = 'none';
        }

        // Show the current image
        sliderImages[currentImageIndex].style.display = 'block';

        // Increment the current image index
        currentImageIndex++;

        // Reset the index if it exceeds the number of images
        if (currentImageIndex >= sliderImages.length) {
            currentImageIndex = 0;
        }
    }

    // Change image every 2 seconds (adjust the interval duration as needed)
    setInterval(changeImage, 2000);
});





//ART GALLERY

document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll(".dream img");

    function fadeInImages(entries, observer) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                const targetImages = entry.target.querySelectorAll("img");
                targetImages.forEach(function (image, index) {
                    setTimeout(function () {
                        image.classList.add("fade-in");
                    }, index * 200);
                });
                observer.unobserve(entry.target);
            }
        });
    }

    const options = {
        root: null,
        rootMargin: "0px",
        threshold: 0.2
    };

    const observer = new IntersectionObserver(fadeInImages, options);
    const dreamSections = document.querySelectorAll(".dream");
    dreamSections.forEach(function (section) {
        observer.observe(section);
    });
});



//ART GALLERY POP UP IMAGE

// JavaScript code for pop-up image functionality
const overlay = document.querySelector('.overlay');
const closeBtn = document.querySelector('.close-btn');
const galleryImages = document.querySelectorAll('.dream img');

galleryImages.forEach(image => {
    image.addEventListener('click', () => {
        const imageUrl = image.getAttribute('src');
        document.getElementById('popup-image').src = imageUrl;
        overlay.classList.add('open');
    });
});

closeBtn.addEventListener('click', () => {
    overlay.classList.remove('open');
});