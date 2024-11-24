// Toggle the navbar menu when the hamburger icon is clicked
let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');  // Toggle the icon to show the "close" icon
    navbar.classList.toggle('active');  // Show/hide the navbar
};

// Close the menu when the page is scrolled
window.onscroll = () => {
    menu.classList.remove('fa-times');  // Remove the "close" icon
    navbar.classList.remove('active');  // Hide the navbar
};

// Change the main home image when a smaller image is clicked in the image slider
document.querySelectorAll('.image-slider img').forEach(image => {
    image.onclick = () => {
        var src = image.getAttribute('src');  // Get the src of the clicked image
        document.querySelector('.main-home-image').src = src;  // Set it as the main image
    };
});

// Initialize the Swiper.js slider for the review section
var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    pagination: {
        el: ".swiper-pagination",  // Pagination controls for the slider
        clickable: true,
    },
    loop: true,  // Infinite loop for the reviews
    grabCursor: true,  // Allow users to grab the slider
    autoplay: {
        delay: 7500,  // Delay between slides in milliseconds
        disableOnInteraction: false,  // Keep autoplaying even after user interaction
    },
    breakpoints: {
        0: {
            slidesPerView: 1  // 1 slide on small screens
        },
        768: {
            slidesPerView: 2  // 2 slides on larger screens
        }
    },
});

// Check if password and confirm password match
function checkPasswords() {
    // Get the password and confirm password values
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;
    
    // Check if the passwords match
    if (password !== confirmPassword) {
        // Show the error message
        document.getElementById('error-message').style.display = 'block';
        return false; // Prevent form submission
    } else {
        // Hide the error message if passwords match
        document.getElementById('error-message').style.display = 'none';
        return true; // Allow form submission
    }
}

// Toggle visibility of password and confirm password fields
function togglePassword() {
    var password = document.getElementById("password");
    var confirmPassword = document.getElementById("confirm_password");

    if (document.getElementById("show_password").checked) {
        // Show password
        password.type = "text";
        confirmPassword.type = "text";
    } else {
        // Hide password
        password.type = "password";
        confirmPassword.type = "password";
    }
}
