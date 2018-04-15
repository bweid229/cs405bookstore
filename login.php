
<?php	
	session_start(); // Starting Session
   include 'phhadd.php';
mysqli_select_db($conn, "bookstore_test4") or die(mysqli_error($conn));
	$email = $_POST['email'];
	$password = $_POST['password']; 
         
        $password = htmlspecialchars($password); 
		$email = htmlspecialchars($email); 
	
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $password = mysqli_real_escape_string($conn, $password);
		$email = mysqli_real_escape_string($conn, $email);
		

        $results = mysqli_query($conn, "SELECT * FROM user_table
            WHERE `email` = '$email' AND `user_password` = '$password'")  or die(mysqli_error($conn));
		echo  '<a href="homepage.php">.Go back to Home.</a>'."\n\n";
		echo "\n";
        if(mysqli_num_rows($results) == 0){ 
			echo "Email or password incorrect"."\n\n";
			echo' <a href=createuser.php>.Click Here to create a new user.<\a>'."\n\n";
			echo' <a href=loginpg.php>.Or Click here to try again.<\a>';
            
		}
		
		else{
			$row = mysqli_fetch_assoc($results);
			 echo "Login Successful!"."\n\n";
			 echo "Welcome".$row['Fname'];
			 $_SESSION['login_user']=$userID;
			
		}

?>