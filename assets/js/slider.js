const slider = document.querySelector("[data-slider]");

if (slider) {
  const track = slider.querySelector("[data-slider-track]");
  const slides = Array.from(track.children);
  const prevButton = slider.querySelector("[data-slider-prev]");
  const nextButton = slider.querySelector("[data-slider-next]");
  const dotsContainer = slider.querySelector("[data-slider-dots]");
  const autoplayToggle = slider.querySelector("[data-slider-autoplay]");
  let currentIndex = 0;
  let autoplayId = null;
  let isAutoplaying = true;

  const updateSlidePosition = () => {
    track.style.transform = `translateX(-${currentIndex * 100}%)`;
    dotsContainer.querySelectorAll("button").forEach((dot, index) => {
      dot.setAttribute("aria-current", index === currentIndex ? "true" : "false");
    });
  };

  const goToSlide = (index) => {
    currentIndex = (index + slides.length) % slides.length;
    updateSlidePosition();
  };

  const nextSlide = () => goToSlide(currentIndex + 1);
  const prevSlide = () => goToSlide(currentIndex - 1);

  const startAutoplay = () => {
    if (autoplayId) return;
    autoplayId = window.setInterval(nextSlide, 5000);
    isAutoplaying = true;
    autoplayToggle.textContent = "Pause";
    autoplayToggle.setAttribute("aria-pressed", "true");
  };

  const stopAutoplay = () => {
    if (!autoplayId) return;
    window.clearInterval(autoplayId);
    autoplayId = null;
    isAutoplaying = false;
    autoplayToggle.textContent = "Lecture";
    autoplayToggle.setAttribute("aria-pressed", "false");
  };

  slides.forEach((_, index) => {
    const dot = document.createElement("button");
    dot.className = "slider-dot";
    dot.type = "button";
    dot.setAttribute("aria-label", `Aller à la diapositive ${index + 1}`);
    dot.setAttribute("aria-current", index === 0 ? "true" : "false");
    dot.addEventListener("click", () => goToSlide(index));
    dotsContainer.appendChild(dot);
  });

  prevButton.addEventListener("click", prevSlide);
  nextButton.addEventListener("click", nextSlide);
  autoplayToggle.addEventListener("click", () => {
    if (isAutoplaying) {
      stopAutoplay();
    } else {
      startAutoplay();
    }
  });

  slider.addEventListener("keydown", (event) => {
    if (event.key === "ArrowLeft") {
      prevSlide();
    }
    if (event.key === "ArrowRight") {
      nextSlide();
    }
  });

  startAutoplay();
}
