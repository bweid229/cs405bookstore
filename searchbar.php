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
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include 'search.php';
?>

</head>
<body>

<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="browse.php">Browse</a>
  <a href="loginpg.php">Login</a>
    <a href="cart.php">Cart</a>

<?php if(isset($_SESSION['login_type'])){
	if($_SESSION['login_type'] == 1){
		
	echo "<a href='manager.php'>Manage</a>";
	}
}
?>

  <div class="search-container">
    <form action="search.php"method="GET">
		<input type="text" name="query" placeholder="search" >
    </form>
  </div>

</div>

