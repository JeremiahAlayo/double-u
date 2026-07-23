const APPLICATION_FORM_URL = "https://docs.google.com/forms/d/e/1FAIpQLSexspXmDF1F4tevz4qjRqpaMB-zgbJU-cqYG6qmxqa-KMVeWA/viewform";

const header = document.querySelector("[data-header]");
const menuButton = document.querySelector("[data-menu-button]");
const mobileNav = document.querySelector("[data-mobile-nav]");
const applyButton = document.querySelector("[data-apply-button]");
const applyNote = document.querySelector("[data-apply-note]");
const stickyApply = document.querySelector(".sticky-apply");

const setHeaderState = () => {
  if (!header) return;
  header.classList.toggle("is-scrolled", window.scrollY > 24);
};

const setStickyApplyState = () => {
  if (!stickyApply) return;
  const hero = document.querySelector(".hero");
  const triggerPoint = hero ? hero.offsetHeight * 0.72 : 520;
  stickyApply.classList.toggle("is-visible", window.scrollY > triggerPoint);
};

setHeaderState();
setStickyApplyState();
window.addEventListener("scroll", () => {
  setHeaderState();
  setStickyApplyState();
}, { passive: true });

menuButton?.addEventListener("click", () => {
  const isOpen = mobileNav?.classList.toggle("is-open");
  document.body.classList.toggle("menu-open", Boolean(isOpen));
  header?.classList.toggle("menu-active", Boolean(isOpen));
  menuButton.setAttribute("aria-label", isOpen ? "Close menu" : "Open menu");
});

mobileNav?.querySelectorAll("a").forEach((link) => {
  link.addEventListener("click", () => {
    mobileNav.classList.remove("is-open");
    document.body.classList.remove("menu-open");
    header?.classList.remove("menu-active");
    menuButton?.setAttribute("aria-label", "Open menu");
  });
});

applyButton?.addEventListener("click", () => {
  if (APPLICATION_FORM_URL) {
    window.open(APPLICATION_FORM_URL, "_blank", "noopener,noreferrer");
    return;
  }

  if (applyNote) {
    applyNote.textContent =
      "The application form is currently unavailable. Please try again later.";
    applyNote.classList.add("is-warning");
  }
});

