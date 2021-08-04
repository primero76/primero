var content1 = document.getElementById("cont1");
var content2 = document.getElementById("cont2");
var content3 = document.getElementById("cont3");

function limit_checkbox(name,obj,max)
   {
   var count=0;
   var x=document.getElementsByName(name);
   for (var i=0; i < x.length; i++)
      {
      if(x[i].checked)
         {
         count = count + 1;
         }
      } 
   if (count > max)
      {
      alert('Please select only ' + max + ' checkboxes.\
To select this option unselect one of the others.');
      obj.checked = false;
      }
   }

function openBook(){
    content1.style.visibility = "visible";
    content2.style.visibility = "hidden";
    content3.style.visibility = "hidden";
    btn1.style.color="lightseagreen";
    btn1.style.backgroundColor="white";
    btn2.style.color="white";
    btn2.style.backgroundColor="lightseagreen";
    btn3.style.color="white";
    btn3.style.backgroundColor="lightseagreen";

}
function openFlightDetails(){
    content2.style.visibility = "visible";
    content1.style.visibility = "hidden";
    content3.style.visibility = "hidden";
    btn2.style.color="lightseagreen";
    btn2.style.backgroundColor="white";
    btn1.style.color="white";
    btn1.style.backgroundColor="lightseagreen";
    btn3.style.color="white";
    btn3.style.backgroundColor="lightseagreen";
    inpBoxTrip.style.visibility = "hidden";
    inpBoxRtrnDate.style.visibility = "hidden";
    inpBoxClass.style.visibility = "hidden";
    inpBoxDeptDate.style.visibility = "hidden";
    inpBoxTo.style.visibility = "hidden";
    inpBoxFrom.style.visibility = "hidden";
}

function cancelFlight(){
    content3.style.visibility = "visible";
    content2.style.visibility = "hidden";
    content1.style.visibility = "hidden";
    btn3.style.color="lightseagreen";
    btn3.style.backgroundColor="white";
    btn2.style.color="white";
    btn2.style.backgroundColor="lightseagreen";
    btn1.style.color="white";
    btn1.style.backgroundColor="lightseagreen";
    inpBoxTrip.style.visibility = "hidden";
    inpBoxRtrnDate.style.visibility = "hidden";
    inpBoxClass.style.visibility = "hidden";
    inpBoxDeptDate.style.visibility = "hidden";
    inpBoxTo.style.visibility = "hidden";
    inpBoxFrom.style.visibility = "hidden";    
}
