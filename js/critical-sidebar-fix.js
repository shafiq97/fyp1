/**
 * CRITICAL SIDEBAR FIX
 * This script completely replaces previous sidebar functionality
 * using a completely different approach to ensure links are clickable
 */
document.addEventListener('DOMContentLoaded', function() {
  console.log("Critical sidebar fix loaded");
  
  // STEP 1: Remove all duplicate sidebars
  const sidebars = document.querySelectorAll('.side-bar');
  if (sidebars.length > 1) {
    console.log(`Found ${sidebars.length} sidebars - removing duplicates`);
    for (let i = 1; i < sidebars.length; i++) {
      sidebars[i].parentNode.removeChild(sidebars[i]);
    }
  }
  
  // STEP 2: Create overlay element instead of using body::after
  const overlay = document.createElement('div');
  overlay.id = 'sidebar-overlay';
  document.body.appendChild(overlay);
  
  // Get the remaining sidebar and buttons
  const sidebar = document.querySelector('.side-bar');
  const menuBtn = document.getElementById('menu-btn');
  const closeBtn = document.querySelector('.close-side-bar');
  
  if (!sidebar || !menuBtn) {
    console.error("Required sidebar elements not found");
    return;
  }
  
  // STEP 3: Replace the old toggle functions with a new approach
  // Toggle sidebar function
  function toggleSidebar(e) {
    if (e) {
      e.preventDefault();
      e.stopPropagation();
    }
    
    console.log("Toggling sidebar");
    
    // Toggle active class on sidebar
    sidebar.classList.toggle('active');
    
    // Toggle overlay
    overlay.classList.toggle('active');
    
    // Remove any body active class that might cause the background
    document.body.classList.remove('active');
    
    // Force clickable links
    const links = sidebar.querySelectorAll('a');
    links.forEach(link => {
      link.style.pointerEvents = "auto";
      link.style.position = "relative";
      link.style.zIndex = "100002";
    });
    
    return false;
  }
  
  // STEP 4: Properly attach event listeners
  
  // Replace menu button to remove any existing listeners
  if (menuBtn.parentNode) {
    const newMenuBtn = menuBtn.cloneNode(true);
    menuBtn.parentNode.replaceChild(newMenuBtn, menuBtn);
    
    // Add new click handler
    newMenuBtn.addEventListener('click', toggleSidebar, true);
    console.log("Menu button event listener attached");
  }
  
  // Replace close button to remove any existing listeners
  if (closeBtn && closeBtn.parentNode) {
    const newCloseBtn = closeBtn.cloneNode(true);
    closeBtn.parentNode.replaceChild(newCloseBtn, closeBtn);
    
    // Add new click handler
    newCloseBtn.addEventListener('click', toggleSidebar, true);
    console.log("Close button event listener attached");
  }
  
  // Attach click handler to overlay
  overlay.addEventListener('click', toggleSidebar, true);
  
  // STEP 5: Make all sidebar links explicitly clickable
  const sidebarLinks = sidebar.querySelectorAll('a');
  sidebarLinks.forEach(link => {
    // Force these links to be clickable
    link.style.pointerEvents = "auto";
    link.style.position = "relative";
    link.style.zIndex = "100002";
    
    // Add explicit click handler
    link.addEventListener('click', function(e) {
      e.stopPropagation();
      const href = this.getAttribute('href');
      console.log(`Sidebar link clicked: ${href}`);
      
      // Navigate after a tiny delay to ensure the event is not canceled
      setTimeout(() => {
        window.location.href = href;
      }, 10);
    }, true);
  });
  
  console.log("Critical sidebar fix initialized successfully");
});