<?php // Return a Customer's Purchase option
error_reporting(-1);

    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MYSQL Server: " . mysqli_connect_error();
    }

    $customerID = $_POST['id'];
    $purchaseID = $_POST['purchaseid'];

    $sql = "SELECT CustomerOrderInfo.CustomerID, CustomerOrderInfo.PurchaseID
            FROM CustomerOrderInfo
            Where CustomerOrderInfo.CustomerID = '$customeriD' AND CustomerOrderInfo.PurchaseID = '$purchaseID'";
    
    if ($result = mysqli_query($con, $sql)){
        if (mysqli_num_rows($result) > 0){
            echo "<script>
                    if (confirm('You are about to return this purchase. Are you sure?')){
                        console.log('Book is being returned');
                    }
                    else{
                        window.open('TSKB.html', '_self');
                    }
                </script>";
            "DELETE FROM CustomerOrderInfo
            WHERE CustomerOrderInfo.CustomerID = '$customeriD' AND CustomerOrderInfo.PurchaseID = '$purchaseID'";

            "DELETE FROM CustomerRecord
            WHERE CustomerRecord.CustomerID = '$customerID' AND CustomerRecord.PurchaseID = '$purchaseID'";
        
        }
        else{   
            echo "<script> alert('Purchase ID does not exist for the customer. Please try again.'); </script>";
            header ("location: TSKB-ReturnOrder.html");
        }
    }
    else{
        echo "ERROR: Couldn't execute.";
    }
    mysqli_close($con);
?>
 
