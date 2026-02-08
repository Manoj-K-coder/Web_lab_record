<?php
$conn = mysqli_connect("localhost", "root", "", "hospital");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<body>

<table border="1" style="border-collapse: collapse;">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Disease</th>
</tr>

<?php
if (isset($_POST['search'])) {

    $search = $_POST['search'];

    $sql = "SELECT * FROM patient WHERE name='$search'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['disease']}</td>
                  </tr>";
        }

    } else {
        echo "<tr><td colspan='5'>No records found</td></tr>";
    }
}
?>

</table>

</body>
</html>

<?php
mysqli_close($conn);
?>

