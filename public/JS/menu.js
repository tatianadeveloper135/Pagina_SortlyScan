
document.addEventListener("DOMContentLoaded", () => {
    
    cargarUsuario();

});

async function cargarUsuario() {
    const response = await fetch('../auth/session.php');
    const data = await response.json();
    
    if (data.usuario) {

        document.getElementById('usuarioNombre').innerText = data.usuario.nombre;
    } else {
        window.location.href = 'inicio_sesion.php';
    }
};


