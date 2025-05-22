// Persistent sidebar toggle functionality with interval check
document.addEventListener('DOMContentLoaded', function() {
    // Select sidebar elements
    const sidebar = document.querySelector('.side-bar');
    const menuBtn = document.querySelector('#menu-btn');
    const closeBtn = document.querySelector('.close-side-bar');
    const contentWrapper = document.querySelector('.flex-grow-1');
    const header = document.querySelector('.header');
    const mainContent = document.querySelector('main');
    
    console.log("Sidebar elements:", {
        sidebar: !!sidebar,
        menuBtn: !!menuBtn,
        closeBtn: !!closeBtn,
        contentWrapper: !!contentWrapper,
        header: !!header,
        mainContent: !!mainContent
    });
    
    // Check if we're in desktop view
    function isDesktopView() {
        return window.innerWidth >= 992;
    }
    
    // Apply layout based on sidebar state
    function applyLayout(force = false) {
        if (!sidebar) return;
        
        const sidebarActive = sidebar.classList.contains('active');
        console.log("Applying layout, sidebar active:", sidebarActive);
        
        if (isDesktopView()) {
            // Check if header has correct width already (prevent flicker)
            const headerHasCorrectWidth = header && 
                header.style.width === (sidebarActive ? "calc(100% - 300px)" : "100%");
            
            // Only update if forced or current values are incorrect
            if (force || !headerHasCorrectWidth) {
                // Set header position and width with !important inline
                if (header) {
                    header.setAttribute('style', `
                        position: fixed !important;
                        top: 0 !important;
                        left: ${sidebarActive ? "300px" : "0"} !important;
                        width: ${sidebarActive ? "calc(100% - 300px)" : "100%"} !important;
                        max-width: ${sidebarActive ? "calc(100% - 300px)" : "100%"} !important;
                        z-index: 999 !important;
                    `);
                }
                
                // Set content wrapper position and width
                if (contentWrapper) {
                    contentWrapper.setAttribute('style', `
                        margin-left: ${sidebarActive ? "300px" : "0"} !important;
                        width: ${sidebarActive ? "calc(100% - 300px)" : "100%"} !important;
                        max-width: ${sidebarActive ? "calc(100% - 300px)" : "100%"} !important;
                    `);
                }
                
                // Set main content position and width
                if (mainContent) {
                    mainContent.setAttribute('style', `
                        padding-top: 70px !important;
                        margin-left: ${sidebarActive ? "300px" : "0"} !important;
                        width: ${sidebarActive ? "calc(100% - 300px)" : "100%"} !important;
                        max-width: ${sidebarActive ? "calc(100% - 300px)" : "100%"} !important;
                    `);
                }
                
                // Apply to container elements
                const containers = document.querySelectorAll('.container, .container-fluid, .content-container');
                containers.forEach(container => {
                    container.style.width = "100%";
                    container.style.maxWidth = "100%";
                    if (!sidebarActive) {
                        container.style.marginLeft = "0";
                    }
                });
                
                // Apply !important CSS rules using a style element for extra insurance
                let styleEl = document.getElementById('sidebar-layout-styles');
                if (!styleEl) {
                    styleEl = document.createElement('style');
                    styleEl.id = 'sidebar-layout-styles';
                    document.head.appendChild(styleEl);
                }
                
                styleEl.textContent = isDesktopView() ? `
                    @media (min-width: 992px) {
                        .header, header {
                            left: ${sidebarActive ? "300px" : "0"} !important;
                            width: ${sidebarActive ? "calc(100% - 300px)" : "100%"} !important;
                            max-width: ${sidebarActive ? "calc(100% - 300px)" : "100%"} !important;
                        }
                        
                        main, .content-container {
                            margin-left: ${sidebarActive ? "300px" : "0"} !important;
                            width: ${sidebarActive ? "calc(100% - 300px)" : "100%"} !important;
                            max-width: ${sidebarActive ? "calc(100% - 300px)" : "100%"} !important;
                        }
                        
                        .flex-grow-1 {
                            margin-left: ${sidebarActive ? "300px" : "0"} !important;
                            width: ${sidebarActive ? "calc(100% - 300px)" : "100%"} !important;
                        }
                    }
                ` : '';
            }
        } else {
            // Reset styles for mobile view
            if (header) {
                header.style.left = "";
                header.style.width = "";
                header.style.maxWidth = "";
            }
            
            if (contentWrapper) {
                contentWrapper.style.marginLeft = "";
                contentWrapper.style.width = "";
                contentWrapper.style.maxWidth = "";
            }
            
            if (mainContent) {
                mainContent.style.marginLeft = "";
                mainContent.style.width = "";
                mainContent.style.maxWidth = "";
            }
            
            const containers = document.querySelectorAll('.container, .container-fluid, .content-container');
            containers.forEach(container => {
                container.style.width = "";
                container.style.maxWidth = "";
                container.style.marginLeft = "";
            });
            
            // Remove the dynamic style element
            const styleEl = document.getElementById('sidebar-layout-styles');
            if (styleEl) {
                styleEl.textContent = '';
            }
        }
    }
    
    // Toggle sidebar function
    function toggleSidebar(e) {
        if (e) e.preventDefault();
        
        console.log("Toggle sidebar called, desktop view:", isDesktopView());
        
        if (sidebar) {
            sidebar.classList.toggle('active');
            applyLayout(true); // Force layout update
            
            // Continue to apply layout for a short period to ensure it sticks
            let count = 0;
            const layoutInterval = setInterval(() => {
                applyLayout(true);
                count++;
                if (count >= 5) clearInterval(layoutInterval); // Apply 5 times over 1 second
            }, 200);
        }
    }
    
    // Add event listeners
    if (menuBtn) {
        console.log("Adding click event to menu button");
        menuBtn.addEventListener('click', toggleSidebar);
    }
    
    if (closeBtn) {
        console.log("Adding click event to close button");
        closeBtn.addEventListener('click', toggleSidebar);
    }
    
    // Add keyboard shortcut for toggling sidebar
    document.addEventListener('keydown', function(e) {
        if (e.altKey && e.key === 's') {
            toggleSidebar(e);
        }
    });
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth < 992) {
            // Auto-close sidebar on small screens
            if (sidebar && sidebar.classList.contains('active')) {
                console.log("Auto-closing sidebar on resize");
                sidebar.classList.remove('active');
            }
        }
        
        // Apply layout for current state
        applyLayout(true);
    });
    
    // Auto-close sidebar on scroll (mobile only)
    window.addEventListener('scroll', function() {
        if (window.innerWidth < 992) {
            if (sidebar && sidebar.classList.contains('active')) {
                console.log("Auto-closing sidebar on scroll");
                sidebar.classList.remove('active');
                applyLayout(true);
            }
        }
    });
    
    // Remove any existing overlay elements
    const existingOverlay = document.querySelector('#sidebar-overlay');
    if (existingOverlay) {
        existingOverlay.remove();
    }
    
    const existingSidebarOverlay = document.querySelector('.sidebar-overlay');
    if (existingSidebarOverlay) {
        existingSidebarOverlay.remove();
    }
    
    // Ensure sidebar is active by default on desktop
    if (isDesktopView() && sidebar && !sidebar.classList.contains('active')) {
        sidebar.classList.add('active');
    }
    
    // Apply layout immediately on page load
    setTimeout(() => {
        applyLayout(true);
        
        // Keep checking and reapplying layout for the first few seconds to override any other scripts
        let count = 0;
        const initialInterval = setInterval(() => {
            applyLayout(true);
            count++;
            if (count >= 10) clearInterval(initialInterval); // Check 10 times over 2 seconds
        }, 200);
    }, 0);
    
    // Set up a persistent interval to check layout every second
    setInterval(() => {
        applyLayout();
    }, 1000);
});