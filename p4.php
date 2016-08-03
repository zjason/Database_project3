<html>
<head>
<title></title>
</head>
<body>
<h3>List the 20 website information</h3>
<div align=center>
<table border=1>
<tr><td>dblp_key</td><td>title</td><td>year</td><td>rul</td></tr>
<?php
        $dbconnect = pg_connect("dbname=zjason
                user=zjason password=123456") or
                die('fail to connect:'.pg_last_error());

        $query="select p.* from www as w, publication as p where 
                w.dblp_key = p.dblp_key limit 20";
        $queryresult = pg_query($query) or die('query
                        failed:'.pg_last_error());
        $arr = pg_fetch_all($queryresult);
        for($x=0;$x<20;$x++){
          $dblp_key = $arr[$x]['dblp_key'];
          $title = $arr[$x]['title'];
          $url = $arr[$x]['url'];
            echo "<tr><td>$dblp_key</td>
                      <td>$title</td>
                      <td>$year</td>
                      <td><a href='$url'>$url<a></td></tr>";
        }
?>
</table>
</div>
</body>
</html>