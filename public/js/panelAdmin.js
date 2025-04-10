let arrow = document.querySelectorAll(".arrow");
arrow.forEach((item) => {
  item.addEventListener("click", (e) => {
    let arrowParent = e.target.parentElement.parentElement.parentElement;
    // console.log(arrowParent);
    arrowParent.classList.toggle("showMenu");
  });
});
const domain = window.location.href;

fetch(domain + "/dataChart")
  .then((response) => response.json())
  .then((data) => {
    let labels = data.map((item) => item.label);
    let values = data.map((item) => item.value);
    let barColors = data.map((item) => item.barColors);
    new Chart("myChart", {
      type: "bar",
      data: {
        labels: labels,
        datasets: [
          {
            backgroundColor: barColors,
            data: values,
          },
        ],
      },
      options: {
        legend: { display: false },
        title: {
          display: true,
          text: "نمودار لحضه ای ",
        },
      },
    });
  });

const spanCheckOnline = document.querySelector(".checkOnline");
window.addEventListener("load", () => {
  if (navigator.onLine) {
    spanCheckOnline.textContent = "آنلاین";
  } else {
    spanCheckOnline.textContent = "آفلاین";
  }
});
