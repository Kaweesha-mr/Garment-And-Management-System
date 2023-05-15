const sidemenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");

// showing the sidebar
menuBtn.addEventListener('click',() =>{
    sidemenu.style.display ='block';
})

//closing the sidebar
closeBtn.addEventListener('click', () =>{
    sidemenu.style.display='none';
})

//changing the theme dark or light mode
themeToggler.addEventListener('click', () =>{
    document.body.classList.toggle('dark-theme-variables');
})