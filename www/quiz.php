<html>
<head>
<link href="quiz.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<?php
$servername = ""; //Blanked for security purposes
$username = ""; //Blanked for security purposes
$password = ""; //Blanked for security purposes
$dbname = ""; //Blanked for security purposes

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	echo "<embed src='failed.wav' autostart='true' loop='false' hidden='true'>";
    die("Connection failed: " . $conn->connect_error);
}else{
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$first_name = ($_POST["first_name"]);
		$last_name = ($_POST["last_name"]);
		$sql = "INSERT INTO Player (first_name,last_name) VALUES ('$first_name','$last_name')";
		if ($conn->query($sql) === TRUE) {
		} else {
			echo "Error in Player table: " . $sql . "<br>" . $conn->error;
			echo"<br>";
		}
		
		$total_time_played = ($_POST["total_time_played"]);
		$time_stamp = ($_POST["time_stamp"]);
		
		$sql = "INSERT INTO Plays (player_id,total_time_played,time_stamp) VALUES ((SELECT max(player_id) from Player),'$total_time_played','$time_stamp')";
		if ($conn->query($sql) === TRUE) {
	
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			echo"<br>";
		}
		
		$genre = ($_POST["genre"]);
		if($genre == "First Person Shooter"){
			$genre = 1;
		}else if ($genre == "Massively Multiplayer Online"){
			$genre = 2;
		}else if ($genre == "Role playing Game"){
			$genre = 3;
		}else if ($genre == "Multiplayer Online Battle Arena"){
			$genre = 4;
		}else{
			$genre = 5;
		}
		
		$compatibility = ($_POST["compatibility"]);
		if ($compatibility == "Yes"){
			$compatibility = 1;
		}else{
			$compatibility = 2;
		}
	 
		$gameplay = ($_POST["gameplay"]);
		if ($gameplay == "Top-down Shooter"){
			$gameplay = 1;
		}else if ($gameplay == "Open World"){
			$gameplay = 2;
		}else if ($gameplay == "Puzzle"){
			$gameplay = 3;
		}else if ($gameplay == "Side-scroller"){
			$gameplay = 4;
		}else if ($gameplay == "Stragety"){
			$gameplay = 5;
		}else{
			$gameplay = 6;
		}
		
		$console_name = ($_POST["console_name"]);
		if ($console_name == "PC"){
			$console_name = 1;
		}else if ($console_name == "PS4"){
			$console_name = 2;
		}else if ($console_name == "Xbox 1"){
			$console_name = 3;
		}else if ($console_name == "Nitendo Switch"){
			$console_name = 4;
		}else{
			$console_name = 5;
		}

		$purchase_cost = ($_POST["purchase_cost"]);
		$game_title = ($_POST["game_title"]);
		$publisher = ($_POST["publisher"]);
		$date_published = ($_POST["date_published"]);
		$sql = "INSERT INTO Fav_Video_Games (player_id,purchase_cost,game_title,publisher,date_published,id_genre,id_gameplay,id_console,id_compatibility) VALUES ((SELECT max(player_id) FROM Player),'$purchase_cost','$game_title','$publisher','$date_published','$genre','$gameplay','$console_name','$compatibility')";
		if ($conn->query($sql) === TRUE) {
		} else {
			echo "Error in fav_video_games table: " . $sql . "<br>" . $conn->error;
			echo"<br>";
		}	
		
}		

echo "<div id='container'>";
echo "<br>";
echo "<embed src='gameboy.wav' autostart='true' loop='false' hidden='true'></embed>";
echo "<h3> Table of Results </h3>";
echo "<div id = 'output'>";

	echo "<table>";
	$sql = "SELECT P.player_id, P.first_name, P.last_name, F.game_title, PL.total_time_played, PL.time_stamp, F.publisher, F.date_published, G.genre, Gp.gameplay, C.console_name, Cp.compatibility, F.purchase_cost
FROM Player P, Plays PL, Console C, Online_Compatibility Cp, Gameplay Gp, Genre G, Fav_Video_Games F
WHERE G.id_genre = F.id_genre AND Gp.id_gameplay = F.id_gameplay AND P.player_id = PL.player_id AND C.id_console = F.id_console AND Cp.id_compatibility = F.id_compatibility AND F.player_id = PL.player_id
ORDER BY P.player_id ASC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo "<table><tr><th>Player Id</th><th>First Name</th><th>Last Name</th><th>Favorite Game</th><th>Total Time Played</th><th>Last Date Played</th><th>Publisher</th><th>Date Published</th><th>Genre</th><th>Gameplay</th><th>Console</th><th>Online Compatibility</th><th>Cost</th></tr>";
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>".$row["player_id"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["game_title"]."</td><td>".$row["total_time_played"]."</td><td>".$row["time_stamp"]."</td><td>".$row["publisher"]."</td><td>".$row["date_published"]."</td><td>".$row["genre"]."</td><td>".$row["gameplay"]."</td><td>".$row["console_name"]."</td><td>".$row["compatibility"]."</td><td>".$row["purchase_cost"]."</td><td></tr>";
		}
		echo "</table>";
	} 
	
	echo "<img src = 'video.jpg' alt = 'Game Gif', width = '50%', height = '30%'>";
	echo "<br>";
	echo "Date submitted by IP address" . $_SERVER['REMOTE_ADDR'];
	echo "</div>";
	echo "</div>";
?>
</body>
</html>
