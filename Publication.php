<html>
<head>
<title></title>
</head>
<body>
<h3>List the 150 publications from publication table</h3>
<div align=center>
<table border=1>
<tr><td>dblp_key</td><td>title</td><td>year</td><td>doi</td><td>url</td></tr>
<?php
        $dbconnect = pg_connect("dbname=zjason
                user=zjason password=123456") or
                die('fail to connect:'.pg_last_error());

        $query="select * from publication limit 500";
        $queryresult = pg_query($query) or die('query
                        failed:'.pg_last_error());
        $arr = pg_fetch_all($queryresult);
        for($x=0;$x<500;$x++){
          $dblp_key = $arr[$x]['dblp_key'];
          $title = $arr[$x]['title'];
          $year = $arr[$x]['year'];
          $doi = $arr[$x]['doi'];
          $url = $arr[$x]['url'];
            echo "<tr><td>$dblp_key</td>
                      <td>$title</td>
                      <td>$year</td>
                      <td>$doi</td>
                      <td>$url</td></tr>";
        }
?>
</table>
</div>
</body>
</html>