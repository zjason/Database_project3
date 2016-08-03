<?php
        $dbconnect = pg_connect("dbname=zjason
                user=zjason password=123456") or
                die('fail to connect:'.pg_last_error());

        $query="select count(inproceedings_pubs.*)
from (
  select *
  from inproceedings
  natural join publication
) as inproceedings_pubs, (
  select *
  from article
  natural join publication
) as article_pubs
where inproceedings_pubs.title = article_pubs.title and inproceedings_pubs.year < article_pubs.year";
        $queryresult = pg_query($query) or die('query
                                        failed:'.pg_last_error());
        $arr = pg_fetch_all($queryresult);
        if ($arr[0] === null){
                echo "No query result found!";
        }else{
                $col = count($arr[0]);
                echo "<div align=center><table border=1><tr>";
                for($i = 0; $i < $col; $i++){
                        $table_field = pg_field_name($queryresult,$i);
                        echo "<td>$table_field</td>";
                }
                echo "</tr>";
                for($x = 0; $x < count($arr); $x++){
                        echo "<tr>";
                        for($t = 0; $t < $col; $t++){
                                $field_name = pg_field_name($queryresult,$t);
                                $text = $arr[$x][$field_name];
                                echo "<td>$text</td>";
                        }
                        echo "</tr>";
                }
                echo "</table></div>";
        }
?>