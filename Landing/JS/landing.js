//navigation-bar effecrs on scroll

window.addEventListener("scroll" , function(){
  const header =  document.querySelector("header");
  header.classList.toggle("sticky",window.scrollY > 0);
  
});