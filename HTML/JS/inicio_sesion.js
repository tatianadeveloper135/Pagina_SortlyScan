function redirectToMenu(event) {
      event.preventDefault();

      const username = document.getElementById("usuario").value;
      const password = document.getElementById("contrasena").value;

      
      if (username === "admin" && password === "1234") {
        window.location.href = "menu.html";
      } else {
        alert("Credenciales incorrectas. Inténtalo de nuevo.");
      }
    }