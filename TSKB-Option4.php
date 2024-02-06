<?php // Update a User's Order option
error_reporting(-1);

    $servername = "sql1.njit.edu";
    $username = "cbb23";
    $password = "Titiforever21..";
    $dbname = "cbb23";
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MYSQL Server: " . mysqli_connect_error();
    }

    $CustomerID = $_POST['id'];
    $PurchaseID = $_POST['purchaseid'];
    $BookName = $_POST['updateOrder'];

    $sql = "SELECT * FROM CustomerOrderInfo 
            WHERE CustomerOrderInfo.CustomerID = '$CustomerID'
                AND CustomerOrderInfo.PurchaseID = '$PurchaseID'
                AND CustomerOrderInfo.Purchase = 'Online'";
    
    if ($result = mysqli_query($con, $sql)){
        if (mysqli_num_rows($result) > 0){
            echo "<script> 
                if (confirm(('You are about to UPDATE this order. Are you sure?)){
                    console.log('Confirmed to update order.');
                }
                else{
                    window.open('TSKB-UpdateOrder.html');
                }
                </script> ";
            "UPDATE `CustomerRecord` 
            SET `BookName`=[$BookName] 
            WHERE CustomerRecord.CustomerID = '$CustomerID'
                AND CustomerRecord.Purchase = 'Online'";
            
            echo "<script> alert('Update has been placed.') </script>";
        }
        else{
            echo "<script>
                alert('Either data entered for Customer ID or Purchase ID is incorrect. 
                Please remember only online orders can be updates.
                Please try again with the correct information'); 
                </script>";
        }
    }
    else{
        echo "ERROR: Couldn't execute.";
    }
    mysqli_close($con);
?>