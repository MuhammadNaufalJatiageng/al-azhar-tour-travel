let nav = document.getElementById("navbar");
let navItem = document.querySelectorAll("a.nav-link");
let logo = document.getElementById("logo");
let navBtn = document.querySelector("#nav-btn");

navBtn.addEventListener("click", () => {
    if (!nav.classList.contains("bg-black95")) {
        nav.classList.add("bg-black95");
        logo.classList.remove("d-none");
    }
});

window.onscroll = function () {
    if (document.documentElement.scrollTop > 5) {
        nav.classList.add("bg-black95");
        logo.classList.remove("d-none");
    } else {
        nav.classList.remove("bg-black95");
        logo.classList.add("d-none");
    }
};
