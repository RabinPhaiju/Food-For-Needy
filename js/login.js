const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
    container.classList.remove("right-panel-active-forget");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});

function forget() {
    container.classList.add("right-panel-active-forget");
    container.classList.add("right-panel-active");
}

function slide() {
    container.classList.add("right-panel-active");
}