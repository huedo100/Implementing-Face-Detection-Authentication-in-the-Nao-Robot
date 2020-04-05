<?php

$servername = "localhost";
$username = "id12730815_rbproject";
$password = "myproject";
$database = "id12730815_attendancedb";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully<br>"; 

mysqli_select_db($conn,$database);
// CSCClass
// This is important to prevent injection attacks
$courseQuery = $_POST['Course'];
$firstnameQuery = $_POST['FirstName'];
$lastnameQuery = $_POST['LastName'];
$dateQuery = $_POST['Date'];
$attendanceQuery = $_POST['Attendance'];


/*echo $courseQuery . " FORM Course <br>";
echo $firstnameQuery . " FORM FirstName <br>";
echo $lasttnameQuery . " FORM LastName <br>";
echo $dateQuery . "FORM Date <br>";
echo $attendanceQuery . "FORM Attendance <br>";
*/
$att = 0;

if($attendanceQuery == 'on'):
    $att = 1;
endif;

echo $att . "Attendance <br>";


$sql = "INSERT INTO Students(Course,  FirstName, LastName,Date, Attendance) VALUES ('" . $courseQuery . "', '" . $firstnameQuery . "', '" . $lastnameQuery . "','" . $dateQuery . "', ' $att')";

if (mysqli_query($conn, $sql)) {
echo "New record created successfully<br>";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// echo 'Add record successful.<br>';

mysqli_close($conn);
?>
