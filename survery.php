<?php include'includes/config.php';?>
<?php include'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
if(isset($_POST['submit']))
{//data submitted
    /*
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    */
    
    $to = 'alecmartin28@gmail.com'; //wnewma01@seattlecentral.edu
    $message = process_post();
    $replyTo = $_POST['Email'];
    $subject = 'Test from contact form';
    
    safeEmail($to, $subject, $message, $replyTo);

}else{//show form
    echo '
    <form method="post" action="' . THIS_PAGE . '">
    Name: <input type="text" name="Name" required="required" /><br />
    Email: <input type="email" name="Email" required="required" /><br /><br />
    Favorite location (check all that applies)<br /><br />
    <input type="checkbox" name="location" value="Seattle">Seattle<br />
    <input type="checkbox" name="location" value="LA">LA<br />
    <input type="checkbox" name="receipt" value="NY">NY<br />
    <input type="checkbox" name="receipt" value="Chicago">Chicago<br /><br />
    What is your favorite food from our resturant (check all that applies)<br /><br />
    <input type="checkbox" name="Food" value="Burgers">Burgers<br />
    <input type="checkbox" name="Food" value="Shakes">Shakes<br />
    <input type="checkbox" name="Food" value="Fries">Fries<br />
    <input type="checkbox" name="Food" value="Hotdogs">Hotdogs<br /><br />
    What Could we do better on? (check all that applies)<br /><br />
    <input type="checkbox" name="quality" value="cleanliness">cleanliness<br />
    <input type="checkbox" name="location" value="Quality">Quality<br />
    <input type="checkbox" name="receipt" value="Friendliness">Friendliness<br />
    <input type="checkbox" name="receipt" value="Time">Time<br /><br />
    In the future would you like to have paper or emailed receipts?<br /><br />
    <input type="radio" name="receipt" value="Paper">Paper<br />
    <input type="radio" name="receipt" value="Email">Email<br /><br />
    Would you like our newsletter?<br /><br />
    <input type="radio" name="newsletter" value="Yes">Yes<br />
    <input type="radio" name="newsletter" value="No">No<br /><br />
    Comments: <textarea name="Comments"></textarea><br />
    <input type="submit" value="Send" name="submit" />
    </form>
    ';

}   
    
    
    
?>
					
<?php include 'includes/footer.php';?>