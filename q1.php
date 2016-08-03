<?php
	$dbconnect = pg_connect("dbname=smokeymountain
	 	user=zjason password=123456") or
		die('fail to connect:'.pg_last_error());

	$query="select * from collections LIMIT 5";
	$queryresult = pg_query($query) or die('query
			failed:'.pg_last_error());
	$row = pg_fetch_row($queryresult);
	echo $row[0];
?>

<html>
<head>
<title></title>
</head>
<body>
<h3>List the 10 latest publications by author 'Philip S. Yu'</h3>
</body>
</html>