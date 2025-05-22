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
            // Toggle the sidebar visibility with active class
            sideBar.classList.toggle('active');
            if (body) body.classList.toggle('active');
            
            // Force the navbar-brand to stay on top
            const logo = document.querySelector('.navbar-brand');
            if (logo) {
                logo.style.zIndex = '1200';
                logo.style.position = 'relative';
                logo.style.visibility = 'visible';
                logo.style.display = 'block';
            }
            
            // Ensure logo image is visible
            const logoImg = document.querySelector('.navbar-brand img');
            if (logoImg) {
                logoImg.style.display = 'block';
                logoImg.style.visibility = 'visible';
                logoImg.style.opacity = '1';
            }
            
            // Ensure container is properly sized
            const headerContainer = document.querySelector('.header .container-fluid');
            if (headerContainer) {
                headerContainer.style.zIndex = '1100';
                headerContainer.style.position = 'relative';
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
        const isSpecialPage = path.includes('history.php') || path.includes('module.php') || 
                             path.includes('simulation.php') || path.includes('profile.php') ||
                             path.includes('virus_simulation.php');
        
        contentContainers.forEach(container => {
            if (container) {
                container.style.minHeight = `calc(100vh - ${headerHeight + footerHeight + 40}px)`;
                container.style.paddingBottom = '3rem';
                
                // Always center the container but adjust padding for sidebar on desktop
                container.style.marginLeft = 'auto';
                container.style.marginRight = 'auto';
                container.style.maxWidth = '1200px';
                
                // Check if sidebar should be active
                const isSidebarActive = document.querySelector('.dashboard-page') && !document.querySelector('.dashboard-page.active');
                
                // Set appropriate padding based on device and sidebar state
                if (window.innerWidth >= 992 && isSidebarActive && !isSpecialPage) {
                    // Desktop view with visible sidebar - add padding for sidebar
                    container.style.paddingLeft = '280px';
                } else {
                    // Mobile view or hidden sidebar - reset padding
                    container.style.paddingLeft = '20px';
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
