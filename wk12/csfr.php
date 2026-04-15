<?php
$msg = "";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if($username === "host" && $password === "pass") {
        $msg = "Login successful!";
    } else {
        $msg = "Login failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>csrf.php</title>
</head>
<body>

<form method="POST" action="csrf.php">
    <label>Username:</label>
    <input type="text" name="username">
	<br/>
    <label>Password:</label>
    <input type="password" name="password"><br><br>
	<br/>
    <button type="submit">Login</button>
</form>

<?php if($msg): ?>
    <div style="margin-top:20px; color: blue;">
        <?php echo $msg; ?>
    </div>
<?php endif; ?>

</body>
</html>