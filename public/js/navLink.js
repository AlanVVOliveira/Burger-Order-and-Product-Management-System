// navlink

document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            // Remove a classe 'active' de todos os links
            navLinks.forEach(function(item) {
                item.classList.remove('active');
            });

            // Adiciona a classe 'active' ao link clicado
            link.classList.add('active');
        });
    });
});

