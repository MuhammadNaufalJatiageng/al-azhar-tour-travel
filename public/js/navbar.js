let nav = document.getElementById("navbar");
let navItem = document.querySelectorAll("a.nav-link");

window.onscroll = function () {
  if (document.documentElement.scrollTop > 5) {
    nav.classList.add("bg-black95");
  } else {
    nav.classList.remove("bg-black95");
  }
};
