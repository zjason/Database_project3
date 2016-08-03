<html>
<head>
<title></title>
</head>
<body>
<h3>List the 150 Reference from reference table</h3>
<div align=center>
<table border=1>
<tr><td>id</td><td>ref_id</td></tr>
<?php
        $dbconnect = pg_connect("dbname=zjason
                user=zjason password=123456") or
                die('fail to connect:'.pg_last_error());

        $query="select * from reference limit 500";
        $queryresult = pg_query($query) or die('query
                        failed:'.pg_last_error());
        $arr = pg_fetch_all($queryresult);
        for($x=0;$x<500;$x++){
          $id = $arr[$x]['id'];
          $ref_id = $arr[$x]['ref_id'];
            echo "<tr><td>$id</td>
                      <td>$ref_id</td></tr>";
        }
?>
</table>
</div>
</body>
</html>