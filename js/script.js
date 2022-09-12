let navdiv = document.querySelector(".navdiv")
let sideBar = document.querySelector("#sideBar")

navdiv.addEventListener("mouseenter", toggleDropdown)
navdiv.addEventListener("mouseleave", toggleDropdown)
sideBar.addEventListener("mouseenter", toggleDropdown)
sideBar.addEventListener("mouseleave", toggleDropdown)


let dropdown = document.getElementById("sideBar");

function toggleDropdown() {
    if (dropdown.style.height === "50%") {
        dropdown.style.height = "0";
    } else {
        dropdown.style.height = "50%";
        dropdown.style.display = "block";
    }
}

document.querySelectorAll(".modal").forEach(el => {
    el.addEventListener("click", evt => {
        if (evt.target.classList.contains("modal")) evt.target.style.display = "none"
    })
})