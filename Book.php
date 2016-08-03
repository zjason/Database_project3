<html>
<head>
<title></title>
</head>
<body>
<h3>List the 300 Books from book table</h3>
<div align=center>
<table border=1>
<tr><td>dblp_key</td><td>publisher</td><td>series</td><td>isbn</td></tr>
<?php
        $dbconnect = pg_connect("dbname=zjason
                user=zjason password=123456") or
                die('fail to connect:'.pg_last_error());

        $query="select * from book limit 300";
        $queryresult = pg_query($query) or die('query
                        failed:'.pg_last_error());
        $arr = pg_fetch_all($queryresult);
        for($x=0;$x<300;$x++){
          $dblp_key = $arr[$x]['dblp_key'];
          $publisher = $arr[$x]['publisher'];
          $series = $arr[$x]['series'];
          $isbn = $arr[$x]['isbn'];
            echo "<tr><td>$dblp_key</td>
                      <td>$publisher</td>
                      <td>$series</td>
                      <td>$isbn</td></tr>";
        }
?>
</table>
</div>
</body>
</html>