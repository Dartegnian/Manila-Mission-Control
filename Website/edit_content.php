<html>
<head>
    <title>MMC | Dictionary</title>
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
        setTimeout(
        function() 
        {
            history.go(-1);
        }, 5000);
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
        <?php
			function Redirect($url,$permanent = false)
			{
				header("Location: " . $url,true,$permanent ? 301:302);
				die();
			}
			$conn = new mysqli('localhost','root','','nasa');
			$new_content = $_POST["content"];
			$acronym = trim($_POST['acronym']);
			$meaning = trim($_POST['meaning']);
			echo "<h1 style='margin-top: 0px; margin-bottom: 0px;'>";
			echo $acronym;
			echo "</h1>";
			echo "<h6 style='margin-top: 0px;'>";
			echo $meaning;
			echo "</h6>";
			echo nl2br("\n");
			echo "<h4 style='margin-top: 0px;'>";
			echo $new_content;
			echo "</h4>";
			echo nl2br("\n");
			echo nl2br("\n");
			if($new_content != null)
			{
				if($conn -> query("update acronym_define set definition = '$new_content' where 
				meaning_def = trim('$meaning')") == TRUE);
				{
					echo "<h1 style='margin-top: 0px; margin-bottom: 0px;'>";
					echo "Thank you for your contribution! You will be redirected automatically within five seconds";
					echo "</h1>";
				}
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