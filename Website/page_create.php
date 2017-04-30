<?php
$conn = new mysqli('localhost','root','','nasa');
?>
<html>
<head>
    <title>Create a Page</title>
</head>
<body>

<form action="page_create.php" method="post">
    <p>Please enter an acronym AND it's uncontracted form to make an entry about it. Note that said acronym should be registered first in the
        acronym master list AND that it shouldn't already have a page. Otherwise, go to the desired page's location to edit it </p>
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
            <td>Definition</td>
            <td><textarea cols="100" rows="40" name="definition"></textarea></td>
        </tr>
        <tr>
            <td>Contributor</td>
            <td><input type="text" name="contributor"/></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Submit"/></td>
        </tr>
    </table>
</form>
<?php
$acronym = $_POST['acronym'];
$acronym = str_replace(' ','',$acronym);
$meaning = ucwords(strtolower($_POST['meaning']));
$definition = $_POST['definition'];
$contributor = $_POST['contributor'];
if($conn -> query("insert into acronym_masterlist values('$acronym','$meaning');") == TRUE)
{
    if($conn->query("insert into acronym_define(acronym_def, meaning_def,definition, csourced, contributor) values ('$acronym','$meaning','$definition',TRUE,'$contributor')")
    == TRUE)
    {
        echo "All Records successfully saved";
        echo $acronym;
        echo nl2br("\n");
        echo $meaning;
        echo nl2br("\n");
        echo $definition;
        echo nl2br("\n");
        echo $contributor;
        echo nl2br("\n");
    }
    else
    {
        echo "Records unsucessfully saved";
    }
}
else
{
    echo "Acronym name or meaning incorrect";
}
?>
</body>
</html>