function customerValidation(){

    // Check first name is empty:
   var fName = document.getElementById("fName");
   if (!fName.value){
        alert("Please enter a first name.");
        fName.focus();
        fName.select();
        return false;
   }

    // Check if last name is empty:
    var lName = document.getElementById("lName")
    if (!lName.value){
        alert("Please enter a last name.");
        lName.focus();
        lName.select();
        return false;
    }

    var reID = /\b\d{8}\b/;
    // Check if ID is empty:
    if (!document.getElementById("id").value){
        alert("Please enter an ID.");
        document.getElementById("id").focus();
        document.getElementById("id").select();
        return false;
    }
    else{ 
        // check value of ID to the regex
        var id = document.getElementById("id").value;
        if (id.search(reID) == -1){
            alert("ID does not contain 8 digits.");
            document.getElementById("id").focus();
            document.getElementById("id").select();
            return false;
        }
    }

    var purchase = document.getElementById("purchase").value;
    if (!purchase){
        alert("Please enter the Title and/or Author of your book purchase.");
        document.getElementById("purchase").focus();
        document.getElementById("purchase").select();
        return false;
    }

    var date = document.getElementById("date").value;
    if (!date){
        alert("Please enter the current date of your book purchase.");
        document.getElementById("date").focus();
        document.getElementById("date").select();
        return false;
    }

    var rePayType = /\b(Credit|Cash)\b/;
    var paymentType = document.getElementById("payType").value;
    if (!paymentType){
        alert("Please enter your form of payment.");
        document.getElementById("payType").focus();
        document.getElementById("payType").select();
        return false;
    }
    else{
        if (paymentType.search(rePayType) == -1){
            alert("Your payment type should be 'Credit' or 'Cash'.");
            document.getElementById("payType").focus();
            document.getElementById("payType").select();
            return false;
        }
    }
    
    var reOrderType = /\b(In-Store|Online)\b/;
    var orderType = document.getElementById("orderType").value;
    if (!orderType){
        alert("Is this an online purchase or in-store?");
        document.getElementById("orderType").focus();
        document.getElementById("orderType").select();
        return false;
    }
    else{
        if (orderType.search(reOrderType) == -1){
            alert("Your Order Type should be In-store / Online.");
            document.getElementById("orderType").focus();
            document.getElementById("orderType").select();
            return false;
        }
    }

    if (orderType == "Online" && paymentType != "Credit"){
        alert("If your order type is Online, your payment type should be Credit.");
        document.getElementById("payType").focus();
        document.getElementById("payType").select();
        return false;

    }

    if (!document.getElementsByid("address").value){
        alert("Please enter your shipping address. If the order is In-Store, enter N/A.");
        document.getElementByid("address").focus();
        document.getElementByid("address").select();
        return false;
    }
}