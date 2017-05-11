<?php

function check($rating_num)
{
    if($rating_num == null)
    {
        throw new Exception($rating_num=0);
    }
    return $rating_num;
}
$acronym = $_POST['acronym'];
$meaning = $_POST['meaning'];
@$rating = $_POST['rating'];

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
<html>
<head>
    <title>MMC | <?php echo $acronym . " - " . $meaning?></title>
    <link rel="stylesheet" type="text/css" href="Resources/dictionary.css">
	<link rel="icon" type="image/png" href="Resources/Images/MMClogo.png">
	<meta name="viewport" content="width=device-width"/>
	<script src='Resources/jquery.min.js'></script>
	<script src='Resources/textrotator.js'></script>
	<script>
		$(document).ready(function(){
			$(".slogan .rotate").textrotator({
				animation: "flipCube",
				speed: 2500
			});
		});
	</script>
	<link rel="stylesheet" type="text/css" href="Resources/textrotator.css" />
</head>
<body>
<div id="fullwidth" style="height: 65px;">
		<h1 style="display: inline;"> <a href="index.html"><img id="logo" src="Resources\Images\MMCwordmark.png"\></a></h1>
	</div>
	<header id="header1">
		<h1 class="slogan"><span class="rotate">NASA'S MANILA INFORMATION CENTER, WHERE DREAMERS ARE BORN, AND SCIENTISTS COME TO PLAY, START YOUR MISSION TODAY</span></h1>
		<button class="buttinvert" onclick="Redirect()">Launch Idea</button>
	</header>
<div class="mainbody">
    <div id="stuffcontainer">
        <h6 style="margin-bottom: 0px;">Article ID: <?php echo $id ?></h6>
        <h1 style="margin-top: 0px; margin-bottom: 0px;">Acronym: <?php echo $acronym?></h1>
        <h1 style="margin-top: 0px; margin-bottom: 0px;">Full Form : <?php echo "$meaning"?></h1>
        <br/><br/>
        <h6 style="margin-top: 0px;">Definition: </h6>
        <?php
        if($definition == null)
        {
            echo "<h4 style='margin-top: 0px;'>[Looks like this article is devoid of all signs of life!]</h4>";
        }
        else
        {
            echo "<h4 style='margin-top: 0px;'>";
            echo $definition;
            echo "</h4>";
        }
        ?>
        <h6 style="margin-top: 0px;">User Rating: </h6>
        <?php
        if($user_rating == null)
        {
            echo "<h4 style='margin-top: 0px;'>Unrated</h4>";
        }
        else
        {
            echo "<h4 style='margin-top: 0px;'>";
            echo "$user_rating";
            echo "</h4>";
        }
        ?>
        <h4><?php
            if($csourced == True)
            {
                echo "<h6 style='margin-top: 0px;'>";
                echo "Status:";
                echo "</h6>";
                echo "<h4 style='margin-top: 0px;'>Modified by a third party</h4>";
            }
            else
            {
                echo "<h6 style='margin-top: 0px;'>";
                echo "Status:";
                echo "</h6>";
                echo "<h4 style='margin-top: 0px;'>Verified/published by NASA.</h4>";
            }
            ?>
        </h4>
        <h6 style="margin-top: 0px;">Contributor: </h6h4>
        <?php
            if ($contributor != null)
            {
                echo "<h4 style='margin-top: 0px;'>";
                echo $contributor;
                echo "</h4>";
            }
            else
            {
                echo "<h4 style='margin-top: 0px;'>";
                echo "NASA";
                echo "</h4>";
            }
            ?>
        <form action="rating.php"  method="post" style="color: white; font-size: 25px;">
            <h6 style="margin-top: 0px; padding-left: 0px;">If you would, please take the time to rate this article</h6>
            <br/>
            1<input type="radio" name="rating" value = 1 />
            2<input type="radio" name="rating" value = 2 />
            3<input type="radio" name="rating" value = 3 />
            4<input type="radio" name="rating" value = 4 />
            5<input type="radio" name="rating" value = 5 />
            <input type="submit" name="submit" style="font-size: 17px; padding: 10px;" value="Submit Review"/>
            <input type="text" name="acronym" value="<?php echo $acronym ?>" style="visibility:hidden"/>
            <input type="text" name="meaning" value="<?php echo $meaning ?>" style="visibility:hidden"/>
        </form>

        <h6 style="margin-top: 0px;">Think you know better? Why not take the time to improve this page's main content?</h6>
        <form action=" edit_content.php" method="post">
            <textarea rows="40" class="infocontainer" style="border: 0px solid transparent; color: white; font-family: Segoe UI Semilight; font-size: 12px; width: 95%; margin-bottom: 20px;" cols=100 name="content">Enter revised version here</textarea>
            <br/>
            <input type="submit" name="submit" value="Submit"/>
            <input type="text" name="acronym" value="<?php echo $acronym ?>" style="visibility:hidden"/>
            <input type="text" name="meaning" value="<?php echo $meaning ?>" style="visibility:hidden"/>
        </form>
    </div>
