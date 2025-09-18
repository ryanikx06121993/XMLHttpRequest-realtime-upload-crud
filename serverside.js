"use strict";

document.addEventListener("DOMContentLoaded", (event) => {
//   preventDefault();
 // function for display table of data 
function tableDisplay() {
  const xhr = new XMLHttpRequest();
  
  xhr.open("GET","./serverside.php?action=read", true); 

 xhr.onload = function() {

      

        if(this.status == 200) {
            // console.log(xhr);
              console.log(JSON.parse(this.response));
        }

  };
  xhr.send();
  
 }

tableDisplay();

});
