
<?php
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
			$results = mysqli_query($conn, "SELECT `title`, `ISBN`, `price`, cart.`quantity`, `userID` FROM (books JOIN cart ON books.bookID = cart.bookID) WHERE userID = '$userid2';");                
			if(mysqli_num_rows($results) > 0){
			
			echo "<table style='float:left'>".
				"<tr>".
				"<th>Title</th>".
				"<th>Price</th>".
				"<th>ISBN</th>".
				"<th>Quantity</th>".

				"</tr>";     
             
            while ($row = mysqli_fetch_assoc($results)) {
			echo"<tr>\n" .
          "  <td>".$row["title"]."</td>\n" .
          "  <td>".$row["price"]."</td>\n" .
		  "  <td>".$row["ISBN"]."</td>\n" .
		  "  <td>".$row["quantity"]."</td>\n" .

          " </tr>\n";
			}
            
           echo"</table><br>";  
		   echo "<a href ='checkout.php'>Checkout<a/>";

        }
        else{ 
            echo "No Books!";
        }
}        
?>
