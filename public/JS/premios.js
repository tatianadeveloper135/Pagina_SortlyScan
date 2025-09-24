function calculateKg() {
  const paper = parseFloat(document.getElementById("paper").value) || 0;
  const plastic = parseFloat(document.getElementById("plastic").value) || 0;
  const glass = parseFloat(document.getElementById("glass").value) || 0;
  const metal = parseFloat(document.getElementById("metal").value) || 0;
  const organic = parseFloat(document.getElementById("organic").value) || 0;
  const electronics =
    parseInt(document.getElementById("electronics").value) || 0;

  let kg = 0;

  kg = paper + plastic + glass + metal + organic + electronics;

  return Math.round(kg);
}

// Funcionalidad para calcular puntuación
function calculateScore() {
  const paper = parseFloat(document.getElementById("paper").value) || 0;
  const plastic = parseFloat(document.getElementById("plastic").value) || 0;
  const glass = parseFloat(document.getElementById("glass").value) || 0;
  const metal = parseFloat(document.getElementById("metal").value) || 0;
  const organic = parseFloat(document.getElementById("organic").value) || 0;
  const electronics =
    parseInt(document.getElementById("electronics").value) || 0;

  const peopleEducated =
    parseInt(document.getElementById("peopleEducated").value) || 0;
  const cleanupEvents =
    parseInt(document.getElementById("cleanupEvents").value) || 0;
  const consecutiveDays =
    parseInt(document.getElementById("consecutiveDays").value) || 0;
  const reuseProjects =
    parseInt(document.getElementById("reuseProjects").value) || 0;

  // Fórmula de puntuación
  let score = 0;

  // Puntos por materiales reciclados (diferentes valores por tipo)
  score += paper * 10; // 10 puntos por kg de papel
  score += plastic * 15; // 15 puntos por kg de plástico
  score += glass * 8; // 8 puntos por kg de vidrio
  score += metal * 20; // 20 puntos por kg de metal
  score += organic * 5; // 5 puntos por kg de orgánicos
  score += electronics * 25; // 25 puntos por electrónico

  // Puntos por actividades adicionales
  score += peopleEducated * 5; // 5 puntos por persona educada
  score += cleanupEvents * 100; // 100 puntos por evento organizado
  score += consecutiveDays * 2; // 2 puntos por día consecutivo
  score += reuseProjects * 50; // 50 puntos por proyecto de reutilización

  // Bonus por diversidad de materiales
  const materialsCount = [paper, plastic, glass, metal, organic].filter(
    (x) => x > 0
  ).length;
  if (materialsCount >= 4) score += 200; // Bonus por reciclar 4+ tipos
  else if (materialsCount >= 3) score += 100; // Bonus por reciclar 3+ tipos

  return Math.round(score);
}

async function cargarUsuario() {
  const response = await fetch("../auth/session.php");
  const data = await response.json();

  if (data.usuario) {
    document.getElementById("identificador").value = data.usuario.id;
  } else {
    window.location.href = "inicio_sesion.php";
  }
}

// Event listeners para el formulario
document.getElementById("calculateBtn").addEventListener("click", function () {
  const score = calculateScore();
  const kg = calculateKg();
  cargarUsuario();
  document.getElementById("scoreInput").value = score; // Guardar en el input oculto
  document.getElementById("kg").value = kg;
  document.getElementById("calculatedScore").textContent = score.toLocaleString();

  // Animación del número
  const scoreElement = document.getElementById("calculatedScore");
  scoreElement.style.transform = "scale(1.2)";
  scoreElement.style.color = "#059669";
  setTimeout(() => {
    scoreElement.style.transform = "scale(1)";
    scoreElement.style.color = "#059669";
  }, 300);
});

// Calcular puntuación automáticamente cuando cambian los valores
const inputs = document.querySelectorAll('#rankingForm input[type="number"]');
inputs.forEach((input) => {
  input.addEventListener("input", function () {
    const score = calculateScore();
    document.getElementById("calculatedScore").textContent =
      score.toLocaleString();
  });
});

