// custom-carousel.js
$(document).ready(function () {
    $("#new-cars-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000, // Atur interval autoplay (dalam milidetik)
        smartSpeed: 1000, // Atur kecepatan transisi (dalam milidetik)
        animateOut: 'fadeOut', // Gunakan 'fadeOut' untuk efek fade-out
    });
});
