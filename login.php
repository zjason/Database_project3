<?php
session_start();
$user = $_POST['email'];
$pass = md5($_POST['password']);

$dbconnect = pg_connect("dbname=zjason
                user=zjason password=123456") or
                die('fail to connect:'.pg_last_error());

$query="select * from user_info where user_id = $user";
$queryresult = pg_query($query) or die('query
                        failed:'.pg_last_error());
$arr = pg_fetch_all($queryresult);
$user_id_check = $arr['user_id'];
$username_check = $arr['username'];
$pass_check= $arr['password'];
if($user == $user_id_check && $pass == $pass_check){	
	$_SESSION['user'] = $username_check;
	$_SESSION['user_id'] = $user_id_check;
	header('Location: http://cs4604.cs.vt.edu/~zjason/index.php');
}else{
	header('Location: http://cs4604.cs.vt.edu/~zjason/feedback.html?error=3');
}

?>