// Manejar envío del formulario
document.getElementById("rankingForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const fullName = document.getElementById("fullName").value;
  const email = document.getElementById("email").value;
  const city = document.getElementById("city").value;
  const category = document.getElementById("category").value;
  const score = calculateScore();

  if (!fullName || !email || !city) {
    alert(
      "⚠️ Por favor completa todos los campos obligatorios (nombre, email y ciudad)."
    );
    return;
  }

  if (score === 0) {
    alert(
      "⚠️ Debes ingresar al menos algunos datos de reciclaje para participar en el ranking."
    );
    return;
  }

  // Simular envío exitoso
  alert(
    `🎉 ¡Felicidades ${fullName}! Tu información ha sido enviada exitosamente.\n\n` +
      `📊 Tu puntuación: ${score.toLocaleString()} puntos\n` +
      `🏆 Categoría: ${category}\n` +
      `📍 Ciudad: ${city}\n\n` +
      `¡Pronto aparecerás en nuestro ranking! Te enviaremos un email de confirmación.`
  );

  // Limpiar formulario
  this.reset();
  document.getElementById("calculatedScore").textContent = "0";
});

// Funcionalidad para los botones de certificados y detalles
document.querySelectorAll("button").forEach((button) => {
  button.addEventListener("click", function () {
    const buttonText = this.textContent.trim();

    if (buttonText === "Ver Certificado") {
      alert(
        "🏆 Certificado verificado y disponible para descarga. ¡Felicidades por este reconocimiento!"
      );
    } else if (buttonText === "Detalles") {
      alert(
        "📋 Mostrando detalles completos del premio. Información adicional sobre criterios y proceso de selección."
      );
    } else if (buttonText === "Comenzar Ahora") {
      alert(
        "🚀 ¡Excelente! Te dirigiremos a la página de registro para comenzar tu viaje hacia un futuro más sostenible."
      );
    } else if (buttonText === "Saber Más") {
      alert(
        "📚 Descubre más sobre nuestros programas, metodología y cómo puedes hacer la diferencia."
      );
    } else if (buttonText === "Ver Ranking Completo →") {
      alert(
        "📊 Mostrando el ranking completo con todos los participantes y sus puntuaciones detalladas."
      );
    }
  });
});

// Animación adicional para las tarjetas de premios
const observerOptions = {
  threshold: 0.1,
  rootMargin: "0px 0px -50px 0px",
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = "1";
      entry.target.style.transform = "translateY(0)";
    }
  });
}, observerOptions);

document.querySelectorAll(".award-card").forEach((card) => {
  card.style.opacity = "0";
  card.style.transform = "translateY(20px)";
  card.style.transition = "opacity 0.6s ease, transform 0.6s ease";
  observer.observe(card);
});
(function () {
  function c() {
    var b = a.contentDocument || a.contentWindow.document;
    if (b) {
      var d = b.createElement("script");
      d.innerHTML =
        "window.__CF$cv$params={r:'96dd4c4424a5c8e4',t:'MTc1NDk3MzY2MC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
      b.getElementsByTagName("head")[0].appendChild(d);
    }
  }
  if (document.body) {
    var a = document.createElement("iframe");
    a.height = 1;
    a.width = 1;
    a.style.position = "absolute";
    a.style.top = 0;
    a.style.left = 0;
    a.style.border = "none";
    a.style.visibility = "hidden";
    document.body.appendChild(a);
    if ("loading" !== document.readyState) c();
    else if (window.addEventListener)
      document.addEventListener("DOMContentLoaded", c);
    else {
      var e = document.onreadystatechange || function () {};
      document.onreadystatechange = function (b) {
        e(b);
        "loading" !== document.readyState &&
          ((document.onreadystatechange = e), c());
      };
    }
  }
})();
