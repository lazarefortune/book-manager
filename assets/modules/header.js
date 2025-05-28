document.addEventListener('DOMContentLoaded', () => {
    const burger     = document.getElementById('burger');
    const menu       = document.getElementById('mobile-menu');
    const openIcon   = document.getElementById('burger-open');
    const closeIcon  = document.getElementById('burger-close');

    const toggleMenu = () => {
        menu.classList.toggle('-translate-y-full');
        menu.classList.toggle('translate-y-0');
        openIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    };

    burger.addEventListener('click', toggleMenu);

    menu.querySelectorAll('a').forEach(link =>
        link.addEventListener('click', () => window.innerWidth < 768 && toggleMenu())
    );

    menu.addEventListener('click', e => {
        if (e.target === menu && window.innerWidth < 768) toggleMenu();
    });
});


// dropdown
const userToggle = document.getElementById('user-toggle');
const userMenu   = document.getElementById('user-menu');

if (userToggle) {
    userToggle.addEventListener('click', e => {
        e.stopPropagation();
        userMenu.classList.toggle('hidden');
    });

    window.addEventListener('click', () => userMenu.classList.add('hidden'));
}
