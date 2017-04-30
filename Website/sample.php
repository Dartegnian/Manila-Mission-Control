<?php
$connect = new mysqli('localhost','root','','nasa');
$connect -> query("create table if not exists sample(id int PRIMARY KEY  not null,name varchar(30) not null)");
//$connect -> query("insert into sample values(0,'Logan')");
$query = $connect -> query("select * from sample where id=0");
if (is_null($query))
{
    echo "Array is empty";
}
else
{
    echo "Array has contents";
}




?>

</body>
</html>
