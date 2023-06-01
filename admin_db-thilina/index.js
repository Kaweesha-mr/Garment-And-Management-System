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


//date function
function dayname(){

    const days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

    var t = new Date();
    let dname = days[t.getDay()];

   document.getElementById("day").innerHTML = "Today is " + dname;
}

dayname();
// end of date function

//date function
function date(){

    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    var d = new Date();
    let todayNo = d.getDate();
    let month = months[d.getMonth()];
    let year = d.getFullYear();

    document.getElementById("insertdate").innerHTML = todayNo + "th " + month + " of " + year;
}

date();

