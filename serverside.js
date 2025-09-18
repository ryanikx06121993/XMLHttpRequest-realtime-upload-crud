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
            const list = JSON.parse(this.responseText);
              const container = document.getElementById("list");
               container.innerHTML = "";


               items.forEach(item => {
        const div = document.createElement("div");
        div.className = "item";
        div.innerHTML = `
          <strong>${item.name}</strong>
          ${item.file_path ? `<img src="${item.file_path}">` : ""}
          <button onclick="deleteItem(${item.id})">Delete</button>
        `;
        container.appendChild(div);
      });
    }
        }

  };
  xhr.send();
  
 }

tableDisplay();

});
