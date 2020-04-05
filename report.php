<?php

    if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `Students` WHERE CONCAT(`Course`, `FirstName`, `LastName`, `Date`, `Attendance`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `Students`";
    $search_result = filterTable($query);
}



// function to connect and execute the query
function filterTable($query)
{
    $servername = "localhost";
$username = "id12730815_rbproject";
$password = "myproject";
$database = "id12730815_attendancedb";


// Create connection
    $connect =  mysqli_connect($servername, $username, $password, $database);
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}


?>
<!DOCTYPE html>
<html>
<head></head>
<style>
head{
  text-align:center; padding: 20px;
}
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
form {
    position: relative; 
    z-index: 1; 
    background: #00cc99; 
    max-width: 250px;
    margin: 0 auto 50px; 
    padding:20px; 
    text-align: center;
}
h2{
   text-align:center; padding: 20px; 
}
</style>
<h2>Attendence Report</h2>
<body>
  <form action="filter.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
</form>

<table>
<tr>
    <th>Course</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Date</th>
	<th>Attendance</th>
</tr>


    <?php while($row = mysqli_fetch_array($search_result)) {
        $courseQuery = $row['Course'];
        $firstnameQuery =$row['FirstName'];
        $lastnameQuery = $row['LastName'];
        $dateQuery = $row['Date'];
        $att = $row['Attendance'];
          echo
            "<tr>
              <td>{$courseQuery}</td>
              <td>{$firstnameQuery}</td>
              <td>{$lastnameQuery}</td>
              <td>{$dateQuery}</td>
              <td>{$att}</td>
            </tr>";
                } ?>
   


</table>


</body>

</html>
