<?php include "db.php"; ?>
<?php

function createRows(){

if(isset($_POST['submit'])){  //if form is submitted...
	global $connection;
	$username = $_POST['username']; // assign $username and $pw to username and pw data from form..
	$password = $_POST['password'];



	$username =  mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);

	$hashFormat = "$2y$10$"; //tells crypt function how many times to run the hash

	$salt = "iusesomecrazystrings22"; // at least 22 characters

	$hashFormat_and_salt = $hashFormat . $salt;
 	
 	$encrypt_pw = crypt($password, $hashFormat_and_salt);




		$query = "INSERT INTO tablename_to_check(username, password)";  //refers to same username and pw $username and $pw refer to
		$query . = "VALUES ('$username', '$password')";

		$result = mysqli_query($connection, $query);

			if(!$result){
				die('Query failed' . mysqli_error());
			}else{
				echo "Record Created"
			}
		}
	}

function readRows(){

	global $connection;
	$query = "SELECT * FROM tablename_to_check";
	$result = mysqli_query($connnection, $query);

	if(!result){
		die('Query Failed' . mysqli_error());
	}

	while($row = mysqli_fetch_assoc($result)){  //to read data...assigns fetch row function to $row
  		
  			print_r($row); //will print table as an associative array-->id, username, pw

  		}





}






function showAllData(){
global $connection;
$query = "SELECT * FROM tablename_to_check";
		$result = mysqli_query($connection, $query);

			if(!$result){
				die('Query failed' . mysqli_error());
			}

			while ($row = mysqli_fetch_assoc($result)) {
				$id = $row['id'];

				echo "<option value='$id'>$id</option>";
			}

}



function updateTable(){
	if(isset($_POST	['submit'])) {
	global $connection;
	$username = $_POST['username'];
	$password = $_POST['password'];
	$id = $_POST['id'];

	$query = "UPDATE tablename_to_check SET ";  
	$query . = "username = '$username', "; //make sure to name the username column in your database 'username'
	$query . = "password = '$password' "; //make sure to name the pw column in your database 'password'
	$query . = "WHERE id = $id ";

		$result = mysqli_query($connection, $query);
		if(!$result) {
			die("Query Failed" . mysqli_error($connection))
		}else {
			echo "Record Updated";
		}
}
}

function deleteRows(){

	if(isset($_POST	['submit'])) {
	global $connection;
	$username = $_POST['username'];
	$password = $_POST['password'];
	$id = $_POST['id'];

	$query = "DELETE FROM tablename_to_check ";  
	$query . = "WHERE id = $id ";

		$result = mysqli_query($connection, $query);
		if(!$result) {
			die("Query Failed" . mysqli_error($connection))
		}else{
			echo "Record Deleted";
		}

	}

}





















?>