<html>
<head>
<title></title>
</head>
<body>
<h3>List the all www from www table</h3>
<div align=center>
<table border=1>
<tr><td>dblp_ley</td></tr>
<?php
        $dbconnect = pg_connect("dbname=zjason
                user=zjason password=123456") or
                die('fail to connect:'.pg_last_error());

        $query="select * from www limit 500";
        $queryresult = pg_query($query) or die('query
                        failed:'.pg_last_error());
        $arr = pg_fetch_all($queryresult);
        for($x=0;$x<500;$x++){
          $id = $arr[$x]['dblp_key'];
          if($id != ""){
            echo "<tr><td>$id</td></tr>";
          }else{
            break;
          }
        }
?>
</table>
</div>
</body>
</html>