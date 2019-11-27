<?php
if(isset($_POST['btn']))
{
	extract($_POST);
include('PHPMailerAutoload.php');
//include('C:\Users\Rishu kumar\Downloads\Compressed\PHPMailer-5.2-stable\PHPMailerAutoload.php');
include('class.phpmailer.php');
include('class.smtp.php');
$mail= new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';
$mail->Host='smtp.gmail.com';
$mail->Port=587;

$mail->Username='tst1234500@gmail.com';
$mail->Password = "1@Rishuthakur";
$mail->Subject="systemGenratedMail";
$mail->Body=$body;
$mail->addAddress($email);
$mail->Send();
if(!$mail->Send())
{
	echo "message not sent";
}
else
{
	echo "message sent";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>send mail</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style type="text/css">
	input[type="email"]
	{
		padding:5px;
		width: 100%;
		border:none;
		border-bottom: 2px solid #000;
		outline: none;
		color: #fff;
	}
	textarea
	{
		display: none;
	}
	.box
	{
		position: absolute;
		top:50%;
		left:50%;
		transform: translate(-50%,-50%);
		padding: 10px;
		border-radius: 5px;
		box-shadow: 0px 0px 8px #000;
	}
	hr
	{
		background: #555;
	}
	.btn
	{
		padding: 5px 30px;
	}
	sup
	{
		color: red;
	}
</style>
<body>
<div class="bg-dark box">
<h3 class="text text-primary">Send Stystem Gentrated Mail</h3><hr>
<form action="<?php echo $_SERVER['PHP_SELF'] ?> " method="POST">
	<input class="bg-dark" type="email" placeholder="Email" name="email" required=""><br>
	<textarea placeholder="Body" rows="5" cols="100" name="body">
	Hi there!
	This is system genrated mail..

	sent by-Rishu kumar
	</textarea><br>
	
		<input type="submit" name="btn" class="btn btn-success btn-lg" value="send">
		<input type="reset" value="reset" class="btn btn-danger btn-lg" style="float: right;">
	
</form>
</div>
</body>
</html>