
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Gill Sans, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #58d68d;
}

.topnav a {
  float: left;
  display: block;
  color:   #273746 ;
  text-align: center;
  padding: 10px 14px;
  text-decoration: none;
  font-size: 14px;
}

.topnav a:hover {
  background-color:  #d5f5e3;
  color:  #283747;
}

.topnav a.active {
  background-color: #48c9b0
;
  color: white;
}

.topnav input[type=text] {
  float: right;
  padding: 6px;
  margin-top: 4px;
  margin-right: 4px;
  border: none;
  font-size: 14px;
}

@media screen and (max-width: 600px) {
  .topnav a, .topnav input[type=text] {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}

.topnav .search-container button {
  float: right;
  padding: 6px;
  margin-top: 4px;
  margin-right: 5px;
  background: #ddd;
  font-size: 14px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #d5f5e3;
}

</style>
<?php
    include 'phhadd.php';
if(isset($_GET['query'])){
mysqli_select_db($conn, "bookstore_test4") or die(mysqli_error($conn));
    $query = $_GET['query']; 
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysqli_real_escape_string($conn, $query);
        // makes sure nobody uses SQL injection
         
        $results = mysqli_query($conn, "SELECT `title` , `price`, `ISBN` FROM books
            WHERE (`title` LIKE '%".$query."%') OR (`title` LIKE '%".$query."%')") or die(mysqli_error($conn));
         
		echo  '<a href="index.php">.Go back to Home.</a>';
		echo "\n";
        if(mysqli_num_rows($results) > 0){ 
             
			while ($row = mysqli_fetch_assoc($results)) {
				echo "<table>".
				"<tr>".
				"<th>ISBN</th>".
				"<th>Price</th>".
				"<th>ISBN</th>".
				"</tr>";
				echo"<tr>\n" .
					"  <td>".$row["title"]."</td>\n" .
					"  <td>".$row["price"]."</td>\n" .
					"  <td>".$row["ISBN"]."</td>\n" .
					" </tr>\n";
				} 
			
				echo"</table>";  

             
        }
        else{ 
            echo "No results";
        }
	
}        
?>