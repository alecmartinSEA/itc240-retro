<?php include'includes/config.php';?>
<?php include'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
if(isset($_POST['submit']))
{//data submitted
	/*echo '<pre>';
	var_dump($_POST);
	echo '</pre>';
	*/
	$to="alecmartin28@gmail.com";
	$message = "test";
	$replyTo = $_POST['EMAIL'];
	$subject = 'Test from contact form';
	

	safeEmail($to, $subject, $message, $replayTo);

}else{//show form
	echo '
	<form method="post" action="' . THIS_PAGE . '">
	Name: <input type= "text" name="Name" /><br />
	Email: <input type= "email" name="Email" required="required" /><br />
	Comment: <textarea name="Comments"></textarea><br />
	<input type="submit" vaule="Send" name="submit" />

	</form>
	';

}

?>
					
<?php include 'includes/footer.php';?>