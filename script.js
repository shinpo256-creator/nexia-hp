const menu = document.getElementById("menu");
const menuBtn = document.getElementById("menuBtn");
const closeBtn = document.getElementById("closeBtn");
const overlay = document.getElementById("overlay");

menuBtn.addEventListener("click", () => {
    menu.classList.add("open");
    overlay.classList.add("active");
});

closeBtn.addEventListener("click", () => {
    menu.classList.remove("open");
    overlay.classList.remove("active");
});

overlay.addEventListener("click", () => {
    menu.classList.remove("open");
    overlay.classList.remove("active");
});

document.querySelectorAll(".menu a").forEach(link => {
    link.addEventListener("click", () => {
        menu.classList.remove("open");
        overlay.classList.remove("active");
    });
});

