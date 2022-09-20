let navdiv = document.querySelector(".navdiv")
let sideBar = document.querySelector("#sideBar")
let loginorregister = document.querySelector("#loginorRegister")
let loginbutton = document.querySelector(".loginbutton")
let registerbutton = document.querySelector(".registerbutton")

navdiv.addEventListener("mouseenter", toggleDropdown)
navdiv.addEventListener("mouseleave", toggleDropdown)
sideBar.addEventListener("mouseenter", toggleDropdown)
sideBar.addEventListener("mouseleave", toggleDropdown)


let dropdown = document.getElementById("sideBar");

function toggleDropdown() {
    if (dropdown.style.height === "30%") {
        dropdown.style.height = "0";
    } else {
        dropdown.style.height = "30%";
        dropdown.style.display = "block";
    }
}

function toggleLogIn(){
    if (loginorregister.style.display === "block") {
        loginorregister.style.display = "none";
        loginbutton.style.display = "none";
        registerbutton.style.display = "none";
    } else {
        loginorregister.style.display = "block";
        loginorregister.style.display = "block";
        loginbutton.style.display = "inline-block";
        registerbutton.style.display = "inline-block";
    }
}

document.querySelectorAll(".modal").forEach(el => {
    el.addEventListener("click", evt => {
        if (evt.target.classList.contains("modal")) evt.target.style.display = "none"
    })
})