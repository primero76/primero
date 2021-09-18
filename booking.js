var inpBoxFrom = document.getElementById("inpFrom");
var labelBoxFrom = document.getElementById("lblFrom");
var inpBoxTo = document.getElementById("inpTo");
var labelBoxTo = document.getElementById("lblTo");
var passengerInp = document.getElementById("passInp");

var passengerLbl = document.getElementById("psngrlbl");
var inpBoxTrip = document.getElementById("tripinp");
var labelBoxTrip = document.getElementById("triplbl");
var inpBoxDeptDate = document.getElementById("departureDateInp");
var labelBoxDeptDate = document.getElementById("departureDateLbl");
var inpBoxRtrnDate = document.getElementById("returnDateInp");
var labelBoxRtrnDate = document.getElementById("returnDateLbl");
var inpBoxClass = document.getElementById("classInp");
var labelBoxClass = document.getElementById("classLbl");


function openDivFrom()
{    
    inpBoxFrom.style.visibility = "visible";
    inpBoxFrom.style.fontSize = "20px";
    labelBoxFrom.style.fontSize = "14px";
    labelBoxFrom.style.color = "grey";
    
}
function openDivTo()
{
	inpBoxTo.style.visibility = "visible";
    inpBoxTo.style.fontSize = "20px";
    labelBoxTo.style.fontSize = "14px";
    labelBoxTo.style.color = "grey";	
}
function openPassenger()
{
    passengerLbl.style.fontSize = "14px";
    passengerLbl.style.color = "grey";	
}
function openDivDeptDate()
{
    inpBoxDeptDate.style.visibility = "visible";
    inpBoxDeptDate.style.fontSize = "20px";
    labelBoxDeptDate.style.fontSize = "14px";
    labelBoxDeptDate.style.color = "grey";    
}

function openDivClass()
{
    inpBoxClass.style.visibility = "visible";
    inpBoxClass.style.fontSize = "20px";
    labelBoxClass.style.fontSize = "14px";
    labelBoxClass.style.color = "grey";
}

function show()
{
    openDivFrom();
    openDivTo();
    openDivDeptDate();
    openDivClass();
    selectSeats();
}