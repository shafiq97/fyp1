// filepath: /Applications/XAMPP/xamppfiles/htdocs/FYP1/script.js
document.addEventListener('DOMContentLoaded', function() {
    // Select sidebar and menu buttons
    var sideBar = document.querySelector('.side-bar');
    var menuBtn = document.querySelector('#menu-btn');
    var closeSideBarBtn = document.querySelector('.close-side-bar'); // Get the close button
    var body = document.querySelector('.dashboard-page');

    // Check if elements exist to avoid errors
    console.log("Menu button found:", menuBtn !== null);
    console.log("Sidebar found:", sideBar !== null);
    console.log("Close button found:", closeSideBarBtn !== null);

    // Function to ensure content spacing is correct
    function adjustContentSpacing() {
        const header = document.querySelector('.header');
        const mainContent = document.querySelectorAll('.content-container, .profile-container');
        const headerHeight = header ? header.offsetHeight : 0;
        
        mainContent.forEach(container => {
            if (container) {
                container.style.paddingTop = (headerHeight + 20) + 'px';
            }
        });
    }
    
    // Sidebar toggle button functionality
    if (menuBtn && sideBar) {
        menuBtn.onclick = function(e) {
            e.preventDefault();
            // On mobile: Toggle the sidebar visibility with active class
            if (window.innerWidth < 992) {
                sideBar.classList.toggle('active');
                if (body) body.classList.toggle('active');
            }
            adjustPageLayout();
        };
    }

    // Close sidebar functionality
    if (closeSideBarBtn && sideBar) {
        closeSideBarBtn.onclick = function() {
            // Always close the sidebar (mainly for mobile)
            sideBar.classList.remove('active');
            if (body) body.classList.remove('active');
            adjustPageLayout();
        };
    }
    
    // Handle window resize
    window.addEventListener('resize', function() {
        adjustContentSpacing();
        adjustPageLayout();
        
        // Auto-close sidebar on small screens
        if (window.innerWidth < 992 && sideBar) {
            sideBar.classList.remove('active');
            if (body) body.classList.remove('active');
        }
    });
    
    // Function to handle page layout
    function adjustPageLayout() {
        // Ensure content has proper spacing
        const contentContainers = document.querySelectorAll('.content-container, .profile-container, .simulation-page, .module-page');
        const header = document.querySelector('.header');
        const footer = document.querySelector('.footer');
        const headerHeight = header ? header.offsetHeight : 0;
        const footerHeight = footer ? footer.offsetHeight : 0;
        
        // Check if current page is history, module, or simulation
        const path = window.location.pathname;
        const isSpecialPage = path.includes('history.php') || path.includes('module.php') || path.includes('simulation.php');
        
        contentContainers.forEach(container => {
            if (container) {
                container.style.minHeight = `calc(100vh - ${headerHeight + footerHeight + 40}px)`;
                container.style.paddingBottom = '3rem';
                
                // For special pages, center the content
                if (isSpecialPage) {
                    container.style.marginLeft = 'auto';
                    container.style.marginRight = 'auto';
                    container.style.maxWidth = '1200px';
                }
                // For other pages, use the default sidebar layout
                else if (window.innerWidth >= 992) {
                    // Desktop view - sidebar is visible by default
                    container.style.marginLeft = '270px'; // Always leave space for sidebar on desktop
                    container.style.marginRight = 'auto';
                } else {
                    // Mobile view - content takes full width
                    container.style.marginLeft = 'auto';
                    container.style.marginRight = 'auto';
                }
            }
        });
    }
    
    // Remove active classes on scroll for mobile
    window.addEventListener('scroll', () => {
        if (window.innerWidth < 992 && sideBar && body) {
            sideBar.classList.remove('active');
            body.classList.remove('active');
        }
    });
    
    // Call layout functions on load
    adjustContentSpacing();
    adjustPageLayout();
});
