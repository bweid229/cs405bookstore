


<?php
    include 'phhadd.php';
	include 'searchbar.php';

{
mysqli_select_db($conn, "bookstore_test4") or die(mysqli_error($conn));         


         
        $results = mysqli_query($conn, "SELECT `title`, `ISBN`, `price` FROM books");
                      
        if(mysqli_num_rows($results) > 0){
			
			echo "<table style='float:left'>".
				"<tr>".
				"<th>Title</th>".
				"<th>Price</th>".
				"<th>ISBN</th>".
				"</tr>";
             
            while ($row = mysqli_fetch_assoc($results)) {
			echo"<tr>\n" .
          "  <td>".$row["title"]."</td>\n" .
          "  <td>".$row["price"]."</td>\n" .
		  "  <td>".$row["ISBN"]."</td>\n" .
          " </tr>\n";
			}
            
           echo"</table>";  
        }
        else{ 
            echo "No Books!";
        }
}        
?>
