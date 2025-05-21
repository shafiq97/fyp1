/* JS to ensure header and footer are full width */
(function() {
    // Force header and footer to full width
    function forceFullWidth() {
        const header = document.querySelector('.header');
        const footer = document.querySelector('.footer');
        
        if (header) {
            header.style.cssText = "position:fixed !important; top:0 !important; left:0 !important; right:0 !important; width:100vw !important; max-width:100vw !important; margin:0 !important; padding:0 !important; transform:none !important; overflow:visible !important; z-index:1000 !important;";
            
            // Get all header children and ensure they're properly sized
            const headerContent = header.querySelector('.flex');
            if (headerContent) {
                headerContent.style.width = '100%';
                headerContent.style.maxWidth = '100%';
                headerContent.style.boxSizing = 'border-box';
            }
        }
        
        if (footer) {
            footer.style.cssText = "position:fixed !important; bottom:0 !important; left:0 !important; right:0 !important; width:100vw !important; max-width:100vw !important; margin:0 !important; padding:0 !important; transform:none !important; overflow:visible !important; z-index:1000 !important;";
            
            // Get footer content and ensure it's properly sized
            const footerContent = footer.querySelector('div');
            if (footerContent) {
                footerContent.style.width = '100%';
                footerContent.style.boxSizing = 'border-box';
            }
        }
        
        // Force html and body to full width
        document.documentElement.style.cssText = "margin:0 !important; padding:0 !important; width:100% !important; max-width:100vw !important; overflow-x:hidden !important;";
        document.body.style.cssText = "margin:0 !important; padding:0 !important; width:100% !important; max-width:100vw !important; overflow-x:hidden !important;";
    }
    
    // Run on page load
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', forceFullWidth);
    } else {
        forceFullWidth();
    }
    
    // Run on window resize
    window.addEventListener('resize', forceFullWidth);
    
    // Run periodically to ensure full width
    setInterval(forceFullWidth, 1000);
    
    // Run when sidebar is toggled
    const menuBtn = document.querySelector('#menu-btn');
    if (menuBtn) {
        menuBtn.addEventListener('click', function() {
            setTimeout(forceFullWidth, 50);
            setTimeout(forceFullWidth, 300);
        });
    }
    
    // Run when page is scrolled
    window.addEventListener('scroll', function() {
        requestAnimationFrame(forceFullWidth);
    });
})();
