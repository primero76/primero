var content1 = document.getElementById("cont1");
var content2 = document.getElementById("cont2");
var content3 = document.getElementById("cont3");

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

var addSpace = document.getElementById("dropdown-content");

var drop = document.getElementById("dropdown");
function vis(){
    addSpace.style.display = "block";
    openPassenger();
}
function unvis(){
    addSpace.style.display = "none";
    document.getElementById("adultInp").style.visibility = 'hidden';
    document.getElementById("childInp").style.visibility = 'hidden';
}
function openDivFrom()
{    
    inpBoxFrom.style.visibility = "visible";
    inpBoxFrom.style.margin = "7px";
    inpBoxFrom.style.fontSize = "18px";
    labelBoxFrom.style.fontSize = "14px";
    labelBoxFrom.style.margin = "7px";
    labelBoxFrom.style.color = "grey";
    
}
function openPassenger()
{
    passengerInp.style.margin = "7px";
    passengerInp.style.fontSize = "18px";
    passengerLbl.style.fontSize = "14px";
    passengerLbl.style.margin = "7px";
    passengerLbl.style.color = "grey";
    document.getElementById("adultInp").style.visibility = 'visible';
    document.getElementById("childInp").style.visibility = 'visible';
}
function openDivTo()
{    
    
    inpBoxTo.style.visibility = "visible";
    inpBoxTo.style.margin = "7px";
    inpBoxTo.style.fontSize = "18px";
    labelBoxTo.style.fontSize = "14px";
    labelBoxTo.style.margin = "7px";
    labelBoxTo.style.color = "grey";    
}

function openDivDeptDate()
{
    inpBoxDeptDate.style.visibility = "visible";
    inpBoxDeptDate.style.margin = "7px";
    inpBoxDeptDate.style.fontSize = "18px";
    labelBoxDeptDate.style.fontSize = "14px";
    labelBoxDeptDate.style.margin = "7px";
    labelBoxDeptDate.style.color = "grey";
    
}

function openDivClass()
{
    inpBoxClass.style.visibility = "visible";
    inpBoxClass.style.margin = "7px";
    inpBoxClass.style.fontSize = "18px";
    labelBoxClass.style.fontSize = "14px";
    labelBoxClass.style.margin = "7px";
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