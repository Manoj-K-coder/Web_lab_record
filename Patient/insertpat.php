<?php
$conn = mysqli_connect("localhost", "root", "", "hospital");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$disease = $_POST['disease'];

$sql = "INSERT INTO patient (name, age, gender, disease)
        VALUES ('$name', $age, '$gender', '$disease')";

mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Records</title>
</head>
<body>

<h2>Patient Records</h2>

<table border="1" style="border-collapse: collapse;">
<tr>
    <th>Patient ID</th>
    <th>Patient Name</th>
    <th>Age</th>
    <th>Gender</th>
  
    <th>Disease</th>
   
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM patient");

while ($row = mysqli_fetch_assoc($result)) {
	echo "<tr>"
    ."<td>".$row['id']."</td>"
    ."<td>".$row['name']."</td>"
    ."<td>".$row['age']."</td>"
    ."<td>".$row['gender']."</td>"
    ."<td>".$row['disease']."</td>"
    ."</tr>";

}?>

</table>
<br>

<!--a href="patient.html">Add New Patient</a-->
<form action="patient.html" method="post">
    <button type="submit">Add Another Patient</button>
</form>


  <form action="searchpat.php" method="POST">
  <h3>Search the Records based on name</h3>
    Patient Name <input type="text" name="search"/> <br />
    <input type="submit" name="submit" value="submit">
  
<br><br>
</body>
</html>

