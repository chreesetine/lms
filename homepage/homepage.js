document.addEventListener('DOMContentLoaded', () => {
    const burger = document.querySelector('.burger');
    const navLinks = document.querySelector('.nav-links');
    const links = navLinks.querySelectorAll('a'); // Select all the links inside navLinks

    burger.addEventListener('click', () => {
        navLinks.classList.toggle('nav-active');
        burger.classList.toggle('toggle');
    });

    // Add event listeners to each nav link to close the navigation container when clicked
    links.forEach(link => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('nav-active');
            burger.classList.remove('toggle');
        });
    });
});


//scrolling effect
window.addEventListener('scroll', () => {
    const scroll = window.pageYOffset / (document.body.offsetHeight - window.innerHeight);
    const scaleValue = 0.5 + (scroll * 0.5); // Scale from 0.5 to 1 based on scroll position
    document.body.style.setProperty('--scale', scaleValue);
}, false);

//LOGIN FORM
const openForm = document.querySelector("#form_open"),
    home = document.querySelector(".home"),
    formContainer = document.querySelector(".form_container"),
    formClose = document.querySelector(".bx-x");

openForm.addEventListener("click", () => home.classList.add("show"))
formClose.addEventListener("click", () => home.classList.remove("show"))

//SCROLL
window.addEventListener('scroll', () => {
    document.body.style.setProperty('--scroll', window.pageYOffset / (document.body.offsetHeight - window.innerHeight));
}, false);

//LAUNDRY SERVICE FORM 1
document.addEventListener('DOMContentLoaded', (event) => {
    const service_form = document.getElementById("service_form");
    const openBtn = document.getElementById("openService");
    const closeBtn = document.getElementsByClassName("btnClose")[0];

    //open the service form
    openBtn.onclick = function () {
        service_form.style.display = "block";
    }

    //close the service form
    closeBtn.onclick = function () {
        service_form.style.display = "none";
    }

    //close it
    window.onclick = function (event) {
        if (event.target == service_form) {
            service_form.style.display = "none";
        }
    }
});