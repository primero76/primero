
var form = document.getElementById('form');

var cardInp = document.getElementById("cardinp");
var expiryDateInp = document.getElementById("expDateinp");
var cvvInp = document.getElementById("cvvinp");

var cardLbl = document.getElementById("cardlbl");
var expiryDateLbl = document.getElementById("expDatelbl");
var cvvLbl = document.getElementById("cvvlbl");

function openDivCard()
{
	cardInp.style.visibility = "visible";
    cardInp.style.fontSize = "20px";
    cardLbl.style.fontSize = "14px";
    cardLbl.style.color = "grey";
}
function openDivexpDate()
{
	expiryDateInp.style.visibility = "visible";
    expiryDateInp.style.fontSize = "20px";
    expiryDateLbl.style.fontSize = "14px";
    expiryDateLbl.style.color = "grey";
}
function openDivCVV()
{
	cvvInp.style.visibility = "visible";
    cvvInp.style.fontSize = "20px";
    cvvLbl.style.fontSize = "14px";
    cvvLbl.style.color = "grey";
}
function validateCard()
{
	var cardno = /^(?:3[47][0-9]{13})$/;
    var cardno1 = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
    var cardno2 = /^(?:5[1-5][0-9]{14})$/;
    var cardno3 = /^(?:6(?:011|5[0-9][0-9])[0-9]{12})$/;
    var cardno4 = /^(?:3(?:0[0-5]|[68][0-9])[0-9]{11})$/;
    var cardno5 = /^(?:(?:2131|1800|35\d{3})\d{11})$/;
	if(cardInp.value === '') {
		setErrorFor(cardInp, 'This cannot be blank');
	} 
    else if (cardInp.value.match(cardno) || cardInp.value.match(cardno1) || cardInp.value.match(cardno2)
    || cardInp.value.match(cardno3) || cardInp.value.match(cardno4) || cardInp.value.match(cardno5))
    {		
		setSuccessFor(cardInp,'');
	} 
    else {
		setErrorFor(cardInp, 'Not a valid card number');		
	}
}
function validateExpDate()
{
	var GivenDate = expiryDateInp;
	var CurrentDate = new Date();
	var GivenDate = new Date(expiryDateInp);
	if(expiryDateInp.value === '') {
		setErrorFor(expiryDateInp, 'This cannot be blank');
	} else if(GivenDate < CurrentDate){
		setErrorFor(expiryDateInp, 'Invalid Date');
	}
	else{
		setSuccessFor(expiryDateInp,'');
	}
	
}
function validateCVV()
{
	if(cvvInp.value == '') {
		setErrorFor(cvvInp, 'This cannot be blank');   
	} 
	else if(cvvInp.value.length == 3){
		setSuccessFor(cvvInp,'');	
	}
	else
	{
		setErrorFor(cvvInp, 'Invalid CVV');  
	}
}

function setErrorFor(input, message) {
	if (input==cardInp)
	{
		var formctrl = input.parentElement;
		var small = formctrl.querySelector('small');
		formctrl.className = 'three error';
		small.innerText = message;
	}
	else if (input==expiryDateInp || input==cvvInp)
	{
		var formctrl = input.parentElement;
		var small = formctrl.querySelector('small');
		formctrl.className = 'four error';
		small.innerText = message;
	}
}

function setSuccessFor(input,message) {
	if (input==cardInp)
	{
		var formctrl = input.parentElement;
		var small = formctrl.querySelector('small');
		formctrl.className = 'three success';
		small.innerText = message;
	}
	else if (input==expiryDateInp || input==cvvInp)
	{
		var formctrl = input.parentElement;
		var small = formctrl.querySelector('small');
		formctrl.className = 'four success';
		small.innerText = message;
	}
}

cardInp.onkeyup = validateCard;
expiryDateInp.onkeyup = validateExpDate;
cvvInp.onkeyup = validateCVV;
