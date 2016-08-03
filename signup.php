<?php
session_start();
$username_post = $_POST['username'];
$user_id_post = $_POST['email'];
$pass_post = md5($_POST['password']);

$dbconnect = pg_connect("dbname=zjason
             user=zjason password=123456") or
             die('fail to connect:'.pg_last_error());
// check user_id
$query1="select * from user_info where user_id = $1";
$queryresult1 = pg_query_params($dbconnect,$query1,array($user_id_post)) or die('query
                        failed:'.pg_last_error());
$arr1 = pg_fetch_all($queryresult1);
// check username
$query2="select * from user_info where username = $1";
$queryresult2 = pg_query_params($dbconnect,$query2,array($username_post)) or die('query
                        failed:'.pg_last_error());
$arr2 = pg_fetch_all($queryresult2);
if($arr1[0] == null && $arr2[0] == null){
        $insert_query = "insert into user_info(user_id, username, password) VALUES($1,$2,$3)";
        $insert_result = pg_query_params($dbconnect, $insert_query, array($user_id_post,$username_post,$pass_post))
        or die('Insertion failed:'.pg_last_error());
        $_SESSION['user'] = $username;
        header('Location: http://cs4604.cs.vt.edu/~zjason/index.php');
}elseif($arr1[0] != null){
        header('Location: http://cs4604.cs.vt.edu/~zjason/signup_error.html?feedback=0');
}elseif ($arr2[0] != null){
        header('Location: http://cs4604.cs.vt.edu/~zjason/signup_error.html?feedback=1');
}

?>