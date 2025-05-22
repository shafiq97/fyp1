// Mobile navigation and sidebar fix
document.addEventListener('DOMContentLoaded', function() {
    // CRITICAL FIX: Check for and remove duplicate sidebars
    const sidebars = document.querySelectorAll('.side-bar');
    if (sidebars.length > 1) {
        console.log("Duplicate sidebars detected! Removing extras...");
        // Keep only the first sidebar
        for (let i = 1; i < sidebars.length; i++) {
            sidebars[i].remove();
        }
    }
    
    // Force navbar collapse to be visible on mobile
    const navbarCollapse = document.getElementById('navbarNav');
    if (navbarCollapse) {
        // Remove collapse class to prevent Bootstrap from hiding it
        navbarCollapse.classList.remove('collapse');
        navbarCollapse.classList.add('show');
    }
    
    // Ensure the menu button properly toggles the sidebar
    const menuBtn = document.getElementById('menu-btn');
    const sidebar = document.querySelector('.side-bar');
    const body = document.querySelector('body');
    
    if (menuBtn && sidebar) {
        menuBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            console.log("Menu button clicked!");
            sidebar.classList.toggle('active');
            body.classList.toggle('active');
            
            // Log the state for debugging
            console.log("Sidebar active:", sidebar.classList.contains('active'));
            console.log("Body active:", body.classList.contains('active'));
            
            return false;
        });
    }
    
    // Ensure close button works
    const closeBtn = document.querySelector('.close-side-bar');
    if (closeBtn && sidebar) {
        closeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log("Close button clicked!");
            
            sidebar.classList.remove('active');
            body.classList.remove('active');
            
            return false;
        });
    }
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(e) {
        if (window.innerWidth <= 991 && 
            sidebar && 
            sidebar.classList.contains('active') && 
            !sidebar.contains(e.target) && 
            e.target !== menuBtn) {
            
            console.log("Clicked outside sidebar, closing...");
            sidebar.classList.remove('active');
            body.classList.remove('active');
        }
    });
});