  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }

  // Toon de knop wanneer de gebruiker naar beneden scrolt
  window.onscroll = function() {
    const btn = document.getElementById("scrollTopBtn");
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      btn.style.display = "flex";
    } else {
      btn.style.display = "none";
    }
  };
