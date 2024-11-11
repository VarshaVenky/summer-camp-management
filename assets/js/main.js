// main.js

// DOMContentLoaded Event - Ensure that the script runs only after the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript loaded and ready to run!");

    // Example: Toggle Navigation Menu (if you have a mobile nav menu)
    const menuToggle = document.querySelector(".menu-toggle");
    const navMenu = document.querySelector(".nav-menu");

    if (menuToggle && navMenu) {
        menuToggle.addEventListener("click", () => {
            navMenu.classList.toggle("active");
        });
    }

    // Example: Simple Form Validation
    const enrollmentForm = document.querySelector("#enrollmentForm");

    if (enrollmentForm) {
        enrollmentForm.addEventListener("submit", function (event) {
            const name = document.querySelector("#name").value.trim();
            const age = document.querySelector("#age").value.trim();
            const email = document.querySelector("#email").value.trim();

            // Basic Validation: Check if fields are filled
            if (name === "" || age === "" || email === "") {
                alert("Please fill out all fields.");
                event.preventDefault(); // Prevent form from submitting
                return;
            }

            // Validate Age (e.g., age should be a positive number)
            if (isNaN(age) || age <= 0) {
                alert("Please enter a valid age.");
                event.preventDefault();
                return;
            }

            // Validate Email
            if (!validateEmail(email)) {
                alert("Please enter a valid email address.");
                event.preventDefault();
                return;
            }

            alert("Form submitted successfully!");
        });
    }
});

// Email Validation Function
function validateEmail(email) {
    const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return re.test(String(email).toLowerCase());
}

// Example: Alert Message Dismissal
const alertMessage = document.querySelector(".alert");

if (alertMessage) {
    setTimeout(() => {
        alertMessage.style.display = "none";
    }, 3000); // Hide after 3 seconds
}
