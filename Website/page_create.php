<?php
$conn = new mysqli('localhost','root','','nasa');
?>
<html>
<head>
    <title>MMC | Create A Page</title>
	<link rel="stylesheet" type="text/css" href="Resources/dictionary.css">
	<link rel="icon" type="image/png" href="Resources/Images/MMClogo.png">
	<meta name="viewport" content="width=device-width" />
	<script src='Resources/jquery.min.js'></script>
	<script src='Resources/textrotator.js'></script>
	<script src='Resources/fluidvids.js'></script>
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
	</header>
<div class="mainbody">
    <div id="stuffcontainer">
        <form action="page_create.php" method="post">
        <p>Please enter an acronym AND it's uncontracted form to make an entry about it. Note that said acronym should be registered first in the
            acronym master list <strong>AND</strong> that it shouldn't already have a page. Otherwise, go to the desired page's location to edit it </p>
            <br/>
            <br/>
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
            <tr>
                <td>Contributor</td>
                <td><input type="text" name="contributor"/></td>
            </tr>
                <td>Definition</td>
                <td><textarea cols="100" rows="40" name="definition"></textarea></td>
            </tr>
            <tr>
                <td></td>
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
                echo "<h1>All Records successfully saved!</h1>";
            }
            else
            {
                echo "<h1>Records unsucessfully saved.</h1>";
            }
        }
        else
        {
            echo "<h1>Acronym name or meaning incorrect.</h1>";
        }
        ?>
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