const header = document.querySelector("header");
const goUp = document.querySelector(".btn-go-up");
const loader = document.querySelector(".loader");

jQuery(document).ready(function () {
  $(".dropdown").hover(
    function () {
      $(".dropdown-menu", this).fadeIn("fast");
    },
    function () {
      $(".dropdown-menu", this).fadeOut("fast");
    }
  );
});

$(document).ready(function () {
  $("#employer").owlCarousel({
    loop: true,
    nav: true,
    rtl: true,
    autoplay: true,
    margin: 10,
    smartspeed: 1000,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
  });
  $(".counter").counterUp({
    delay: 10,
    time: 1000,
  });
});

window.addEventListener("scroll", () => {
  header.style.opacity = 1 - window.pageYOffset / 600;

  if (window.pageYOffset > 200) {
    goUp.classList.add("hide");
  } else {
    goUp.classList.remove("hide");
  }
});

window.addEventListener("load", () => {
  loader.classList += " showloader";
});

console.log("ok");
