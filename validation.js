/**
 * Created by Haoxuan Dong on 10/6/2015.
 */
window.onload = initAll;

function initAll()
{
   var  first_name = document.getElementById("first_name").onclick;
    var  last_name = document.getElementById("last_name").onclick;
    var  email = document.getElementById("email").onclick;
    var  phone = document.getElementById("phone").onclick;

    var error = "";
    if(first_name =="") {
        error += "Missing first name.\n";
    }

    if(last_name =="") {
        error += "Missing last name.\n";
    }
    var emailRegex = /^.+@.+\..{2,4}$/
    if(!email.match(emailRegex)) {
        error += "Invalid Email address.\n";
    }
    var phoneRegex = /^\(\d{3}\) *\d{3}-\d{4}$/
    if(!phone.match(phoneRegex)) {
        error += "Invalid Phone number.\n";
    }

    if(error !=""){
        alert(error);
    }
}
