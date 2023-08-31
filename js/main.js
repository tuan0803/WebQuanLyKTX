
const links = document.querySelectorAll(".navbar-link .btn-dropdown");
const dropdown = document.querySelectorAll(".navbar-link ul");
const users =document.querySelector(".user-info img");
const submenu = document.querySelector(".sub-info");
const menu =  document.querySelector(".wrapper")
const menu_icon = document.querySelector(".navbar__icon")
const menuButton=document.querySelector(".navbar__icons")
const logo=document.querySelector(".logo-nav")
const notifi=document.querySelector(".nav-notifi")
const open_notifi=document.querySelector(".sub-notifis")
const message=document.querySelector(".message-box")
const open_message=document.querySelector(".message-menus")

dropdown.forEach((element) => {
  const height = element.offsetHeight;
  element.style.marginTop = `${-height}px`;
});

links.forEach((link) => {
  link.addEventListener("click", function (e) {
    const target = e.currentTarget;
    const ele = target.nextElementSibling;

    dropdown.forEach((element) => {
      if (element !== ele) {
        element.previousElementSibling.classList.remove("active");
        element.classList.remove("dropdown");
      }
    });
    target.classList.toggle("active");
    ele.classList.toggle("dropdown");
  });
});
menu_icon.addEventListener('click', ()=>{
  menuButton.classList.toggle("open-icon");
  menu.classList.toggle("turn_on");
  logo.classList.toggle("turn_off");
});
users.addEventListener('click', ()=>{
   submenu.classList.toggle("open");
});
notifi.addEventListener('click', ()=>{
  open_notifi.classList.toggle("open_notifi");
});
message.addEventListener('click', ()=>{
  open_message.classList.toggle("open_message");
});
