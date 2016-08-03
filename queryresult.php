<?php
	$dbconnect = pg_connect("dbname=zjason
	 	user=zjason password=123456") or
		die('fail to connect:'.pg_last_error());

	$query=$_POST['query'];
	$queryresult = pg_query($query) or die('query
					failed:'.pg_last_error());
	$arr = pg_fetch_all($queryresult);
	if ($arr[0] === null){
		echo "No query result found!";
	}else{
		$col = count($arr[0]);
		echo "<div align=center><table border=1>";
		for($x = 0; $x < count($arr); $x++){
			echo "<tr>";
			for($t = 0; $t < $col; $t++){
				$text = $arr[$x][$t];
				echo "<td>$text</td>";
			}
			echo "</tr>";
		}
		echo "</table></div>"
	}
?>