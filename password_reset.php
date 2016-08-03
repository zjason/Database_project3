<?php
session_start();
if(isset($_SESSION['user_id'])){
	$user_id = $_SESSION['user_id'];
	$new_password = $_POST['password'];
	$dbconnect = pg_connect("dbname=zjason
                user=zjason password=123456") or
                die('fail to connect:'.pg_last_error());

	$query="update user_info set password = $1 where user_id = $user_id";
	$queryresult = pg_query_params($dbconnect,$query,array($new_password)) or die('query
                        failed:'.pg_last_error());
	header('Location: http://cs4604.cs.vt.edu/~zjason/feedback.php?feedback=2');
}else{
	header('Location: http://cs4604.cs.vt.edu/~zjason/index.php');
}

?>