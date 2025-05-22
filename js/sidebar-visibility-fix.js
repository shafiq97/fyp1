// Forced sidebar visibility fix
document.addEventListener('DOMContentLoaded', function() {
    console.log("Sidebar visibility fix loaded");
    
    // Get sidebar and toggle elements
    const sidebar = document.querySelector('.side-bar');
    const menuBtn = document.getElementById('menu-btn');
    const closeBtn = document.querySelector('.close-side-bar');
    const body = document.body;
    
    console.log("Elements found:", {
        sidebar: !!sidebar,
        menuBtn: !!menuBtn,
        closeBtn: !!closeBtn
    });
    
    // Enhanced toggle function with forced visibility
    function toggleSidebar(e) {
        if (e) e.preventDefault();
        
        console.log("Toggle sidebar function called");
        
        if (sidebar) {
            // Force sidebar to be visible when active
            if (!sidebar.classList.contains('active')) {
                sidebar.classList.add('active');
                body.classList.add('active');
                
                // Force sidebar to be visible with inline styles
                sidebar.style.left = "0";
                sidebar.style.display = "block";
                sidebar.style.visibility = "visible";
                sidebar.style.opacity = "1";
                sidebar.style.zIndex = "2000";
                
                console.log("Sidebar activated with forced styles");
            } else {
                sidebar.classList.remove('active');
                body.classList.remove('active');
                
                // Move sidebar off-screen but keep other properties
                sidebar.style.left = "-300px";
                
                console.log("Sidebar deactivated");
            }
        }
    }
    
    // Attach click event to menu button with forced handling
    if (menuBtn) {
        // Remove any existing listeners
        const newMenuBtn = menuBtn.cloneNode(true);
        menuBtn.parentNode.replaceChild(newMenuBtn, menuBtn);
        
        // Add our reliable event listener
        newMenuBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log("Menu button clicked");
            toggleSidebar();
            return false;
        }, true);
    }
    
    // Ensure close button works
    if (closeBtn) {
        // Remove any existing listeners
        const newCloseBtn = closeBtn.cloneNode(true);
        closeBtn.parentNode.replaceChild(newCloseBtn, closeBtn);
        
        // Add our reliable event listener
        newCloseBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log("Close button clicked");
            toggleSidebar();
            return false;
        }, true);
    }
    
    // Initial check - if sidebar should be visible, force it
    if (sidebar && sidebar.classList.contains('active')) {
        console.log("Sidebar already active, forcing visibility");
        sidebar.style.left = "0";
        sidebar.style.display = "block";
        sidebar.style.visibility = "visible";
        sidebar.style.opacity = "1";
        sidebar.style.zIndex = "2000";
    }
});