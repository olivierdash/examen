document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.querySelector('.file-input');
    const fileMsg = document.querySelector('.file-msg');
    const fileArea = document.querySelector('.file-drop-area');

    if (fileInput && fileMsg) {
        fileInput.addEventListener('change', (e) => {
            const filesCount = e.target.files.length;
            
            if (filesCount > 0) {
                // Si des fichiers sont sélectionnés
                fileMsg.innerText = filesCount > 1 
                    ? `${filesCount} fichiers sélectionnés` 
                    : e.target.files[0].name; // Affiche le nom si un seul fichier
                
                fileArea.style.borderColor = 'var(--primary-color)';
                fileArea.style.background = '#eef2ff';
            } else {
                // Si on annule
                fileMsg.innerText = "Cliquez ou glissez vos photos ici";
                fileArea.style.borderColor = 'var(--border-color)';
                fileArea.style.background = '#f9fafb';
            }
        });
    }
});