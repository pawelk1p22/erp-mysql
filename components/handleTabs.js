const tabTriggers = document.querySelectorAll(".tab-trigger");
const tabContents = document.querySelectorAll(".tab-content");

tabTriggers.forEach((trigger, index) => {
  trigger.addEventListener("click", () => {
    tabContents.forEach((tab) => {
      tab.style.display = "none";
    });

    tabContents[index].style.display = "block";
  });
});

tabContents.forEach((tab) => {
  tab.style.display = "none";
});
