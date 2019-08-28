function move() {
    const moveForm = document.getElementById('moveable');
    const loginForm = document.getElementById('login_form');
    const regForm = document.getElementById('register_form');
    moveForm.style.transform = ('translateX(95%)')
    regForm.setAttribute('class', 'inactive');
    loginForm.setAttribute('class', 'form_data');
    loginForm.classList.add('animation');
};

function moveBack() {
    const moveFormB = document.getElementById('moveable');
    const regForm = document.getElementById('register_form');
    const loginForm = document.getElementById('login_form');
    moveFormB.style.transform = ('translateX(5%)')
    regForm.setAttribute('class', 'form_data');
    regForm.classList.add('animation');
    loginForm.setAttribute('class', 'inactive');
};

function displRegMob() {
    const regForm = document.getElementById('register_form_mobile');
    const logForm = document.getElementById('login_form_mobile');
    regForm.setAttribute('class', 'form_data');
    logForm.setAttribute('class', 'inactive');
};

function displLogMob() {
    const regForm = document.getElementById('register_form_mobile');
    const logForm = document.getElementById('login_form_mobile');
    regForm.setAttribute('class', 'inactive');
    logForm.setAttribute('class', 'form_data');
};
