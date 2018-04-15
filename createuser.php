<!DOCTYPE html>
<html>
<body>
<style>

</style>
<?php include 'searchbar.php';?>

<form action="makeuser.php" method = "post">

Email:<br> <input type="email" name="email" required><br>
First Name:<br> <input type="text" name="fname"required><br>
Middle Name:<br> <input type="text" name="mname"><br>
Last Name:<br> <input type="text" name="lname"required><br>
Password:<br> <input type="password" name="password"required><br>
Gender:<br> 
   <input type="radio" name="gender" value="male"> Male<br>
  <input type="radio" name="gender" value="female"> Female<br>
  <input type="radio" name="gender" value="other" checked> Other/No Answer<br>
  Age:<br> <input type="number" name="age"required>
<input type="submit">
<input type="reset">
</form>
<a href = "loginpg.php"> Already a user? Click here</a>
</body>
</html>>
