/**
 * Font Awesome Icon Fix Script
 * Replaces deprecated Font Awesome 5 classes with their Font Awesome 6 equivalents
 * and provides fallback handling for timeline points
 */

document.addEventListener('DOMContentLoaded', function() {
    // Verify Font Awesome is loaded
    if (typeof FontAwesome === 'undefined') {
        console.error('Font Awesome not loaded properly');
    }

    // Map of old FA5 icons to new FA6 icons
    const iconMappings = {
        'fa-share-alt': 'fa-share-nodes',
        'fa-shield-alt': 'fa-shield-halved',
        'fa-exclamation-triangle': 'fa-triangle-exclamation',
        // Add more mappings as needed
    };
    
    // Find all Font Awesome icons in timeline points
    const timelinePoints = document.querySelectorAll('.timeline-point i');
    
    // Map of specific icons to ensure are present for each timeline position
    const positionIcons = {
        // ILOVEYOU timeline
        "iloveyou": [
            { index: 0, icon: "fa-virus" },
            { index: 1, icon: "fa-share-nodes" }, // Updated from fa-share-alt
            { index: 2, icon: "fa-globe" },
            { index: 3, icon: "fa-shield-halved" }, // Updated from fa-shield-alt
            { index: 4, icon: "fa-chart-line" }
        ],
        // Morris Worm timeline
        "morrisworm": [
            { index: 0, icon: "fa-bug" },
            { index: 1, icon: "fa-microchip" },
            { index: 2, icon: "fa-network-wired" },
            { index: 3, icon: "fa-triangle-exclamation" }, // Updated from fa-exclamation-triangle
            { index: 4, icon: "fa-search" }
        ],
        // Zeus Trojan timeline
        "zeustrojan": [
            { index: 0, icon: "fa-horse-head" },
            { index: 1, icon: "fa-puzzle-piece" },
            { index: 2, icon: "fa-code" },
            { index: 3, icon: "fa-gavel" },
            { index: 4, icon: "fa-history" }
        ]
    };
    
    let currentMalware = "iloveyou"; // Default
    
    // Determine which malware page we're on
    const pageUrl = window.location.pathname;
    if (pageUrl.includes('morrisworm')) {
        currentMalware = "morrisworm";
    } else if (pageUrl.includes('zeus')) {
        currentMalware = "zeustrojan";
    }
    
    console.log(`Detected page for: ${currentMalware}`);
    
    // First pass - replace deprecated icons with their new versions
    timelinePoints.forEach(icon => {
        const classes = Array.from(icon.classList);
        classes.forEach(className => {
            if (iconMappings[className]) {
                console.log(`Replacing ${className} with ${iconMappings[className]}`);
                icon.classList.remove(className);
                icon.classList.add(iconMappings[className]);
            }
        });
    });
    
    // Second pass - ensure each position has the correct icon and text
    timelinePoints.forEach(iconElement => {
        const point = iconElement.closest('.timeline-point');
        if (!point) return;
        
        const index = parseInt(point.getAttribute('data-index') || 0);
        const currentMalwareIcons = positionIcons[currentMalware];
        
        if (currentMalwareIcons && currentMalwareIcons[index]) {
            const correctIcon = currentMalwareIcons[index].icon;
            
            // Check if the icon has any Font Awesome class
            const hasFontAwesomeClass = Array.from(iconElement.classList).some(c => c.startsWith('fa-'));
            
            // If no Font Awesome class or wrong icon, fix it
            if (!hasFontAwesomeClass || !iconElement.classList.contains(correctIcon)) {
                // Remove all fa- classes
                Array.from(iconElement.classList)
                    .filter(c => c.startsWith('fa-'))
                    .forEach(c => iconElement.classList.remove(c));
                
                // Add the correct icon class
                iconElement.classList.add(correctIcon);
                console.log(`Position ${index}: Set icon to ${correctIcon}`);
            }
        }
    });
    
    // Add visibility check - if after our fixes icons still aren't visible
    setTimeout(() => {
        timelinePoints.forEach(iconElement => {
            // Check if the icon is rendered properly (has dimensions)
            const rect = iconElement.getBoundingClientRect();
            const isEmpty = rect.width === 0 || rect.height === 0;
            
            if (isEmpty) {
                console.log('Found invisible icon, applying fallback', iconElement);
                iconElement.classList.add('broken-icon');
                
                // Add text content as fallback
                const point = iconElement.closest('.timeline-point');
                if (point) {
                    const index = parseInt(point.getAttribute('data-index') || 0);
                    iconElement.textContent = String(index + 1);
                }
            }
        });
    }, 500); // Check after a short delay to allow rendering
    
    console.log('Font Awesome icon fix script executed');

    // ILOVEYOU timeline icons with their respective classes
    const timelineIcons = [
        { index: 0, icon: 'virus', prefix: 'fas' },
        { index: 1, icon: 'share-nodes', prefix: 'fas' },
        { index: 2, icon: 'globe', prefix: 'fas' },
        { index: 3, icon: 'shield-halved', prefix: 'fas' },
        { index: 4, icon: 'chart-line', prefix: 'fas' }
    ];

    // Function to update timeline point icons
    function updateTimelineIcons() {
        timelineIcons.forEach(iconInfo => {
            const point = document.querySelector(`.timeline-point[data-index="${iconInfo.index}"]`);
            if (point) {
                const iconElement = point.querySelector('i');
                if (iconElement) {
                    // Remove all existing FA classes
                    iconElement.className = '';
                    // Add the correct classes
                    iconElement.classList.add(iconInfo.prefix, `fa-${iconInfo.icon}`);
                    // Force the icon to be visible
                    iconElement.style.display = 'inline-block';
                    iconElement.style.visibility = 'visible';
                    iconElement.style.opacity = '1';
                }
            }
        });
    }

    // Initial update
    updateTimelineIcons();

    // Add mutation observer to handle dynamic content
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList') {
                updateTimelineIcons();
            }
        });
    });

    // Start observing the timeline container for changes
    const timelineContainer = document.querySelector('.timeline-container');
    if (timelineContainer) {
        observer.observe(timelineContainer, {
            childList: true,
            subtree: true
        });
    }
});
