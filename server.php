<?php
$servername = "localhost";
$username = "login_exodia";
$password = "password231099";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$name = htmlspecialchars($name);

$college = $_POST["college"];
$college = htmlspecialchars($college);

$contingent_boys = $_POST["conti_b"];
$contingent_boys = htmlspecialchars($contingent_boys);

$contingent_girls = $_POST["conti_g"];
$contingent_girls = htmlspecialchars($contingent_girls);

$email = $_POST["email"];
$email = htmlspecialchars($email);

$ph_no = $_POST["ph_no"];
$ph_no = htmlspecialchars($ph_no);


if (isset($_POST['day1'])) $day1 = "YES";
else $day1 = "NO";
if (isset($_POST['day2'])) $day2 = "YES";
else $day2 = "NO";
if (isset($_POST['day3'])) $day3 = "YES";
else $day3 = "NO";


$no_events = 33; // enter number of events
$events_list = array("band-slam", "biggest liar", "canvas painting", "couture", "creative writing", "exodia idol", "face painting", "groove fanatics", 'landscape photography', 'live sketching', 'mono act', 'online doodle', 'pace a patch', 'portrait photography', 'quizzing', 'rap battle', 'street battle', 'street play', 'survivor', 'synchronians', 'CAD-X', 'Conundrum', 'debug', 'dementia', 'drone', 'ipl', 'junkyard', 'line follower', 'nitro racing', 'qiuzzar', 'robowar', 'viaduct', 'zenith'); // enter events names 

$partic_events_str = "";

for ($x = 1; $x <= $no_events; $x++) {
    if ($_POST[sprintf("event%u", $x)] == "YES") {
        $partic_events_str  = $partic_events_str . " " . $events_list[$x - 1];
    }
}

$sql = "INSERT INTO Registration (Name, College, Contingent_boys, Contingent_girls, Phone_no, Day1, Day2, Day3, Events, email) VALUES ('$name', '$college', $contingent_boys, $contingent_girls, $ph_no, '$day1', '$day2', '$day3', '$partic_events_str', '$email');";

if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    echo "<script type='text/javascript'>document.location = 'index.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>