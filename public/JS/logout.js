
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('btnCerrarSesion')
    btn.addEventListener('click', logout);

});



async function logout() {

    await fetch('../auth/logout.php');
    window.location.href = 'inicio_sesion.php';
}