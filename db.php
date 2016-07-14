<?php

$connection = mysqli_connect('default_server', 'default_username', 'deafult_pw', 'tablename_to_check')//fill in default server, username, pw
		
		if(!$connection){
			die("Database connection failed");
		}

		?>




<?php

		//from create

		$connection = mysqli_connect('default_server', 'default_username', 'deafult_pw', 'tablename_to_check')//fill in default server, username, pw
		if($connection){
			echo "Record Created";
		}else {
			die("Database connection failed");
		}