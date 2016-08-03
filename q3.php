<?php
        $dbconnect = pg_connect("dbname=zjason
                user=zjason password=123456") or
                die('fail to connect:'.pg_last_error());

        $query="select a1.author as author_name, count(*) as num_collaborators
from (
  select *
  from article
  natural join article_write
) as a1, (
  select *
  from article
  natural join article_write
) as a2
where a1.dblp_key = a2.dblp_key and a1.author <> a2.author
group by a1.author
order by num_collaborators desc
limit 10";
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