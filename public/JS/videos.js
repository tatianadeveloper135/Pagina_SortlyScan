function filtrar(categoria) {
  const videos = document.querySelectorAll('.video');
  videos.forEach(video => {
    if (categoria === 'todos' || video.classList.contains(categoria)) {
      video.style.display = 'block';
    } else {
      video.style.display = 'none';
    }
  });
}

document.getElementById('busqueda').addEventListener('input', function () {
  const input = this.value.toLowerCase();
  const videos = document.querySelectorAll('.video');

  videos.forEach(video => {
    const texto = video.innerText.toLowerCase();
    if (texto.includes(input)) {
      video.style.display = 'block';
    } else {
      video.style.display = 'none';
    }
  });
});