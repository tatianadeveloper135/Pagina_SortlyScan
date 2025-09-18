/* function redirectToMenu(event) {
      event.preventDefault();

      const username = document.getElementById("usuario").value;
      const password = document.getElementById("contrasena").value;

      
      if (username === "admin" && password === "1234") {
        window.location.href = "menu.html";
      } else {
        alert("Credenciales incorrectas. Inténtalo de nuevo.");
      }

      
    } */


    document.addEventListener('DOMContentLoaded', () => {

    verificarSesion();

    //const btn = document.getElementById('btnLogin');
    //btn.addEventListener("click", login);

    const form = document.getElementById('form_login');
    //const mensaje = document.getElementById('mensaje');
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
                
                mensaje.innerText = result.error || 'Ops, parece que ha ocurrido un error';
            }
        } catch (error) {
            
        }
    });
});