</div>
<footer>
		<a href="Resources\Images\NASAlogo.png" target='_blank'>
			<img src="Resources\Images\NASAlogo.png"\>
		</a>
		<div class="footcontain">
			<h4>About NASA</h4>
			<p>Learn more about the National Aeronautics and Space Administration, its projects, how it functions, and the people behind it. </p>
			<ul>
			<li><a href="https://www.nasa.gov/">NASA website</a></li>
			<li><a href="https://www.nasa.gov/about/index.html">About NASA</a></li>
			<li><a href="https://www.nasa.gov/about/people">People at NASA</a></li>
			</ul>
		</div>
		<div class="footcontain">
			<h4>Missions</h4>
			<ul>
			<li><a href="https://www.nasa.gov/mission_pages/station/main/index.html">International Space Station</a></li>
			<li><a href="https://www.nasa.gov/mission_pages/juno/main/index.html">Juno: Mission at Jupiter</a></li>
			<li><a href="https://www.nasa.gov/mission_pages/newhorizons/main/index.html">New Horizons: Pluto and Beyond</a></li>
			<li><a href="https://www.nasa.gov/mission_pages/cassini/main/index.html">Cassini Mission at Saturn</a></li>
			<li><a href="https://www.nasa.gov/mission_pages/msl/index.html">Curiousity Mars Rover</a></li>
			<li><a href="https://www.nasa.gov/mission_pages/hubble/main/index.html">Hubble Space Telescope</a></li>
			<li><a href="https://www.nasa.gov/missions/">All Missions (A-Z)</a></li>
			<li><a href="https://www.nasa.gov/launchschedule">Launches and Landings</a></li>
			</ul>
		</div>
		<div class="footcontain">
			<h4>Other NASA Links</h4>
			<ul>
			<li><a href="http://blogs.nasa.gov/">Blog</a></li>
			<li><a href="https://www.nasa.gov/about/exhibits/index.html">Exhibit</a></li>
			<li><a href="https://www.nasa.gov/multimedia/nasatv/index.html">NASA TV</a></li>
			<li><a href="https://www.nasa.gov/connect/apps.html">NASA Apps</a></li>
			<li><a href="https://www.nasa.gov/socialmedia">Social Media</a></li>
			<li><a href="https://www.nasa.gov/content/ultra-high-definition-video-gallery/index.html">Video Galleries</a></li>
			<li><a href="https://www.nasa.gov/multimedia/imagegallery/index.html">Image Galleries</a></li>
			</ul>
		</div>
	</footer>
	<footer id="apcfooter">
		<center>Coded with <a href="Resources\Images\APC-Hymn.jpg">&#10084;</a> by the students of <a href="https://apc.edu.ph/" target='_blank'>Asia Pacific College</a></center>
	</footer>
</body>
</html>