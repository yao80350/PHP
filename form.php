<?php
	function redirect_to($new_location) {
		header("Location: " . $new_location);
		exit;
	}

	if (isset($_POST['submit'])) {
	
		$username = $_POST['username'];
		$password = $_POST['password'];
		if ($username == "Yao80350" && $password == "80350") {
			
			redirect_to("test.html");
		} else {
			$message = "有误，请重新输入。";
		}
	} else {
		$username = "";
		$message = "请登录.";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
	<?php echo $message; ?> <br>
	<form action="form.php"> method="post">
		登录名: <input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>"><br>
		密码: <input type="password" name="password" value=""><br>
		<br>
		<input type="submit" name="submit" value="登录">
	</form>
</body>
</html>

