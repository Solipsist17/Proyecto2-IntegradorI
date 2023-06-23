// js para cerrar los mensajes de alerta
const closeButton = document.querySelector('.alert .close-btn');
const alertContainer = document.querySelector('.alert');

closeButton.addEventListener('click', () => {
    alertContainer.style.display = 'none';
});