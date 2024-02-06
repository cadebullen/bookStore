<?php // Cancel an Order option
error_reporting(-1);

    $servername = "sql1.njit.edu";
    $username = "cbb23";
    $password = "Titiforever21..";
    $dbname = "cbb23";
    $con = mysqli_connect($servername,$username,$password,$dbname);
            
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $CustomerID = $_POST['id'];
    $PurchaseID = $_POST['purchaseid'];

    $sql = "SELECT * FROM `CustomerOrderInfo` 
            WHERE `CustomerOrderInfo.CustomerID` = '$CustomerID'
                AND `CustomerOrderInfo.PurchaseID` = '$PurchaseID'
                AND `CustomerOrderInfo.Purchase` = 'Online'";
    
    if ($result = mysqli_query($con, $sql)){
        if (mysqli_num_rows($result) > 0){
            echo "<script>
                if (confirm('You are about to CANCEL this order. Are you sure')){
                    console.log('Order is being canceled.');
                }
                else{
                    window.open('TSKB-CancelOrder.html', '_self');
                }
                </script>";
            $quey1 = "DELETE FROM `CustomerRecord` WHERE `CustomerRecord.CustomerID` = '$CustomerID' AND `CustomerRecord.PurchaseID` = '$PurchaseID'";
            $query2 = "DELETE FROM `CustomerOrderInfo` WHERE `CustomerOrderInfo.CustomerID` = '$CustomerID' AND `CustomerOrderInfo.PurchaseID` = '$PurchaseID'";
        }
        else{
            echo "<script>
                alert('Purchase ID or Customer ID does not exist. Please try again.');
            </script>";
        }
    }
    else{
        echo "ERROR: Couldn't execute.";
    }
    mysqli_close($con);
?>