<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    include 'phhadd.php';
	include 'searchbar.php';

mysqli_select_db($conn, "bookstore_test4") or die(mysqli_error($conn));         
if(isset($_SESSION['login_user'])){
			$order_total = 0;
			$userid2 = $_SESSION['login_user'];
			$results = mysqli_query($conn, "SELECT `title`, `ISBN`, `price`, cart.`quantity`, `userID` FROM (books JOIN cart ON books.bookID = cart.bookID) WHERE userID = '$userid2';");                
			echo "<form action='placeorder.php' method = 'post'>

			Email:<br> <input type='email' name='email' required><br>
			Billing Address:<br> <input type='text' name='baddress'required><br>
			Shipping Address:<br> <input type='text' name='saddress' required><br>
			Credit Card No.:<br> <input type='text' name='credit'required><br>

			<input type='submit'>
			<input type='reset'>
			</form>";
}
?>
