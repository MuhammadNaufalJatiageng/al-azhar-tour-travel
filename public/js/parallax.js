document.addEventListener("scroll", function () {
    const scrollPosition = window.scrollY;

    document.getElementById("parallax-img").style.transform = `translateY(-${
        scrollPosition * 0.15
    }px)`;
});
