function openModal(modalId) {
    // Display the specified modal
    const modal = document.getElementById(`modal-${modalId}`);
    modal.style.display = 'block';
}

function closeModal(modalId) {
    // Hide the specified modal
    const modal = document.getElementById(`modal-${modalId}`);
    modal.style.display = 'none';
}

// Close modal when clicking outside the content
window.addEventListener('click', function(event) {
    const modals = document.getElementsByClassName('modal');
    for (const modal of modals) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }
});