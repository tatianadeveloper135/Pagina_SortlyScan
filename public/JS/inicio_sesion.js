document.addEventListener('DOMContentLoaded', () => {

    //verificarSesion();

    //const btn = document.getElementById('btnLogin');
    //btn.addEventListener("click", login);

    const form = document.getElementById('form_login');

    form.addEventListener('submit', async (e) => {
        e.preventDefault(); // Evita la recarga
        const formData = new FormData(form);

        try {
            const response = await fetch('../auth/login.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.usuario) {
                
                
                    window.location.href = "menu.php";
                
          
                

            } else {
                alert(result.error || 'Ops, parece que ha ocurrido un error');
            }
        } catch (error) {
            alert('Ocurrió un error de conexión' + error);
        }
    });
});