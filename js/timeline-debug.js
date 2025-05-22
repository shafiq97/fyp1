/**
 * Timeline Debugging Tool
 * This script helps diagnose timeline rendering issues by checking positioning and styles
 */

(function() {
  // Add a debug button to the page for easy triggering
  window.addEventListener('load', function() {
    // Create debug button (hidden in production)
    const debugButton = document.createElement('button');
    debugButton.textContent = 'Debug Timeline';
    debugButton.id = 'timeline-debug-btn';
    debugButton.style.position = 'fixed';
    debugButton.style.bottom = '10px';
    debugButton.style.right = '10px';
    debugButton.style.zIndex = '9999';
    debugButton.style.padding = '5px 10px';
    debugButton.style.backgroundColor = '#f44336';
    debugButton.style.color = 'white';
    debugButton.style.border = 'none';
    debugButton.style.borderRadius = '4px';
    debugButton.style.cursor = 'pointer';
    debugButton.style.display = 'none'; // Hidden by default, enable for debugging
    
    document.body.appendChild(debugButton);
    
    // Debug function
    function debugTimeline() {
      console.group('🔍 Timeline Debug Information');
      
      const timelines = document.querySelectorAll('.timeline-line');
      console.log(`Found ${timelines.length} timeline(s)`);
      
      timelines.forEach((timeline, i) => {
        console.group(`Timeline #${i+1}`);
        
        // Check timeline dimensions
        const container = timeline.closest('.timeline-container');
        console.log('Container:', {
          width: container.offsetWidth,
          height: container.offsetHeight,
          padding: window.getComputedStyle(container).padding,
          position: window.getComputedStyle(container).position
        });
        
        console.log('Timeline:', {
          width: timeline.offsetWidth,
          height: timeline.offsetHeight,
          position: window.getComputedStyle(timeline).position
        });
        
        // Check points
        const points = timeline.querySelectorAll('.timeline-point');
        console.log(`Found ${points.length} points`);
        
        points.forEach((point, j) => {
          const index = point.getAttribute('data-index');
          const computedStyle = window.getComputedStyle(point);
          
          console.log(`Point ${index}:`, {
            left: computedStyle.left,
            transform: computedStyle.transform,
            width: point.offsetWidth,
            height: point.offsetHeight,
            position: computedStyle.position
          });
          
          // Check icon
          const icon = point.querySelector('i');
          if (icon) {
            console.log(`Icon in point ${index}:`, {
              fontSize: window.getComputedStyle(icon).fontSize,
              visibility: window.getComputedStyle(icon).visibility,
              display: window.getComputedStyle(icon).display
            });
          }
        });
        
        console.groupEnd();
      });
      
      console.groupEnd();
      
      // Visual indicator of positions
      const timelinePositions = [];
      document.querySelectorAll('.timeline-point').forEach(point => {
        const rect = point.getBoundingClientRect();
        timelinePositions.push({
          index: point.getAttribute('data-index'),
          left: rect.left,
          center: rect.left + rect.width/2,
          right: rect.right
        });
      });
      
      console.table(timelinePositions);
      
      // Offer fix suggestions
      if (timelinePositions.length > 0) {
        const firstPoint = timelinePositions[0];
        const lastPoint = timelinePositions[timelinePositions.length - 1];
        
        if (firstPoint.left < 0) {
          console.warn('⚠️ First point is off-screen to the left. Consider adding more padding.');
        }
        
        if (lastPoint.right > window.innerWidth) {
          console.warn('⚠️ Last point is off-screen to the right. Consider adding more padding.');
        }
      }
    }
    
    // Add event listener
    debugButton.addEventListener('click', debugTimeline);
    
    // Add keyboard shortcut for developers (Ctrl+Shift+D)
    document.addEventListener('keydown', function(e) {
      if (e.ctrlKey && e.shiftKey && e.key === 'D') {
        debugTimeline();
      }
    });
  });
})();
