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

         if(isset($_SESSION['login_user'])){
			$userid2 = $_SESSION['login_user'];
			$results1 = mysqli_query($conn, "SELECT books.BookID AS bookID2, price, how_many, userID FROM (books JOIN cart ON books.bookID = cart.bookID) WHERE userID = '$userid2';");                
			$results2 = mysqli_query($conn, "SELECT books.BookID AS bookID2, price, how_many, userID FROM (books JOIN cart ON books.bookID = cart.bookID) WHERE userID = '$userid2';");                
			if(mysqli_num_rows($results1) > 0){
				while ($row = mysqli_fetch_assoc($results1)){
					$quantity1 = $row["how_many"];
					$price = $row["price"];
					$cost += ($price*$quantity1);
				}
		}	
		echo $row["BookID2"];
			$sql_1 = "INSERT INTO orders (ord_status, cost, email_address, billing_address, shipping_address, credit_card_no, date_ordered ,userId) VALUES (
			VALUES ('in process', $cost, $email, $baddress, $saddress, $credit, $date, $userid2)";
			mysqli_query($conn, $sql_1);
			$last_id = mysqli_insert_id($conn);
			$get_last = "SELECT MAX(Order_Id) AS max FROM orders";
			$results3 = mysqli_query($conn, $get_last);
			$last_id_row = mysqli_fetch_assoc($results3);
			$last_id = $last_id_row["max"];
			while ($row = mysqli_fetch_assoc($results2)){
			$bookID = $row["bookID2"];
			$quantity = $row["how_many"];
			
			$sql_2 = "INSERT INTO  IN_ORDER (BookID, quantity , order_ID )
				VALUES ($bookID, $quantity, $last_id)";
			if (mysqli_query($conn, $sql_2)) {
					echo "Order placed succesffuly. Thank you!";
				}			 		
				else {
						echo "Error: " . $sql_2 . "<br>" . mysqli_error($conn);
				}
			}
		 }
?>		