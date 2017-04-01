<?php
$nameErr = $emailErr = $emailerr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
$go = false;

$semail = $p = $cp = "";
$semailerr = $perr = $cperr = "";
$bo = false;
$wrongemail = $wrongpwd = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_POST['submit'] == 'Sign') {
		$go = true;
		if (empty($_POST["password"])) {
			$nameErr = "Password is required";
			$go = false;
		}
		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
			$go = false;
		} else {
			$email = test_input($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
				$go = false;
			}
		}
	} else /*if ($_POST['submit'] == 'submit')*/ {
		$bo = true;
		if (empty($_POST["fname"])) {
			$perr = "First Name is required";
			$bo   = false;
		}
		if (empty($_POST["lname"])) {
			$perr = "Last Name is required";
			$bo   = false;
		}
		if (empty($_POST["spassword"])) {
			$perr = "Password is required";
			$bo   = false;
		}
		if (empty($_POST["scpassword"])) {
			$cperr = "Password is required";
			$bo = false;
		}
		if (!($_POST["scpassword"] === $_POST["spassword"])) {
			$cperr = "Passwords does not match";
			$bo = false;
		}
		if (empty($_POST["semail"])) {
			$semailerr = "Email is required";
			$bo = false;
		} else {
			$email = test_input($_POST["semail"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$semailerr = "Invalid email format";
				$bo = false;
			}
		}
	}
}
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
$zoo = false;
$too=false;
?>
<?php
if ($bo) {
	$conn = mysqli_connect("localhost", "root", "", "Login");
	if (!$conn) {
	} else {
		$te = $_POST["semail"];
		$sql = "SELECT id, email FROM users WHERE email='$te'";
		$result = mysqli_query($conn, $sql);
		if ($result != false) {
			if (mysqli_num_rows($result) > 0) {
				$semailerr = "Email already registered";
			} else {
				$tn  = $_POST["fname"]." ".$_POST["lname"];
				$te  = $_POST["semail"];
				$tp  = $_POST['spassword'];
				$sql = "INSERT INTO users (name, email, password) VALUES ('$tn','$te','$tp')";
				if (mysqli_query($conn, $sql)) {
					$zoo = true;
				} else {
				}
				mysqli_close($conn);
			}
		}
		
	}
}
if($go) {
	$conn = mysqli_connect("localhost","root","","Login");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	} else {
		$e = $_POST["email"];
		$p=	$_POST['password'];
		$sql = "SELECT id, name, email, password FROM users WHERE email='$e'";
		$result = mysqli_query($conn, $sql);
		if($result != false) {
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					if( $row["email"] == $e && $row["password"] == $p) {
						echo "Sucessfully logged";
						$too = true;
						$wrongemail = $wrongpwd = false;
						$name = $row["name"];
						echo '<script>alert("Sucessfully logged")</script>';
					} else {
						$emailerr = "Password is in correct";
						$wrongpwd = true;
						echo '<script>alert("Incorrect Password")</script>';
					}
				}
			} else {
				$emailerr = "Email id not Registered";
				$wrongemail = true;
				echo '<script>alert("Email is not registered")</script>';
			}
		}
	}
}
?>
<?php 
	if($zoo) {
		header('Location:tutorial.html');
		exit;
		ob_end_flush();
	} else if($too) {
		header('Location:loggedIn.php?name='.urlencode($name).'&email='.urlencode($email));
		exit;
	} 
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" type="img/png" href="tutorial.png">
		<link rel="stylesheet" type="text/css" href="login_style.css">
		<title>Login</title>
	</head>
	<body>
		<?php
			/*if ($emailerr == "Password is in correct") {
				echo '<div class="field-wrap">
						<label>Password is in correct.</label>
						<input class="inv" disabled autocomplete="off"/>
					</div>';
			} else if ($emailerr == "Email id not Registered") {
				echo '<div class="field-wrap">
						<label>Password is in correct.</label>
						<input class="inv" disabled autocomplete="off"/>
					</div>';
			}*/
		?>
		<div class="form">
			<ul class="tab-group">
				<li class="tab active"><a href="#signup" id="su">Sign Up</a></li>
				<li class="tab"><a href="#login" id="lg">Log In</a></li>
			</ul>
			
			<div class="tab-content">
				<div id="signup">
					<h1>Sign Up for Free</h1>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<?php
							if ($semailerr == "Email already registered") {
								echo '<div class="field-wrap">
										<label>Email already registered.</label>
										<input class="inv" disabled autocomplete="off"/>
									</div>';
							}
						?>
						<div class="top-row">
							<div class="field-wrap">
								<label>First Name<span class="req">*</span></label>
								<input type="text" name="fname" required autocomplete="off" />
							</div>
							<div class="field-wrap">
								<label>Last Name<span class="req">*</span></label>
								<input type="text" name="lname" required autocomplete="off"/>
							</div>
						</div>
						<div class="field-wrap">
							<label>Email Address<span class="req">*</span></label>
							<input type="email" name="semail" required autocomplete="off"/>
						</div>
						<div class="field-wrap">
							<label>Set A Password<span class="req">*</span></label>
							<input type="password" name="spassword" id="spassword" required autocomplete="off"/>
						</div>
						<div class="field-wrap">
							<label>Comfirm Password<span class="req">*</span></label>
							<input type="password" name="scpassword" id="scpassword" required autocomplete="off"/>
						</div>
						<div class="field-wrapA">
							<label class="incorr">Passwords don't match.<span class="req"></span></label>
							<input class="incorr" disabled style="" />
						</div>
						<button type="submit" class="button button-block" name="submit" value="submit"/>Get Started</button>
					</form>
				</div>
				<div id="login">
					<h1>Welcome Back!</h1>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<?php
							if ($wrongpwd) {
								echo '<div class="field-wrap">
										<label>Password is in correct.</label>
										<input class="inv" disabled autocomplete="off"/>
									</div>';
							} else if ($wrongemail) {
								echo '<div class="field-wrap">
										<label>Password is in correct.</label>
										<input class="inv" disabled autocomplete="off"/>
									</div>';
							} else 
								echo '<div></div>';
						?>
						<div class="field-wrap">
							<label>Email Address<span class="req">*</span></label>
							<input type="email" name="email" required autocomplete="off"/>
						</div>
						<div class="field-wrap">
							<label>Password<span class="req">*</span></label>
							<input type="password" name="password" required autocomplete="off"/>
						</div>
						<p class="forgot"><a href="#">Forgot Password?</a></p>
						<button class="button button-block" name="submit" value="Sign"/>Log In</button>
					</form>
				</div>
			</div><!-- tab-content -->
		</div> <!-- /form -->
		<script src="Others/jquery-1.11.3.min.js"></script>
		<script>
			$('.incorr').toggle(false);
			$('input').keyup(function () {
				if ($('#spassword').val() != $('#scpassword').val())
					$('.incorr').toggle(true);
				else
					$('.incorr').toggle(false);
			});
			$('.form').submit(function () {
				if ($('#spassword').val() != $('#scpassword').val())
					event.preventDefault();
			});
		</script>
		<script>
			$('.form').find('input, textarea').on('keyup blur focus', function (e) {
				var $this = $(this),
					label = $this.prev('label');
				if (e.type === 'keyup') {
					if ($this.val() === '') {
						label.removeClass('active highlight');
					} else {
						label.addClass('active highlight');
					}
				} else if (e.type === 'blur') {
					if( $this.val() === '' ) {
						label.removeClass('active highlight'); 
					} else {
						label.removeClass('highlight');   
					}
				} else if (e.type === 'focus') {
					if( $this.val() === '' ) {
						label.removeClass('highlight'); 
					} else if( $this.val() !== '' ) {
						label.addClass('highlight');
					}
				}
			});

			$('.tab a').on('click', function (e) {
				e.preventDefault();

				$(this).parent().addClass('active');
				$(this).parent().siblings().removeClass('active');

				target = $(this).attr('href');

				$('.tab-content > div').not(target).hide();

				$(target).fadeIn(600);
			});

			<?php 
				if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == 'Sign')
					//echo '$("lg").parent().addClass("active");
					//    $("lg").parent().siblings().removeClass("active");';
					echo '$(\'#lg\').click();';
			?>
		</script>
	</body>
</html>
