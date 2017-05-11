<?php
    $acronym = $_POST['acronym'];
    $meaning = $_POST['meaning'];
    $rating = $_POST['rating'];
    $connection = new mysqli('localhost','root','','nasa');
    if($rating != null)
    {
        $connection->query("update acronym_define set user_rating = $rating where acronym_def = '$acronym' and meaning_def = '$meaning'");
    }
    $result = $connection -> query("select * from acronym_define where acronym_def = '$acronym' and meaning_def= '$meaning'");
    $numrows = $result -> num_rows;
    for($i=0;$i<$numrows;$i++)
    {
        $row = $result -> fetch_assoc();
        $id = $data[$i][0] = $row['id'];
        $acronym = $data[$i][0] = $row['acronym_def'];
        $meaning = $data[$i][0] = $row['meaning_def'];
        $definition = $data[$i][0] = $row['definition'];
        $user_rating = $data[$i][0] = $row['user_rating'];
        $csourced = $data[$i][0] = $row['csourced'];
        $contributor = $data[$i][0] = $row['contributor'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $acronym . " - " . $meaning?></title>
    <script>
        function Ayylmao() {
            alert("Oy!");
            location.reload();
        }
    </script>
</head>
<body>
    <h3>Article ID: <?php echo $id ?></h3>
    <h4>Acronym: <?php echo $acronym?></h4>
    <h4>Full Form : <?php echo "$meaning"?></h4>
    <h4>Definition: </h4>
    <?php
        if($definition == null)
        {
            echo "Looks like this article is devoid of all signs of life!";
        }
        else
        {
            echo $definition;
        }
    ?>
    <h4>User Rating: </h4>
    <?php
        if($user_rating == null)
        {
            echo "Unrated";
        }
        else
        {
            echo "$user_rating";
        }
    ?>
    <h4>
        <?php
            if($csourced == True)
            {
                echo "Status: Modified by a third party";
            }
            else
            {
                echo "Status: Verified";
            }
        ?>
    </h4>
    <h4>Contributor: </h4>
    <h4>
        <?php
            if ($contributor != null)
            {
                echo $contributor;
            }
            else
            {
                echo "Original";
            }
        ?>
    </h4>
    <form action="rating.php"  method="post">
        <h3>If you would, please take the time to rate this article</h3>
        1<input type="radio" name="rating" value = 1 />
        2<input type="radio" name="rating" value = 2 />
        3<input type="radio" name="rating" value = 3 />
        4<input type="radio" name="rating" value = 4 />
        5<input type="radio" name="rating" value = 5 />
        <input type="text" name="acronym" value="<?php echo $acronym ?>" style="visibility:hidden"/>
        <input type="text" name="meaning" value="<?php echo $meaning ?>" style="visibility:hidden"/>
        <input type="submit" name="submit" value="Submit Revue"/>
    </form>
    <h4>Think you know better? Why not take the time to improve this page's main content?</h4>
    <form action=" edit_content.php" method="post">
        <textarea rows="40" cols=100 name="content">Enter revised version here</textarea>
        <input type="submit" name="submit" value="Submit"/>
        <input type="text" name="acronym" value="<?php echo $acronym ?>" style="visibility:hidden"/>
        <input type="text" name="meaning" value="<?php echo $meaning ?>" style="visibility:hidden"/>
    </form>
</body>
</html>