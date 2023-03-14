let navbar = document.querySelector("#navbar-index");
navbar.style.zIndex = -1;
let height = navbar.clientHeight;
console.log(height);

document.addEventListener("scroll", function () {
  let navbar = document.querySelector("#navbar-index");
  let height = navbar.clientHeight;
  if (window.pageYOffset > height + 100) {
    navbar.style.zIndex = 99999;
    navbar.classList.remove("navbar-none");
    navbar.classList.add("navbar-bg-white");
  } else {
    navbar.style.zIndex = -1;
    navbar.classList.remove("navbar-bg-white");
    navbar.classList.add("navbar-none");
  }
});

scrollToTop = document.querySelectorAll(".scroll-to-top");
scrollToTop.forEach((scroll) => {
  scroll.addEventListener("click", () => {
    window.scroll({ behavior: "smooth", top: 0 });
  });
});

let up = document.querySelector(".up");
document.addEventListener("scroll", () => {
  if (window.pageYOffset > 1900) {
    up.classList.add("d-block");
  } else {
    up.classList.remove("d-block");
  }
});
