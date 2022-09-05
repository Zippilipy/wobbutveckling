let navdiv = document.querySelector(".navdiv")

navdiv.addEventListener("mouseenter", toggleDropdown)
navdiv.addEventListener("mouseleave", toggleDropdown)


let dropdown = document.getElementById("sideBar");
function toggleDropdown() {
    if (dropdown.style.height === "50%") {
        dropdown.style.height = "0";
    } else {
        dropdown.style.height = "50%";
    }
}