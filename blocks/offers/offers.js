const swicherOffer = document.querySelector("#swicher");

swicherOffer.addEventListener("click", () => {
  if (swicherOffer.checked == true) {
    document.querySelector("#offer2").classList.add("active");
    document.querySelector("#offer1").classList.remove("active");
  } else {
    document.querySelector("#offer1").classList.add("active");
    document.querySelector("#offer2").classList.remove("active");
  }
});
