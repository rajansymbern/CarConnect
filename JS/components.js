// Component loader for header and footer
document.addEventListener('DOMContentLoaded', function() {
    // Detect if we're in a Legal subdirectory
    const isLegalPage = window.location.pathname.includes('/Legal/');
    
    console.log('Component loader starting. isLegalPage:', isLegalPage);
    console.log('Current pathname:', window.location.pathname);
    
    // Try multiple path strategies
    const pathStrategies = [
        '/MasterPages/header.html',           // Absolute from root
        '../MasterPages/header.html',         // Relative from Legal directory
        'MasterPages/header.html'             // Relative from current directory
    ];
    
    // Load header with fallback strategies
    loadComponentWithFallbacks('header', pathStrategies);
    
    // Load footer with fallback strategies
    const footerStrategies = [
        '/MasterPages/footer.html',           // Absolute from root
        '../MasterPages/footer.html',         // Relative from Legal directory
        'MasterPages/footer.html'             // Relative from current directory
    ];
    loadComponentWithFallbacks('footer', footerStrategies);
    
    // Initialize mobile menu after components are loaded
    setTimeout(initMobileMenu, 100);
    
    // Fix paths after components are loaded
    setTimeout(fixPaths, 200);
});

function loadComponentWithFallbacks(elementId, pathStrategies) {
    console.log('Attempting to load component:', elementId, 'with strategies:', pathStrategies);
    
    function tryNextStrategy(index) {
        if (index >= pathStrategies.length) {
            console.error('All strategies failed for', elementId);
            return;
        }
        
        const filePath = pathStrategies[index];
        console.log('Trying strategy', index + 1, 'for', elementId, ':', filePath);
        
        fetch(filePath)
            .then(response => {
                console.log('Fetch response for', elementId, 'strategy', index + 1, ':', response.status, response.statusText);
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                }
                return response.text();
            })
            .then(html => {
                console.log('Successfully loaded', elementId, 'with strategy', index + 1, 'HTML length:', html.length);
                const element = document.getElementById(elementId);
                if (element) {
                    element.innerHTML = html;
                    console.log('Successfully inserted', elementId, 'into DOM');
                    
                    // Execute any scripts within the loaded component
                    const scripts = element.querySelectorAll('script');
                    console.log('Found', scripts.length, 'scripts in', elementId);
                    scripts.forEach(script => {
                        if (script.textContent) {
                            // Create a new script element and execute it
                            const newScript = document.createElement('script');
                            newScript.textContent = script.textContent;
                            document.head.appendChild(newScript);
                            document.head.removeChild(newScript);
                            console.log('Executed script from', elementId);
                        }
                    });
                } else {
                    console.error('Element with id', elementId, 'not found in DOM');
                }
            })
            .catch(error => {
                console.error('Strategy', index + 1, 'failed for', elementId, ':', error);
                // Try next strategy
                tryNextStrategy(index + 1);
            });
    }
    
    // Start with first strategy
    tryNextStrategy(0);
}

function fixPaths() {
    const isLegalPage = window.location.pathname.includes('/Legal/');
    
    console.log('Fixing paths. isLegalPage:', isLegalPage);
    
    // Fix all navigation links in the entire document
    const links = document.querySelectorAll('a[href^="/index.html"], a[href^="/contact.html"], a[href^="/Legal/"]');
    console.log('Found links to fix:', links.length);
    
    links.forEach(link => {
        const originalHref = link.href;
        
        if (link.href.includes('/Legal/')) {
            // For Legal links, we need to handle them differently
            if (isLegalPage) {
                // If we're on a Legal page, Legal links should be relative to current directory
                // Extract just the filename from /Legal/filename.html
                const filename = link.href.split('/').pop();
                link.href = filename;
                console.log('Fixed Legal link from', originalHref, 'to', link.href);
            } else {
                // If we're on a main page, Legal links should include the /Legal/ prefix
                // This is already correct in the HTML, so no change needed
                console.log('Legal link on main page, keeping as:', link.href);
            }
        } else {
            // For other links, they're already absolute, so no change needed
            console.log('Link already absolute:', link.href);
        }
    });
}

function initMobileMenu() {
    var btn = document.getElementById('mobile-menu-btn');
    var menu = document.getElementById('mobile-menu');
    if (btn && menu) {
        btn.addEventListener('click', function() {
            menu.classList.toggle('hidden');
        });
        console.log('Mobile menu initialized');
    } else {
        console.log('Mobile menu elements not found');
    }
} 