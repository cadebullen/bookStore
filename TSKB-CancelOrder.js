function cancelOrder(){

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

    var rePurchaseID = /\b\d{3}\b/;
    var purchaseID = document.getElementById("purchaseid").value;
    // Check if Purchase ID is empty:
    if (!purchaseID){
        alert("Please enter a value for the purchase ID of your order.");
        document.getElementById("purchaseid").focus();
        document.getElementById("purchaseid").select();
        return false;
    }
    else{
        if (purchaseID.search(rePurchaseID) == -1){
            alert("Please enter a 3 digit number from your order.");
            document.getElementById("purchaseid").focus();
            document.getElementById("purchaseid").select();
            return false;
        }
    }
}   