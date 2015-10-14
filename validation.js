/**
 * Created by Haoxuan Dong on 10/6/2015.
 */
function validate()
{
   var  first_name = document.getElementById("first_name").value;
    var  last_name = document.getElementById("last_name").value;
    var  email = document.getElementById("email").value;

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

    if(error !=""){
        alert(error);
    }
}
