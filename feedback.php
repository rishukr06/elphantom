<?php 

	if(isset($_POST['submit']))
	{
		$alert = true;
		extract($_POST);
		date_default_timezone_set("Asia/Kolkata");
		$date_today = date("Y-m-d");
		$current_time = date("h:i:sa");
		include('phpmail/PHPMailerAutoload.php');
		include('phpmail/class.phpmailer.php');
		include('phpmail/class.smtp.php');
		$mail= new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPAuth=true;
		$mail->SMTPSecure='tls';
		$mail->Host='smtp.gmail.com';
		$mail->Port=587;

		$mail->Username='tst1234500@gmail.com';
		$mail->Password = "1@Rishuthakur";
		$mail->Subject="elphantom";
		$mail->Body="Hi ".$name.", Thanks for reaching out to us.We will contact you soon. This is system genrated mail do not reply to it";
		$mail->addAddress($email);
		$mymail = $mail->Send();
		if(!$mymail)
		{
			$mail_status =  "mail not sent";
		}
		else
		{
			$mail_status =  "mail sent";
		}
		$connect = mysqli_connect("localhost","root","","webnotes") or die("Error establishing connection");
		$sql_id = "select count(id) as idno from feedback;";
			$result =mysqli_query($connect,$sql_id) or die("Error in inserting data:".mysqli_error($connect));
			$row = mysqli_fetch_array($result);
			$id=$row['idno']+1;
		$sql = "insert into feedback values($id,'$date_today','$name','$email','$feed','$mail_status','$current_time','$rate')";
		$run = mysqli_query($connect,$sql) or die("Error in inserting data:".mysqli_error($connect));
		
		if($run!=NULL)
		{
			
			header("location:index.php");
		}
		else
		{
			header("location:index.php")	;
		}

	}

?>