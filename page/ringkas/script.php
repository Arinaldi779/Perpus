<script>
const password = document.getElementById('password');
const toggle = document.getElementById('toggle');

function showHide() {
    if (password.type === 'password') {
        password.setAttribute('type', 'text');
        toggle.classList.add('hide')
    } else {
        password.setAttribute('type', 'password');
        toggle.classList.remove('hide')
    }
}
const passwordd = document.getElementById('passwordd');
const togglee = document.getElementById('togglee');

function showHidee() {
    if (passwordd.type === 'password') {
        passwordd.setAttribute('type', 'text');
        togglee.classList.add('hide')
    } else {
        passwordd.setAttribute('type', 'password');
        togglee.classList.remove('hide')
    }
}
</script>