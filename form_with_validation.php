<?php
	function redirect_to($new_location) {
		header("Location: " . $new_location);
		exit;
	}

	function has_presence($value) {
		// *验证是否有输入
		// return true or false
		return isset($value) && $value !== "";
	}
		// *验证字符串最大值string length:max length
	function has_max_length($value, $max) {
		return strlen($value) <= $max;
	}
		

	function form_errors ($errors=array()) {
		$output = "";
		if (!empty($errors)) {
			$output .= "<div class='error'>";
			$output .= "有误，请重新输入:";
			$output .= "<ul>";
			foreach ($errors as $key => $error) {
				$output .= "<li>{$error}</li>";
			}
			$output .= "</ul>";
			$output .= "</div>";

		}
		return $output
	}

	$errors = array();
	$message = "";
	if (isset($_POST['submit'])) {
		// 提交表单
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		// 验证
		$fields_required = array("username", "password");
		foreach ($fields_required as $fields) {
			$value = trim($_POST[$field]);
			if (!has_presence($username)) {
			$errors['$field'] = ucfirst($field). " 不能为空" ;
			}
		}
		
		$fields_with_max_lengths = array("username" => 30, "password" => 8);
		foreach ($fields_with_max_lengths as $field => $max) {
			$value = trim($_POST['field']);
			if (!has_max_length($value, $max)) {
				$errors['$field'] = ucfirst($field). " 过长" ;
			}
		}
		if (empty($errors)) {
		// 尝试登录
			if ($username == "Yao80350" && $password == "80350") {
			// 成功登录
			redirect_to("basic.html");
			} else {
				$message = "登录名/密码不符合.";
			}	 
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
	<?php echo form_errors($errors); ?>
	<form action="form_with_validation.php" method="post">
		登录名: <input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>"><br>
		密码: <input type="password" name="password" value=""><br>
		<br>
		<input type="submit" name="submit" value="登录">
	</form>
</body>
</html>

