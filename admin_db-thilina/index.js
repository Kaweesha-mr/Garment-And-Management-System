let btn = document.querySelector('#btn')
let sidebar = document.querySelector('.sidebar')

btn.onclick = function (){
    sidebar.classList.toggle('active');
};

// show greetings functions

function greeting(){

    var time = new Date().getHours;
    let massages;

    if (time < 12){
        massages = "Good Mornning";
    }
    else if (time < 18){
        massages = "Good afternoon";
    }
    else{
        massages = "Good evenning";
    }
    document.getElementById("massage").innerHTML = "Hi! " + massages;

}

greeting();

// end of greetings