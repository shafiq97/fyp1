// Ensure proper sidebar and content interaction across all pages
document.addEventListener('DOMContentLoaded', function() {
    // Get important elements
    const sidebar = document.querySelector('.side-bar');
    const content = document.querySelector('.content-section, .history-details');
    const body = document.querySelector('body');
    const menuBtn = document.querySelector('#menu-btn');
    const closeBtn = document.querySelector('.close-side-bar');
    
    // Function to update layout based on viewport width
    function updateLayout() {
        const viewportWidth = window.innerWidth;
        
        if (viewportWidth >= 992) {
            // Desktop behavior
            if (sidebar) {
                sidebar.style.left = '0';
                if (content && !body.classList.contains('active')) {
                    content.style.marginLeft = '32rem';
                    content.style.width = 'calc(100% - 32rem)';
                }
            }
        } else {
            // Mobile/tablet behavior
            if (sidebar) {
                if (!sidebar.classList.contains('active')) {
                    sidebar.style.left = '-31rem';
                }
                if (content) {
                    content.style.marginLeft = '0';
                    content.style.width = '100%';
                }
            }
        }
        
        // Ensure proper z-index for header and footer
        const header = document.querySelector('.header');
        const footer = document.querySelector('.footer');
        
        if (header) {
            header.style.zIndex = '1000';
            header.style.width = '100%';
        }
        
        if (footer) {
            footer.style.zIndex = '1000';
            footer.style.width = '100%';
        }
    }
    
    // Toggle sidebar
    function toggleSidebar(e) {
        if (e) {
            e.preventDefault();
        }
        
        if (sidebar) {
            sidebar.classList.toggle('active');
        }
        if (body) {
            body.classList.toggle('active');
        }
        
        // Update layout after toggle
        updateLayout();
    }
    
    // Event listeners
    if (menuBtn) {
        menuBtn.addEventListener('click', toggleSidebar);
    }
    
    if (closeBtn) {
        closeBtn.addEventListener('click', toggleSidebar);
    }
    
    // Handle window resize
    window.addEventListener('resize', updateLayout);
    
    // Handle scroll events
    window.addEventListener('scroll', function() {
        if (window.innerWidth < 992) {
            // Close sidebar on scroll for mobile
            if (sidebar && sidebar.classList.contains('active')) {
                toggleSidebar();
            }
        }
    });
    
    // Initialize layout
    updateLayout();
    
    // Force recalculation after a short delay to handle dynamic content
    setTimeout(updateLayout, 100);
});
