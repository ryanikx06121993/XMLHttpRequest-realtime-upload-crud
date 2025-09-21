"use strict";

document.addEventListener("DOMContentLoaded", (event) => {

   // upload script post
  //  form variable to take all data including upload in short forms submit all data fetch in serverside
  const form = document.getElementById('uploadForm');
   const inputFILE = document.getElementById("uploadFiles");
   const btnSUBMIT = document.getElementById("btnSubmit");


    form.addEventListener('submit', function (e) {
      e.preventDefault();

      const formData = new FormData(form);
      const xhr = new XMLHttpRequest();
      // this function form is to check the files you upload 
      //  inside serverside 
      console.log(inputFILE.files);

      // javascript loop function for multiple file
      for(const fileUPLOAD of inputFILE.files) {
        formData.append("files[]", fileUPLOAD);
      }
        // prepararion for POST sending
        xhr.open("POST","./serverside.php?action=upload", true); 
        
        // preparation for response from serverside both javascript and php
        xhr.onload = function () {

          console.log(xhr);

        // if (xhr.status === 200) {
        //   console.log(xhr.response);
        //   // console.log('Upload success:', xhr.responseText);
        //   //  this function for table realtime display after upload
        //   // fetchUploads(); 
        // } else {
        //   console.error(xhr.response);
        // }
        
        };

      xhr.send(formData);
   });


});
