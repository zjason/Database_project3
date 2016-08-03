
<?php
$username=$_GET['user'];
$dbconnect = pg_connect("dbname=zjason
          user=zjason password=123456") or
          die('fail to connect:'.pg_last_error());

$query="select username,topic from user where name='$username'";
$queryresult = pg_query($query) or die('query
          failed:'.pg_last_error());
      $arr = pg_fetch_all($queryresult);
      $topic = $arr['topic'];
      echo "$username like those topic: $topic";

?>

