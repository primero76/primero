var form = document.getElementById('form');
var emailInp = document.getElementById('emailinp');

var ctrl = document.getElementsByClassName("form-ctrl");
var nameFirstInp = document.getElementById("f_nameinp");
var nameMiddleInp = document.getElementById("m_nameinp");
var nameLastInp = document.getElementById("l_nameinp");
var mobileInp = document.getElementById("mobNuminp");
var genderInp = document.getElementById("genderinp");
var dobInp = document.getElementById("dobinp");
var cityInp = document.getElementById("cityinp");
var passwordInp = document.getElementById("passwordinp");
var cpasswordInp = document.getElementById("passwordinp2");

var nameFirstLbl = document.getElementById("f_namelbl");
var nameMiddleLbl = document.getElementById("m_namelbl");
var nameLastLbl = document.getElementById("l_namelbl");
var emailLbl = document.getElementById("emaillbl");
var mobileLbl = document.getElementById("mobNumlbl");
var genderLbl = document.getElementById("genderlbl");
var dobLbl = document.getElementById("doblbl");
var cityLbl = document.getElementById("citylbl");
var passwordLbl = document.getElementById("passwordlbl");
var cpasswordLbl = document.getElementById("passwordlbl2");

var btAcc = document.getElementById('crtAcc');

function openDivemail()
{
	emailInp.style.visibility = "visible";
    emailInp.style.fontSize = "20px";
    emailLbl.style.fontSize = "14px";
    emailLbl.style.color = "grey";
	ctrl.style.height = "100px";
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
function openDivf_name()
{
	nameFirstInp.style.visibility = "visible";
	nameFirstInp.style.fontSize = "20px";
	nameFirstLbl.style.fontSize = "14px";
	nameFirstLbl.style.color = "grey";
}
function openDivm_name()
{
	nameMiddleInp.style.visibility = "visible";
	nameMiddleInp.style.fontSize = "20px";
	nameMiddleLbl.style.fontSize = "14px";
	nameMiddleLbl.style.color = "grey";
}
function openDivl_name()
{
	nameLastInp.style.visibility = "visible";
	nameLastInp.style.fontSize = "20px";
	nameLastLbl.style.fontSize = "14px";
	nameLastLbl.style.color = "grey";
}
function openDivmobNum()
{
	mobileInp.style.visibility = "visible";
	mobileInp.style.fontSize = "20px";
	mobileLbl.style.fontSize = "14px";
	mobileLbl.style.color = "grey";
}
function openDivDOB()
{
	dobInp.style.visibility = "visible";
    dobInp.style.fontSize = "20px";
    dobLbl.style.fontSize = "14px";
    dobLbl.style.color = "grey";
}

function openDivGender()
{
	genderInp.style.visibility = "visible";
    genderInp.style.fontSize = "20px";
    genderLbl.style.fontSize = "14px";
    genderLbl.style.color = "grey";
}

function openDivcity()
{
	cityInp.style.visibility = "visible";
    cityInp.style.fontSize = "20px";
    cityLbl.style.fontSize = "14px";
    cityLbl.style.color = "grey";
}

function validateMail() {
	// trim to remove the whitespaces
	var mailformat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(emailInp.value === '') {
		setErrorFor(emailInp, 'Email cannot be blank');
	} else if (emailInp.value.match(mailformat)) {		
		setSuccessFor(emailInp,'');
	} else {
		setErrorFor(emailInp, 'Not a valid email');		
	}
}
function validatePassword()
{
	if(passwordInp.value === '') {
		setErrorFor(passwordInp, 'Password cannot be blank');
	} else {
		setSuccessFor(passwordInp,'');
	}
	
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

function validateMobNum()
{
	if(mobileInp.value === '') {
	setErrorFor(mobileInp, 'This cannot be blank');
	} else {
	setSuccessFor(mobileInp,'');
	}
}
function validateCity()
{
	if(cityInp.value === '') {
		setErrorFor(cityInp, 'This cannot be blank');
	} else {
		setSuccessFor(cityInp,'');
	}
}
function validateDOB()
{
	if(dobInp.value === '') {
		setErrorFor(dobInp, 'This cannot be blank');
	} else {
		setSuccessFor(dobInp,'');
	}
}

function validateGender()
{
	if(genderInp.value === '') {
	setErrorFor(genderInp, 'This cannot be blank');
	} else {
	setSuccessFor(genderInp,'');
	}
}
function validateFName()
{
	if(nameFirstInp.value === '') {
		setErrorFor(nameFirstInp, 'This cannot be blank');
	} else {
		setSuccessFor(nameFirstInp,'');
	}
}
function validateMName()
{
	if(nameMiddleInp.value === '') {
		setErrorFor(nameMiddleInp, 'This cannot be blank');
	} else {
		setSuccessFor(nameMiddleInp,'');
	}
}
function validateLName()
{
	if(nameLastInp.value === '') {
		setErrorFor(nameLastInp, 'This cannot be blank');
	} else {
		setSuccessFor(nameLastInp,'');
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

passwordInp.onkeyup = validatePassword;
emailInp.onkeyup = validateMail;
nameFirstInp.onkeyup = validateFName;
nameMiddleInp.onkeyup = validateMName;
nameLastInp.onkeyup = validateLName;
mobileInp.onkeyup = validateMobNum;
dobInp.onkeyup = validateDOB;
genderInp.onkeyup = validateGender;
cityInp.onkeyup = validateCity;

passwordInp.onchange = confirmPassword;
cpasswordInp.onkeyup = confirmPassword;

function show()
{
	openDivf_name();
	openDivm_name();
	openDivl_name();
	openDivDOB();
	openDivmobNum();
	openDivcity();
	openDivpassword();
	openDivpassword2();
	openDivemail();	
}
