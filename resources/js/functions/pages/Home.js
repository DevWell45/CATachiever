document.addEventListener('DOMContentLoaded', () => {
    const Closedropdown = document.getElementById('close-dropdown');
    const Showdropdown = document.getElementById('show-dropdown');
    const overlay = document.getElementById('hidden-overlay');
    const card = document.getElementById('dropdown-card');

    if (Showdropdown) {
        Showdropdown.addEventListener('click', () => {
            overlay.classList.remove('hidden');
            overlay.classList.add('flex');
            card.classList.remove('hidden');
            card.classList.add('flex');
        });
    }

    if (Closedropdown){
        Closedropdown.addEventListener('click', () => {
            overlay.classList.remove('flex');
            overlay.classList.add('hidden');
            card.classList.remove('flex');
            card.classList.add('hidden');
        });
    }

    if (overlay){
        overlay.addEventListener('click', () => {
            overlay.classList.remove('flex');
            overlay.classList.add('hidden');
            card.classList.remove('flex');
            card.classList.add('hidden');
        });
    }
});