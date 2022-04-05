<html>
<body>



Welcome <?php echo $_POST["usernameid"]; ?><br><br>
Your email is: <?php echo $_POST["emailid"]; ?><br><br>
This is a list of other users who also logged in to become Aaron's fans <3
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



</body>
</html>