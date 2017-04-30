<html>
<head>
    <title>MMC | Search Results</title>
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
		<h1 style="display: inline;"> <a href="http://localhost/SPACEAPPS/index.html"><img id="logo" src="Resources\Images\MMCwordmark.png"\></a></h1>
	</div>
	<header id="header1">
		<h1 class="slogan"><span class="rotate">NASA'S MANILA INFORMATION CENTER, WHERE DREAMERS ARE BORN, AND SCIENTISTS COME TO PLAY, START YOUR MISSION TODAY</span></h1>
		<button class="buttinvert" onclick="Redirect()">Launch Idea</button>
	</header>
<div class="mainbody">
    <div id="stuffcontainer">
        <?php
        function Redirect($url,$permanent = false)
        {
            header("Location: " . $url,true,$permanent ? 301:302);
            die();
        }
        $acronym_search = $_POST['acronym'];
        if ($acronym_search == null)
        {
            Redirect("Location: localhost/phpstorm/nasa/acronym_search.php",false);
        }
        else
        {
            $arr = array();
            $server = "localhost";
            $user="root";
            $pass="";
            $db_name="nasa";
            $connection = new mysqli($server,$user,$pass,$db_name);
            $query = "SELECT *from acronym_masterlist where acronym like '$acronym_search%'";
            $scndquery = "select * from acronym_masterlist where acronym like '$acronym_search'";
            $result = $connection -> query($query);


            $row_num = $result -> num_rows;

            echo "<h1 style=\"margin-bottom: 0px;\">Search Results</h1>";
            echo "<h6>Total Hits: " . $row_num;
            echo "</h6>";
            echo nl2br("\n");
            echo nl2br("\n");
            for($i=0; $i<$row_num; $i++)
            {
                ?>
                <form action="description_page.php" id="inform" method="post">
                    <?php
                    echo "<div class='infocontainer acrotainer'>";
                    $row = $result->fetch_assoc();
                    $acronym_table_toArray[$i][0] = $row['acronym'];
                    echo $acronym_table_toArray[$i][0]; //
                    echo "</div>";
                    echo "<div class='infocontainer meantainer'>";
                    $acronym_table_toArray[$i][0] = $row['meaning'];
                    echo $acronym_table_toArray[$i][0]; //
                    echo "</div>";
                    ?>
                    <input type="submit" id="explorebtn" name="submit" value="Explore"/>
                    <?php
                    $a =  $acronym[$i][0] = $row['acronym'];
                    $b = $meaning[$i][0] = $row['meaning'];
                    ?>
                    <input type="text" name="acronym" value="<?php echo $a ?>" style="visibility:hidden "/>
                    <input type="text" name="meaning" value="<?php echo $b ?>" style="visibility:hidden "/>
                </form>
                <form action="rating.php" method="post">
                    <?php
                    $a =  $acronym[$i][0] = $row['acronym'];
                    $b = $meaning[$i][0] = $row['meaning'];
                    ?>
                    <input type="text" name="acronym" value="<?php echo $a ?>" style="visibility:hidden"/>
                    <input type="text" name="meaning" value="<?php echo $b ?>" style="visibility:hidden"/>
                </form>
                <?php
            }

            ?>
            <h1 style="margin-bottom: 0px;">Didn't find what you were looking for?</h1>
            <h6>Submit an acronym and its definition!</h6>
            <br/><br/>
            <form action="insert_acronym.php" method="post">
                <table>
                    <tr>
                        <td>Insert new acronym here</td>
                        <td><input type="text" name="new_acronym"/></td>
                    </tr>
                    <tr>
                        <td>Insert this acronym's full form here</td>
                        <td><input type="text" name="new_meaning"</td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Submit"/></td>
                    </tr>
                </table>
        </form>
            <h1 style="margin-bottom: 0px;">Wanting to create a page for a certain acronym?</h1>
            <br/><br/>
            <form action="page_create.php" method="post">
                <input type="submit" name="submit" value="Create Page"/>
            </form>
        <?php
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
<?php

?>