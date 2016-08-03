<?php
session_start();
if(isset($_SESSION['user'])){
	$dblp_key_post = $_POST['dblp_key'];
	$current_user_id = $_SESSION['user_id'];
	$dbconnect = pg_connect("dbname=zjason
             user=zjason password=123456") or
             die('fail to connect:'.pg_last_error());
    $query = "select * from favorite where user_id = $1 and dblp_key = $2";
    $queryresult = pg_query_params($dbconnect, $query, array($current_user_id,$dblp_key_post)) or die ('query
                        failed:'.pg_last_error());
    $arr = pg_fetch_all($queryresult);
    if($arr[0] == null){
    	$insert_query="select * from user_info where user_id = $1";
		$insertresult = pg_query_params($dbconnect,$insert_query,array($current_user_id)) or die 
					('Insertion failed:'.pg_last_error());
		echo "add to favorite!";
    }else{
    	echo "you already at it as favorite";
    }
}else{
	header('Location: http://cs4604.cs.vt.edu/~zjason/index.php')
}
?>