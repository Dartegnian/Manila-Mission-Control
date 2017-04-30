<html>
<head>
    <title>Insert - Proto</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
$acronym = $_POST["acronym"];
$meaning = $_POST['meaning'];
$server = "localhost";
$user = "root";
$pass = "";
$db_name = "nasa";

$db_gen= new mysqli($server,$user,$pass);
$db_spec = new mysqli($server,$user,$pass,$db_name);

echo "Acronym: " . $acronym;
echo nl2br("\n");
echo "Meaning: " . $meaning;

if($db_spec -> query("insert into acronym_masterlist values(default,'$acronym','$meaning')") == TRUE)
{
    echo "Records saved successfully";
    echo nl2br("\n");
}
else
{
    echo "Error";
    echo nl2br("\n");
}
$results = $db_spec -> query("select * from acronym_masterlist");
echo $results;


?>
<h1>Entry Form</h1>
<form action="insert.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Acronym</td>
            <td><input type="text" name="acronym"/></td>
        </tr>
        <tr>
            <td>Meaning</td>
            <td><input type="text" name="meaning"/></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Submit"/></td>
        </tr>
    </table>
</form>
</body>
</html>
