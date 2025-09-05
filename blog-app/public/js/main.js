/**
 * A safe way to add an event listener to an element.
 * It first checks if the element exists on the page before adding the listener.
 * This prevents "Cannot read properties of null" errors.
 */
function addSafeEventListener(selector, event, handler) {
    const element = document.querySelector(selector);
    if (element) {
        element.addEventListener(event, handler);
    }
}

/**
 * This function runs when the page is loaded.
 * It sets up all the event listeners for the interactive elements.
 */
function initialize() {
    console.log("BlogSpace App Initialized");

    // Example of a safe listener for a logout button (if it exists)
    addSafeEventListener('#logout-btn', 'click', () => {
        // In a real app, this would probably submit a hidden form to log out.
        console.log("Logout button clicked!");
    });

    // Example for a mobile menu toggle (if you add one later)
    addSafeEventListener('.mobile-menu-button', 'click', () => {
        const navMenu = document.querySelector('.nav-menu');
        if (navMenu) {
            navMenu.classList.toggle('active');
        }
    });

    // Add any other listeners for your site here using the addSafeEventListener function.
    // The old code for managing articles, comments, and logins from localStorage
    // has been removed because that is now handled by your Laravel backend.
}

// Run the initialize function once the HTML document is fully loaded.
document.addEventListener('DOMContentLoaded', initialize);