let jenisContent = document.querySelector("#jenis_content");
let volume = document.querySelector("#volume");
let hlCheck = document.querySelector(".highlight");
let comicInput = document.querySelector("#comic");
let tema = document.querySelector("#tema");

let coverInput = document.querySelector("#cover");
let inputHighlight = document.querySelector("input#highlight-input");

console.log(tema);

if ((jenisContent.value = 1)) {
  volume.setAttribute("disabled", "disabled");

  hlCheck.setAttribute("disabled", "disabled");

  comicInput.setAttribute("disabled", "disabled");

  coverInput.setAttribute("disabled", "disabled");

  tema.setAttribute("disabled", "disabled");
}

jenisContent.addEventListener("click", function () {
  if (jenisContent.value == "1") {
    volume.setAttribute("disabled", "disabled");

    hlCheck.setAttribute("disabled", "disabled");

    comicInput.setAttribute("disabled", "disabled");

    coverInput.setAttribute("disabled", "disabled");

    tema.setAttribute("disabled", "disabled");
  } else {
    volume.removeAttribute("disabled");

    hlCheck.removeAttribute("disabled");
  }
});

inputHighlight.addEventListener("click", function () {
  if (inputHighlight.checked == true) {
    comicInput.removeAttribute("disabled");

    coverInput.removeAttribute("disabled");

    tema.removeAttribute("disabled", "disabled");
  } else {
    tema.setAttribute("disabled", "disabled");

    comicInput.setAttribute("disabled", "disabled");

    coverInput.setAttribute("disabled", "disabled");
  }
});
