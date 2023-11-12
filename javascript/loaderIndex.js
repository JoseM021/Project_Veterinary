document.addEventListener('DOMContentLoaded', function() {
    var welcomeMessage = document.querySelector('.welcome__message');

    if (welcomeMessage) {
        if (!sessionStorage.getItem('showAnimation')) {
            welcomeMessage.style.animation = 'gradient 6.5s ease';
            welcomeMessage.classList.add('loaded');
            sessionStorage.setItem('showAnimation', 'true');
            setTimeout(function() {
                welcomeMessage.style.display = 'none';
            }, 6500);
        } else {
            welcomeMessage.style.display = 'none';
        }
    }
});

window.addEventListener('beforeunload', function() {
    var welcomeMessage = document.querySelector('.welcome__message');
    if (welcomeMessage) {
        welcomeMessage.style.animation = 'none';
    }
});