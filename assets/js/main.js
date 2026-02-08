const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

const revealElements = document.querySelectorAll(".fade-up");
if (!prefersReducedMotion && revealElements.length > 0) {
  const revealObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          revealObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.2 }
  );

  revealElements.forEach((element) => revealObserver.observe(element));
} else {
  revealElements.forEach((element) => element.classList.add("visible"));
}

const counters = document.querySelectorAll("[data-count]");
if (counters.length > 0) {
  const counterObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const target = entry.target;
          const endValue = Number(target.dataset.count);
          const suffix = target.dataset.suffix || "";
          const duration = 1200;
          const startTime = performance.now();

          const updateCounter = (currentTime) => {
            const progress = Math.min((currentTime - startTime) / duration, 1);
            const value = Math.floor(progress * endValue);
            target.textContent = `${value}${suffix}`;
            if (progress < 1) {
              requestAnimationFrame(updateCounter);
            } else {
              target.textContent = `${endValue}${suffix}`;
            }
          };

          if (prefersReducedMotion) {
            target.textContent = `${endValue}${suffix}`;
          } else {
            requestAnimationFrame(updateCounter);
          }
          counterObserver.unobserve(target);
        }
      });
    },
    { threshold: 0.6 }
  );

  counters.forEach((counter) => counterObserver.observe(counter));
}

const contactForm = document.querySelector("[data-contact-form]");
if (contactForm) {
  const messageBox = document.querySelector("[data-form-message]");
  const emailInput = contactForm.querySelector("input[type=\"email\"]");
  const contactEmails = contactForm.dataset.contactEmails || "";

  contactForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const requiredFields = contactForm.querySelectorAll("[required]");
    let hasError = false;

    requiredFields.forEach((field) => {
      if (!field.value.trim()) {
        field.setAttribute("aria-invalid", "true");
        hasError = true;
      } else {
        field.removeAttribute("aria-invalid");
      }
    });

    const emailValue = emailInput.value.trim();
    const emailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue);

    if (!emailValid) {
      emailInput.setAttribute("aria-invalid", "true");
      hasError = true;
    }

    if (hasError) {
      messageBox.textContent = "Merci de compléter les champs requis avec un email valide.";
      messageBox.style.color = "#b42318";
      return;
    }

    const nameValue = contactForm.querySelector("#name")?.value.trim() || "";
    const subjectValue = contactForm.querySelector("#subject")?.value.trim() || "";
    const messageValue = contactForm.querySelector("#message")?.value.trim() || "";
    const recipients = contactEmails || emailInput.value.trim();

    const subject = encodeURIComponent(`[Contact 3D] ${subjectValue || "Demande de contact"}`);
    const body = encodeURIComponent(
      `Nom: ${nameValue}\nEmail: ${emailValue}\nSujet: ${subjectValue}\n\nMessage:\n${messageValue}`
    );

    if (recipients) {
      window.location.href = `mailto:${recipients}?subject=${subject}&body=${body}`;
    }

    messageBox.textContent = "Merci, on revient vers vous rapidement.";
    messageBox.style.color = "#265738";
    contactForm.reset();
  });
}
