function konfirmasiHapus(url, nama) {
  if (confirm('Yakin ingin menghapus "' + nama + '"?')) {
    window.location.href = url;
  }
}

// Auto-hide alert setelah 3 detik
document.addEventListener('DOMContentLoaded', function () {
  const alerts = document.querySelectorAll('.alert');
  alerts.forEach(function (el) {
    setTimeout(function () {
      el.style.transition = 'opacity .5s';
      el.style.opacity = '0';
      setTimeout(() => el.remove(), 500);
    }, 3000);
  });

  // Tandai menu aktif sesuai URL
  const links = document.querySelectorAll('.sidebar nav a');
  links.forEach(function (link) {
    if (window.location.href.indexOf(link.getAttribute('href')) !== -1) {
      link.classList.add('active');
    }
  });
});