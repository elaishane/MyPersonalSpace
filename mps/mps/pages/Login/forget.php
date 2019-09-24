<?php
	include("../dbconnection.php");
    session_start();
    if(isset($_SESSION['uid']))
    {
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V5</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form method=post class="login100-form validate-form flex-sb flex-w">
					
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Phone number
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input type="text" name="pnum" >
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
                            <input type="submit" name="submit" value="Show password">
						</button>
                    </div>
                    

<?php
	if(isset($_POST['submit']))
	{
		$pnum=$_POST['pnum'];
		$qry="SELECT `pass` FROM `login` WHERE `pnum`='$pnum'";
        $run = mysqli_query($conn,$qry);
        if(mysqli_num_rows($run)<1)
        {
?>
            <script>
                alert "NO Record's found";
                window.open('login1.php','_self');
            </script>
<?php
        }
        else
        {
            $data = mysqli_fetch_assoc($run);
?>
            <div class="p-t-13 p-b-9">
						<span class="txt1">
							Password :<?php echo "      ".$data['pass'] ?>
						</span>
					</div>
				</form>
			</div>
		</div>
    </div>
</body>
</html>

<?php
        }
	}
?>