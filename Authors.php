<html>
<head>
<title></title>
</head>
<body>
<h3>List the 200 Authors from authors table</h3>
<div align=center>
<table border=1>
<tr><td>Author's name</td></tr>
<?php
        $dbconnect = pg_connect("dbname=zjason
                user=zjason password=123456") or
                die('fail to connect:'.pg_last_error());

        $query="select * from authors limit 200";
        $queryresult = pg_query($query) or die('query
                        failed:'.pg_last_error());
        $arr = pg_fetch_all($queryresult);
        for($x=0;$x<200;$x++){
          $name = $arr[$x]['name'];
          if($id != ""){
            echo "<tr><td>$name</td></tr>";
          }else{
            break;
          }
        }
?>
</table>
</div>
</body>
</html>