<?php
$servername = "sql2.freesqldatabase.com";
$username = "sql2349035";
$password = "iA7!tX4!";
$dbname = "sql2349035";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO AlbumRatings (artist, album, rating)
VALUES ('$_POST[artist]', '$_POST[album]', '$_POST[rating]')";

if ($conn->query($sql) === TRUE) {
  echo "The New Album Ranking Created";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT artist, album, rating FROM AlbumRatings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Artist</th><th>Album</th><th>Rating</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["artist"]."</td><td>".$row["album"]."</td><td>".$row["rating"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
