hamburger.addEventListener("click", () => {
    navLinks.classList.toggle("active");
});
const toggleButton = document.getElementById("dark-mode-toggle");

toggleButton.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
    document.querySelector("nav").classList.toggle("dark-mode");

    const links = document.querySelectorAll("a");
    links.forEach((link) => link.classList.toggle("dark-mode"));

    ent.querySelector("footer").classList.toggle("dark-mode");
});

function toggleContent(contentId) {
    const content = document.getElementById(contentId);
    if (content.style.display === "none" || content.style.display === "") {
        content.style.display = "block";
    } else {
        content.style.display = "none";
    }
}