// Component loader for header and footer
document.addEventListener('DOMContentLoaded', function() {
    // Detect if we're in a Legal subdirectory
    const isLegalPage = window.location.pathname.includes('/Legal/');
    const basePath = isLegalPage ? '../' : '';
    
    // Load header
    loadComponent('header', basePath + 'MasterPages/header.html');
    
    // Load footer
    loadComponent('footer', basePath + 'MasterPages/footer.html');
    
    // Initialize mobile menu after components are loaded
    setTimeout(initMobileMenu, 100);
    
    // Fix paths after components are loaded
    setTimeout(fixPaths, 200);
});

function loadComponent(elementId, filePath) {
    fetch(filePath)
        .then(response => response.text())
        .then(html => {
            const element = document.getElementById(elementId);
            if (element) {
                element.innerHTML = html;
                
                // Execute any scripts within the loaded component
                const scripts = element.querySelectorAll('script');
                scripts.forEach(script => {
                    if (script.textContent) {
                        // Create a new script element and execute it
                        const newScript = document.createElement('script');
                        newScript.textContent = script.textContent;
                        document.head.appendChild(newScript);
                        document.head.removeChild(newScript);
                    }
                });
            }
        })
        .catch(error => {
            console.error('Error loading component:', error);
        });
}

function fixPaths() {
    const isLegalPage = window.location.pathname.includes('/Legal/');
    const basePath = isLegalPage ? '../' : '';
    
    console.log('Fixing paths. isLegalPage:', isLegalPage, 'basePath:', basePath);
    
    // Fix all navigation links in the entire document
    const links = document.querySelectorAll('a[href^="index.html"], a[href^="contact.html"], a[href^="Legal/"]');
    console.log('Found links to fix:', links.length);
    
    links.forEach(link => {
        const originalHref = link.href;
        
        if (link.href.includes('Legal/')) {
            // For Legal links, we need to handle them differently
            if (isLegalPage) {
                // If we're on a Legal page, Legal links should be relative to current directory
                // Extract just the filename from Legal/filename.html
                const filename = link.href.split('/').pop();
                link.href = filename;
                console.log('Fixed Legal link from', originalHref, 'to', link.href);
            } else {
                // If we're on a main page, Legal links should include the Legal/ prefix
                // This is already correct in the HTML, so no change needed
                console.log('Legal link on main page, keeping as:', link.href);
            }
        } else {
            // For other links, add the base path
            link.href = basePath + link.href;
            console.log('Fixed link from', originalHref, 'to', link.href);
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
    }
} 