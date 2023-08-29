
const links = document.querySelectorAll(".navbar-link .btn-dropdown");
const dropdown = document.querySelectorAll(".navbar-link ul");
const users =document.querySelector(".user-info");
const submenu = document.querySelector(".sub-info ul");
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
users.addEventListener('click', ()=>{
   submenu.classList.toggle("open");
   console.log('ok');
});

