<html>
<body>

<!--This is the home page that will display after a successful login-->

<!--This shows the user the username, email, and password that they used to log in-->

Welcome <?php echo $_POST["usernameid"]; ?><br><br>
Your email is: <?php echo $_POST["emailid"]; ?><br><br>
Your password is: <?php echo $_POST["pass"]; ?><br><br>

This is a list of other users who also logged in to become Aaron's fans <3

<!--This part of the code stores the information of users that logged in as well as other usernames that people used to log in-->
<?php 
	
$user = "alex_user";
$password = "password";
$database = "aaron_rodgers_database";
$table = "fans_list";
$usernamepost = $_POST["usernameid"];
$emailpost = $_POST["emailid"];
$passpost = $_POST["pass"];



try {
	$db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
	//This is a loop that is used for displaying other people who signed into our site. 
	foreach($db->query("SELECT username FROM $table") as $row) {
		echo "<li>" . $row['username'] . "</li>";
	}
	echo "</ol>";
	
	//This array contains parameters that will be used to insert users' information into the database. 
	$insert_params = array($usernamepost, $emailpost, $passpost);
	$insert_statement = $db->prepare("INSERT INTO fans_list (username, email, password) VALUES (?, ?, ?)");
	$insert_statement->execute($insert_params);
	
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>

<!--This part of the code allows you to log out (go back to index.html)-->

You can log out here: 				
<a href="project1_logout.php">Logout</a> <br> <br>

<!--This part of the code allows you to reset your password-->

Are you unhappy with your password? You can reset it here:

<form action="project1_new_pass.php" method="post">
	<input type="text" name="newpassid" id="newpassid">
	<input type="submit"/>
</form>


</body>
</html>