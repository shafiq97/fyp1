// Debug script to fix font awesome icons
document.addEventListener('DOMContentLoaded', function() {
    console.log('Font Awesome Icon Debug Running');
    
    // Check for Timeline points
    const timelinePoints = document.querySelectorAll('.timeline-point');
    console.log(`Found ${timelinePoints.length} timeline points`);
    
    // Debug each point and ensure its icon is visible
    timelinePoints.forEach((point, index) => {
        const icon = point.querySelector('i');
        if (icon) {
            console.log(`Point ${index} icon class: ${icon.className}`);
            
            // Make sure icons are visible
            icon.style.display = 'inline-block !important';
            icon.style.visibility = 'visible !important';
            icon.style.opacity = '1 !important';
            icon.style.color = '#ffffff !important'; // White
            icon.style.fontSize = '18px !important'; // Make sure icon is visible
            
            // Also style the point to make sure it shows properly
            point.style.display = 'flex !important';
            point.style.alignItems = 'center !important';
            point.style.justifyContent = 'center !important';
        } else {
            console.error(`No icon found in point ${index}`);
        }
    });

    // Check for Font Awesome conflicts and ensure the FA Kit has priority
    const styleSheets = document.styleSheets;
    let foundFAStylesheets = 0;
    
    for (let i = 0; i < styleSheets.length; i++) {
        try {
            const href = styleSheets[i].href || '';
            if (href.includes('font-awesome') || href.includes('fontawesome')) {
                console.log(`Found Font Awesome stylesheet: ${href}`);
                foundFAStylesheets++;
            }
        } catch (e) {
            // Cross-origin stylesheets may cause errors
            console.log('Could not access stylesheet');
        }
    }
    
    console.log(`Total Font Awesome stylesheets found: ${foundFAStylesheets}`);
    
    // Alert the user if we found multiple Font Awesome sources
    if (foundFAStylesheets > 1) {
        console.warn('Multiple Font Awesome sources detected - may cause conflicts!');
    }
});
