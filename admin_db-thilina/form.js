//add employee button

let btn1 = document.querySelector('#addEmp')
let popups = document.querySelector('.form-first')

btn1.onclick = function (){
    popups.classList.toggle('active');
};

//form close button

let btn2 = document.querySelector('.cancel')
let close = document.querySelector('.form-first')

btn2.onclick = function (){
    close.classList.remove('active');
};