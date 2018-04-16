<?php
include 'phhadd.php';
mysqli_select_db($conn, "bookstore_test4") or die(mysqli_error($conn));
	$email = $_POST['email'];
	$credit= $_POST['credit']; 
    $baddress = $_POST['baddress'];
	$saddress = $_POST['saddress'];
	$date =  date('Y-m-d');
	$cost = 0;
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    include 'phhadd.php';
	include 'searchbar.php';

mysqli_select_db($conn, "bookstore_test4") or die(mysqli_error($conn));         

		echo "<h2>Your Cart</h2>";

         if(isset($_SESSION['login_user'])){
			$userid2 = $_SESSION['login_user'];
			$results1 = mysqli_query($conn, "SELECT books.`BookID`, `price`, cart.`quantity`, `userID` FROM (books JOIN cart ON books.bookID = cart.bookID) WHERE userID = '$userid2';");                
			$results2 = mysqli_query($conn, "SELECT books.`BookID`, `price`, cart.`quantity`, `userID` FROM (books JOIN cart ON books.bookID = cart.bookID) WHERE userID = '$userid2';");                

			if(mysqli_num_rows($results1) > 0){
			while ($row = mysqli_fetch_assoc($results1)){
			$cost += ($row['price']*$row["cart.`quantity`"]);
			}
			}
			$sql_1 = "INSERT INTO orders ('ord_status', 'cost', 'email', 'billing_address', 'shipping_address', 'credit_card_no', 'date_ordered' ,'userId')
			VALUES ('in process', $cost, $email, $baddress, $saddress, $credit, $date, $userid2)";
			mysqli_query($conn, $sql_1);

			while ($row = mysqli_fetch_assoc($results2)){
			$bookiD = $row["BookID"];
			$quantity = $row["cart.`quantity`"];
			$orderID = $row["orderID"];
			$sql_2 = "INSERT INTO  IN_ORDER (BookID, quantity , UserID, orderID )
				VALUES ($BookID, $quantity, $userid2, $orderID)";
			mysqli_query($conn, $sql_2);
			}
		 }
?>		