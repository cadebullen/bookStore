<?php // Search A BookSeller's Records Option

    error_reporting(-1);

    session_start();
        $servername = "";
        $username = "";
        $password = "";
        $dbname = "";

        $con = mysqli_connect($servername, $username, $password, $dbname);
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $_SESSION['personId'] = $_POST['personId'];

        $id = $_SESSION['personId'];
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $BSpassword = $_POST['password'];
        $sql = "SELECT BookSellers.FirstName, BookSellers.LastName, BookSellers.IDNumber, BookSellers.PhoneNumber, BookSellers.Email, CustomerDescription.FirstName`, `CustomerDescription.LastName`, `CustomerDescription.ID`, `CustomerOrderInfo.Purchase`, `CustomerOrderInfo.Date`, `CustomerOrderInfo.PaymentMethod`, `CustomerRecord.BookName`, `CustomerRecord.Address`, `CustomerRecord.PurchaseID`
                FROM BookSellers
                    INNER JOIN CustomerRecord
                        ON BookSellers.IDNumber = CustomerRecord.BookSellerID
                    INNER JOIN CustomerOrderInfo
                        ON CustomerRecord.CustomerID = CustomerOrderInfo.CustomerID
                    Inner JOIN CustomerDescription
                        ON CustomerRecord.CustomerID = CustomerDescription.ID
                WHERE BookSellers.IDNumber = '$id' AND CustomerRecord.CustomerID = $customerid";

        if ($result = mysqli_query($con, $sql)){
            if (mysqli_num_rows($result) > 0){
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
            echo "No customer records are currently available. Please create an account for the customer. Redirecting.....";
            header("location: TSKB-CreateAccount.html");
            }
        }
    mysqli_close($con);
?>
