document.addEventListener('DOMContentLoaded', () => {
    const CloseDropBar = document.getElementById('close-dropbar');
    const ShowDropBar = document.getElementById('show-dropbar');
    const overlay = document.getElementById('hidden-overlay');
    const card = document.getElementById('dropbar-card');

    if (ShowDropBar) {
        ShowDropBar.addEventListener('click', () => {
            overlay.classList.remove('hidden');
            overlay.classList.add('flex');
            card.classList.remove('hidden');
            card.classList.add('flex');
        });
    }

    if (CloseDropBar){
        CloseDropBar.addEventListener('click', () => {
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