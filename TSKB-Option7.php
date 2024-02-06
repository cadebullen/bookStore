<?php // Create an Account option
error_reporting(-1);

    $servername = "sql1.njit.edu";
    $username = "cbb23";
    $password = "Titiforever21..";
    $dbname = "cbb23";
    $con = mysqli_connect($servername,$username,$password,$dbname);
              
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $CustomerID = $_POST['id'];

    $sql = "SELECT * FROM `CustomerDescription` WHERE `ID` = '$CustomerID'";
    
    if ($result = mysqli_query($con, $sql)){
        if (mysqli_num_rows($result)){
            echo "<script>
                alert('Customer Account Already Exists. Redirecting....');
                window.location = 'TSKB-CreateAccount.html';
            </script>";
        }
    }
    else{
        $query = "INSERT INTO CustomerDescription (FirstName, LastName, ID) 
                VALUES ('$firstName', '$lastName', $CustomerID)";
            echo "<script>
                alert('Customer Account Created. Redirecting....');
                window.location = 'TSKB-CreateAccount.html';
            </script>";
    }
    mysqli_free_result($result);
    
    mysqli_close($con);
?>