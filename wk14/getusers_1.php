<?php
$servername = "localhost";
$username = "lab";
$password = "password";
$dbname = "labexe";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$result = null;
if($_SERVER["REQUEST_METHOD"] === "GET") {
    $search = isset($_GET['firstname']) ? $_GET['firstname'] : "";

    if($search != "") {
        $query = "SELECT * FROM users
            WHERE firstname = '$search'
            AND active = 1";
        $result = $conn->query($query);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>getusers_1.php</title>
</head>

<body>

<form method="GET">
    <input type="text" name="firstname" placeholder="Enter First Name">
    <button type="submit">Search</button>
</form>

<br>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Active</th>
    </tr>

    <?php
    if($result) {
		$rows = $result->fetchAll();
        foreach($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['firstname'] . "</td>";
            echo "<td>" . $row['lastname'] . "</td>";
            echo "<td>" . $row['active'] . "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>

</body>
</html>
