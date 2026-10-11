<?php
session_start();

// Logout handling moved here from logout.php.
if (isset($_GET['logout'])) {
	$_SESSION = [];
	session_destroy();
	header('Location: login.php');
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'random/header.php'; ?>
</head>
<body>
  
	<?php include 'random/mainContent.php'; ?>
	<?php include 'random/navigation.php'; ?>
	<?php include 'random/footer.php'; ?>
</body>
</html>
