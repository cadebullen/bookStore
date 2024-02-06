<?php // Customer’s Book Purchase/Order option

error_reporting(-1);

    $servername = "sql1.njit.edu";
    $username = "cbb23";
    $password = "Titiforever21..";
    $dbname = "cbb23";
    
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MYSQL Server: " . mysqli_connect_error();
    }
    $customerid = $_POST['id'];
    $customerName = $_POST['fName'];
    $customerName = $_POST['lName'];
    $bookName = $_POST['purchase'];
    $paymentType = $_POST['payType'];
    $orderType = $_POST['orderType'];
    $date = $_POST['date'];
    $address = $_POST['address'];
    $purchaseid = rand(100,10000);

    $sql = "SELECT CustomerDescription.ID, CustomerDescription.FirstName, CustomerDescription.LastName
            FROM CustomerDescription
            WHERE CustomerDescription.ID = '$customerid'";

   if ($result = mysqli_query($con, $sql)){
        if (mysqli_num_rows($result) > 0){
            
            "INSERT INTO CustomerOrderInfo(Purchase, Date, PaymentMetho, CustomerID, PurchaseID) 
            VALUES ('$orderType', '$date', '$paymentType', $customerid, $purchaseid)";

            "INSERT INTO CustomerRecord(BookName, Address, BooksellerID, CustomerID, PurchaseID) 
            VALUES ('$bookName', '$address', $id, $customerid, $purchaseid)";
            
            echo "<script> alert('Purchase placed.'); </script>";

            $sql3 = "SELECT BookSellers.FirstName, BookSellers.LastName, BookSellers.IDNumber, BookSellers.PhoneNumber, BookSellers.Email, 
                            CustomerDescription.FirstName, CustomerDescription.LastName, CustomerDescription.ID, CustomerOrderInfo.Purchase, 
                            CustomerOrderInfo.Date, CustomerOrderInfo.PaymentMethod, CustomerRecord.BookName, CustomerRecord.Address, 
                            CustomerRecord.PurchaseID
                    FROM BookSellers 
                        INNER JOIN CustomerRecord 
                            ON BookSellers.IDNumber = CustomerRecord.BookSellerID
                        INNER JOIN CustomerOrderInfo
                            ON CustomerRecord.CustomerID = CustomerOrderInfo.CustomerID
                        Inner JOIN CustomerDescription
                            ON CustomerRecord.CustomerID = CustomerDescription.ID
                    WHERE 
                        BookSellers.IDNumber = '$id'
                        AND
                            CustomerRecord.CustomerID = '$customerid'";

            if ($result = mysqli_query($con, $sql3)){

                echo "<link href='DataStyling.css' rel='stylesheet'>";
                echo "<table>";
                    echo "<tr>";
                        echo "<th>BookSeller's First Name</th>";
                        echo "<th>BookSeller's Last Name</th>";
                        echo "<th>BookSeller's ID Number</th>"; 
                        echo "<th>BookSeller's Phone Number</th>";
                        echo "<th>BookSeller's Email</th>";
                        echo "<th>Customer First Name</th>";
                        echo "<th>Customer Last Name</th>";
                        echo "<th>Customer ID Number</th>";
                        echo "<th>Customer Purchase Info</th>";
                        echo "<th>Customer Date & Time</th>";
                        echo "<th>Customer Payment Mehtod</th>";
                        echo "<th>Book Name & Author</th>";
                        echo "<th>Customer Address</th>";
                        echo "<th>Purchase ID</th>";
                    echo "</tr>";
                while ($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['BookSellers.FirstName'] . "</td>";
                        echo "<td>" . $row['BookSellers.LastName'] . "</td>";
                        echo "<td>" . $row['BookSellers.IDNumber'] . "</td>";
                        echo "<td>" . $row['BookSellers.PhoneNumber'] . "</td>";
                        echo "<td>" . $row['BookSellers.Email'] . "</td>";
                        echo "<td>" . $row['CustomerDescription.FirstName'] . "</td>";
                        echo "<td>" . $row['CustomerDescription.LastName'] . "</td>";
                        echo "<td>" . $row['CustomerDescription.ID'] . "</td>";
                        echo "<td>" . $row['CustomerOrderInfo.Purchase'] . "</td>";
                        echo "<td>" . $row['CustomerOrderInfo.Date'] . "</td>";
                        echo "<td>" . $row['CustomerOrderInfo.PaymentMethod'] . "</td>";
                        echo "<td>" . $row['CustomerRecord.BookName'] . "</td>";
                        echo "<td>" . $row['CustomerRecord.Address'] . "</td>";
                        echo "<td>" . $row['CustomerRecord.PurchaseID'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result);
            }
            else{
                echo "No records matching query!";
            }
        }   
        else{
            echo "No customer records are currently available. Please create an account for the customer. Redirecting.....";
            header("location: TSKB-CreateAccount.html");
        }
   }
   else{
       echo "ERROR: Couldn't execute.";
   }
   mysqli_close($con);
?>