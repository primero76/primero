var emailInp = document.getElementById('emailinp');
var passwordInp = document.getElementById("passwordinp");

var emailLbl = document.getElementById("emaillbl");
var passwordLbl = document.getElementById("passwordlbl");
function openDivemail()
{
	emailInp.style.visibility = "visible";
    emailInp.style.fontSize = "20px";
    emailLbl.style.fontSize = "14px";
    emailLbl.style.color = "grey";
}
function openDivpassword()
{
	passwordInp.style.visibility = "visible";
    passwordInp.style.fontSize = "20px";
    passwordLbl.style.fontSize = "14px";
    passwordLbl.style.color = "grey";	
}
