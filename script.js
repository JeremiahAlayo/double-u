const APPLICATION_FORM_URL = "";

const header = document.querySelector("[data-header]");
const menuButton = document.querySelector("[data-menu-button]");
const mobileNav = document.querySelector("[data-mobile-nav]");
const applyButton = document.querySelector("[data-apply-button]");
const applyNote = document.querySelector("[data-apply-note]");

const setHeaderState = () => {
  if (!header) return;
  header.classList.toggle("is-scrolled", window.scrollY > 24);
};

setHeaderState();
window.addEventListener("scroll", setHeaderState, { passive: true });

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
      "Application form link has not been added yet. Replace APPLICATION_FORM_URL in script.js before launch.";
    applyNote.classList.add("is-warning");
  }
});
