let btnGoProject = document.getElementById('btn_goProject');
let registrationDialog = document.getElementById('registration');
let authDialog = document.getElementById('auth');
let modalBackdrop = document.getElementById('modalBackdrop');
let goAuthBtn = document.getElementById('goAuth');
let goRegBtn = document.getElementById('goReg');
let otherButtonGoProject = document.getElementById('getStarted')
let otherButtonGoProjects = document.getElementById('getStarted1')

let openModal = (modal) => {
    modal.classList.add('open');
    modalBackdrop.classList.add('open');
};

let closeModal = (modal) => {
    modal.classList.remove('open');
    modalBackdrop.classList.remove('open');
};

btnGoProject.addEventListener('click', () => openModal(registrationDialog));
otherButtonGoProject.addEventListener('click', () => openModal(registrationDialog));
otherButtonGoProjects.addEventListener('click', () => openModal(registrationDialog));

goAuthBtn.addEventListener('click', () => {
    closeModal(registrationDialog);
    openModal(authDialog);
});

goRegBtn.addEventListener('click', () => {
    closeModal(authDialog);
    openModal(registrationDialog);
});

modalBackdrop.addEventListener('click', () => {
    closeModal(registrationDialog);
    closeModal(authDialog);
});

document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch('register.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        if (data.includes('Регистрация успешна')) {
            closeModal(registrationDialog);
            openModal(authDialog);
        }
    })
    .catch(error => console.error('Error:', error));
});

let specificAnchors = document.querySelectorAll('a[href="#about_us"], a[href="#howtouse"], a[href="#advantages"]');

specificAnchors.forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        let targetId = this.getAttribute('href').substring(1);
        let targetElement = document.getElementById(targetId);

        targetElement.scrollIntoView({
            behavior: 'smooth'
        });
    });
});
// alert('hi')