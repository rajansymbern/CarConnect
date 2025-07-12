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
});

function loadComponent(elementId, filePath) {
    fetch(filePath)
        .then(response => response.text())
        .then(html => {
            const element = document.getElementById(elementId);
            if (element) {
                element.innerHTML = html;
            }
        })
        .catch(error => {
            console.error('Error loading component:', error);
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