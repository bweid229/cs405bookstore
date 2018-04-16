<?php	
   include 'phhadd.php';
mysqli_select_db($conn, "bookstore_test4") or die(mysqli_error($conn));
	$email = $_POST['email'];
	$password = $_POST['password']; 
    $fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	if($gender =="male"){
	$gender = 0;}
	if($gender == "female"){
	$gender = 1;}
	else{
		$gender = NULL;
	}
	
        $password = htmlspecialchars($password); 
		$email = htmlspecialchars($email); 
	
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $password = mysqli_real_escape_string($conn, $password);
		$email = mysqli_real_escape_string($conn, $email);
		
	
        $sql = "INSERT INTO user_table(fname, mname, lname, gender, age, user_password, email, user_type)
		VALUES ('$fname', '$mname', '$lname', $gender, $age, '$password', '$email', 1)";
		if(!isset($mname) && !isset($gender)){
			$sql = "INSERT INTO user_table(fname, lname, age, user_password, email, user_type)
		VALUES ('$fname', '$lname', $age, '$password', '$email', 1)";
		}
		
		else if(!isset($mname)){
			$sql = "INSERT INTO user_table(fname, lname, gender, age, user_password, email, user_type)
		VALUES ('$fname', '$lname', $gender, $age, '$password', '$email', 1)";
		}
		
		else if(!isset($gender)){$sql = "INSERT INTO user_table(fname, mname, lname, age, user_password, email, user_type)
		VALUES ('$fname', '$mname', '$lname', $age, '$password', '$email', 1)";
		}
			
		echo  '<a href="index.php">.Go back to Home.</a>'."\n\n";
		echo "\n";
        if($conn->query($sql) == TRUE){ 
			 echo "New user created successfully!";
			 echo' <a href=loginpg.php>.Or Click here to login as new user.<\a>';
   
		}
		
		else{
			echo "Something went wrong"."\n\n";
			echo $sql;
			echo' <a href=loginpg.php>.Or Click here to login an exisitng user.<\a>';
			
		}
		



?>