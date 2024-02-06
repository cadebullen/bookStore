function Validation(){

   // regex of password:
   var rePW = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@.|`~<>()#^*+=\/\-\[\]$!%*?&]).{0,10}$/;
   var regexNum = /(?=.*\d)/;
   var regexUppercaseLetters = /(?=.*[A-Z])/;
   var regexSpecialChar = /(?=.*[@.|`~<>()#^*+=\/\-\[\]$!%*?&])/;

   // regex of Id:
   var reID = /\b\d{8}\b/;

   //  regex of phone number:
   var rePN = /^(\d{3}[-\s]?)(\d{3}[-\s]?)(\d{4}[-\s]?)\b/;
   
   //  regex of Email:
   var reEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,5}$/;
   var reAT = /@/;
   var reDot = /@[a-zA-Z0-9.-]+\./;
   var reDomain = /\.[a-zA-Z]{2,5}$/;
    
   
   // Check first name is empty:
   var fName = document.getElementById("fName");
   
      if (!fName.value){
         alert("Please enter a first name.");
         fName.focus();
         fName.select();
         return false;
      }

   
   // Check if last name is empty:
   var lName = document.getElementById("lName");
   if (!lName.value){
      alert("Please enter a last name.");
      lName.focus();
      lName.select();
      return false;
   }
   
  
   // Check if password is empty:
   if (!document.getElementById("password").value){
      alert("Please enter a password.");
      document.getElementById("password").focus();
      document.getElementById("password").select();
      return false;
   }  
   else{ // Check value of password to its regex
      let pw = document.getElementById("password").value;
      if (pw.length > 10){
            alert("Password exceeds the maximum of 10 characters.");
            document.getElementById("password").focus();
            document.getElementById("password").select();
            return false;
      }
      else if (pw.search(regexNum) == -1){
            alert("Password does not contain a number.");
            document.getElementById("password").focus();
            document.getElementById("password").select();
            return false;
      }
      else if (pw.search(regexUppercaseLetters) == -1){            
            alert("Password does not contain an uppercase letter.");
            document.getElementById("password").focus();
            document.getElementById("password").select();
            return false;
      }
      else if (pw.search(regexSpecialChar) == -1){
            alert("Password does not contain a special character.");
            document.getElementById("password").focus();
            document.getElementById("password").select();
            return false;
      }
        
   }
  
   // Check if ID is empty:
   if (!document.getElementById("personId").value){
      alert("Please enter an Id.");
      document.getElementById("personId").focus();
      document.getElementById("personId").select();
      return false;
   }
   else{ // check value of ID to the regex
      var id = document.getElementById("personId").value;
      if (id.search(reID) == -1){
         alert("ID does not contain 8 digits.");
         document.getElementById("personId").focus();
         document.getElementById("personId").select();
         return false;
      }
   }
      
  
   // Check if phone number is empty:
   if (!document.getElementById("phoneNumber").value){
      alert("Please enter a phone number.");
      document.getElementById("phoneNumber").focus();
      document.getElementById("phoneNumber").select();
      return false;
   }
   else{ // Check value of phone number with regex
      var pN = document.getElementById("phoneNumber").value;
      if (pN.search(rePN) == -1){
         alert("Your phone number contains an invalid response. Only spaces or dashes \"-\" are allowed between the 10 digit number.");
         document.getElementById("phoneNumber").focus();
         document.getElementById("phoneNumber").select();
         return false;
      }
      else if (pN.length() > 10){
         alert("Your phone number is longer than 10 characters. Please type the correct phone number or remove the area code.");
         document.getElementById("phoneNumber").focus();
         document.getElementById("phonenUmber").select();
         return false;
      }
      
   }

    // Check value of email:
   var email = document.getElementById("email");
   if (email.hasAttribute('required')){
      if (!email.value){
         alert("Pleae enter an email.");
         email.focus();
         email.select();
         return false;
      }
      else if (email.value.search(reAT) == -1){
         alert("Email should contain an @ symbol.");
         email.focus();
         email.select();
         return false;
      }
      else if (email.value.search(reDot) == -1){
         alert("Email should contain a period after the @ symbol.");
         email.focus();
         email.select();
         return false;
      }
      else if (email.value.search(reDomain) == -1){
         alert("Email should contain a domain of 2-5 characters.");
         email.focus();
         email.select();
         return false;
      }
   }

   function handleFormSubmission(){
      var transactionDropdown = document.getElementById("transaction");
      var selectedDropdown = transactionDropdown.option[transactionDropdown.selectedIndex].value;
   
      switch (selectedDropdown){
         case "bookPurchase":
            window.location.href = "TSKB-Customer-Purchase.html";
            break;
         case "bookReturn":
            window.location.href = "TSKB-ReturnOrder.html";
            break;
         case "orderUpdate":
            window.location.href = "TSKB-UpdateOrder.html";
            break;
         case "orderCancel":
            window.location.href = "TSKB-CancelOrder.html";
            break;
         case "newAccount":
            window.location.href = "TSKB-CreateAccount.html";
      }
   }
      
}