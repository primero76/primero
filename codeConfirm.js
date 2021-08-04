var form = document.getElementById('form');

var emailInp = document.getElementById('emailinp');
var codeInp = document.getElementById("codeinp");
var passwordInp = document.getElementById("passwordinp");
var cpasswordInp = document.getElementById("passwordinp2");

var codeLbl = document.getElementById("codelbl");
var passwordLbl = document.getElementById("passwordlbl");
var cpasswordLbl = document.getElementById("passwordlbl2");


function openDivemail()
{
	emailInp.style.visibility = "visible";
    emailInp.style.fontSize = "20px";
    emailLbl.style.fontSize = "14px";
    emailLbl.style.color = "grey";
}

function openDivcode()
{
	codeInp.style.visibility = "visible";
    codeInp.style.fontSize = "20px";
    codeLbl.style.fontSize = "14px";
    codeLbl.style.color = "grey";
}
function openDivpassword()
{
	passwordInp.style.visibility = "visible";
    passwordInp.style.fontSize = "20px";
    passwordLbl.style.fontSize = "14px";
    passwordLbl.style.color = "grey";
}

function openDivpassword2()
{
	cpasswordInp.style.visibility = "visible";
    cpasswordInp.style.fontSize = "20px";
    cpasswordLbl.style.fontSize = "14px";
    cpasswordLbl.style.color = "grey";
}

function confirmPassword(){
	if(cpasswordInp.value == '') {
		setErrorFor(cpasswordInp, 'This cannot be blank');   
	} 
	else if(passwordInp.value == cpasswordInp.value){
		setSuccessFor(cpasswordInp,'Passwords Match');	
	 }
	else
	{
		setErrorFor(cpasswordInp, 'Passwords does not match');  
	}
}

function setErrorFor(input, message) {
	var formctrl = input.parentElement;
	var small = formctrl.querySelector('small');
	formctrl.className = 'form-ctrl error';
	small.innerText = message;
}

function setSuccessFor(input,message) {
	var formctrl = input.parentElement;
	var small = formctrl.querySelector('small');
	formctrl.className = 'form-ctrl success';
	small.innerText = message;
}

passwordInp.onchange = confirmPassword;
cpasswordInp.onkeyup = confirmPassword;


function show()
{
	openDivemail();
	openDivcode();
	openDivpassword();
	openDivpassword2();	
}
