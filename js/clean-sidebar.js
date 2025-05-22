/**
 * CLEAN SIDEBAR JAVASCRIPT
 * This replaces all other sidebar JavaScript functionality
 */
document.addEventListener('DOMContentLoaded', function() {
  console.log('Clean sidebar JavaScript loaded');
  
  // Get sidebar elements
  const sidebar = document.querySelector('.side-bar');
  const menuBtn = document.getElementById('menu-btn');
  
  // Early exit if elements don't exist
  if (!sidebar || !menuBtn) {
    console.error('Required sidebar elements not found');
    return;
  }
  
  // Create overlay element - COMPLETELY TRANSPARENT
  const overlay = document.createElement('div');
  overlay.className = 'sidebar-overlay';
  overlay.style.backgroundColor = 'transparent !important'; // Force transparency
  overlay.style.background = 'none !important'; // Extra insurance
  document.body.appendChild(overlay);
  
  // Function to toggle sidebar
  function toggleSidebar(e) {
    if (e) e.preventDefault();
    
    // Toggle sidebar active class
    sidebar.classList.toggle('active');
    
    // Toggle overlay visibility but keep it transparent
    overlay.classList.toggle('active');
    overlay.style.backgroundColor = 'transparent'; // Ensure transparency when active
    
    // Ensure body doesn't have active class
  // Attach event to menu button
  menuBtn.addEventListener('click', toggleSidebar);
  
  // Attach event to overlay
  overlay.addEventListener('click', toggleSidebar);
  
  // Find and attach event to close button
  const closeBtn = document.querySelector('.close-side-bar');
  if (closeBtn) {
    closeBtn.addEventListener('click', toggleSidebar);
  }
  
  // Make all sidebar links explicitly clickable
  const links = sidebar.querySelectorAll('a');
  links.forEach(link => {
    // Ensure links are clickable by setting inline styles
    link.style.position = 'relative';
    link.style.zIndex = '10000';
    link.style.pointerEvents = 'auto';
  });
});