let category = document.querySelector("#category");
let volume = document.querySelector("#volume");
let hlCheck = document.querySelector(".highlight");
let comicInput = document.querySelector("#comic");
let theme = document.querySelector("#theme");

let coverInput = document.querySelector("#cover");
let inputHighlight = document.querySelector("input#highlight-input");

if ((category.value = 1)) {
	volume.setAttribute("disabled", "disabled");

	hlCheck.setAttribute("disabled", "disabled");

	comicInput.setAttribute("disabled", "disabled");

	coverInput.setAttribute("disabled", "disabled");

	theme.setAttribute("disabled", "disabled");
}

category.addEventListener("click", function () {
	if (category.value == "1") {
		volume.setAttribute("disabled", "disabled");

		hlCheck.setAttribute("disabled", "disabled");

		comicInput.setAttribute("disabled", "disabled");

		coverInput.setAttribute("disabled", "disabled");

		theme.setAttribute("disabled", "disabled");
	} else {
		volume.removeAttribute("disabled");

		hlCheck.removeAttribute("disabled");
	}
});

inputHighlight.addEventListener("click", function () {
	if (inputHighlight.checked == true) {
		comicInput.removeAttribute("disabled");

		coverInput.removeAttribute("disabled");

		theme.removeAttribute("disabled", "disabled");
	} else {
		theme.setAttribute("disabled", "disabled");

		comicInput.setAttribute("disabled", "disabled");

		coverInput.setAttribute("disabled", "disabled");
	}
});
