// Ensure navbar collapse is always visible on mobile
document.addEventListener('DOMContentLoaded', function() {
    // Force navbar to be visible on mobile
    const navbarCollapse = document.getElementById('navbarNav');
    if (navbarCollapse) {
        navbarCollapse.classList.add('show');
        
        // Remove collapse class to prevent Bootstrap from hiding it
        navbarCollapse.classList.remove('collapse');
        
        // Add it back with a delay so Bootstrap initializes properly
        setTimeout(() => {
            navbarCollapse.classList.add('show');
        }, 500);
    }
    
    // Fix for toggle button - make it toggle sidebar instead of navbar
    const menuBtn = document.getElementById('menu-btn');
    if (menuBtn) {
        // Remove any Bootstrap data attributes that might interfere
        menuBtn.removeAttribute('data-bs-toggle');
        menuBtn.removeAttribute('data-bs-target');
        menuBtn.setAttribute('aria-expanded', 'true');
    }
});