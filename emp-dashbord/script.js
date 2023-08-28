const themeToggler = document.querySelector(".theme-toggler");

// theme 

themeToggler.addEventListener('click',()=>{

    document.body.classList.toggle('dark-theme-variables');
})


function lightmode(){
    //remove class active
    document.querySelector('.light').classList.add('active');
    document.querySelector('.dark').classList.remove('active');
}
function darkmode(){
    //remove class active
    document.querySelector('.dark').classList.add('active');
    document.querySelector('.light').classList.remove('active');
  }

//add dark mode till 5.00 pm to 7am
