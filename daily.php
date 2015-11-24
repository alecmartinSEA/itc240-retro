<?php include'includes/config.php';?>

<?php

if(isset($_GET['day'])){

	$myDay = $_GET['day'];

}else{

$myDay = date('l');	
}



$myPic = '';


$myColor= '';
$myDescription='';
$myAltDescritpion='';



switch($myDay){
	case 'Monday':
	$myPic= "pumpkin-spice-latte.jpg";
	$myColor="#993300";
	$myDescription = "Pumpkin Spice latte is great for this fall weather. Get it before it's gone. It taste like fall feels.";
	$myAltDescritpion = "Pumpkin spice latte";

	break;

	case 'Tuesday':
	$myPic ="iced-coffee.jpg";
	$myDescription = "Iced Coffee is refreshing when you need it. It may not be 80 degreese any more. You will get thirsty though.";
	$myColor = brown;
	$myAltDescritpion = "Iced Coffee";

	break;

	case 'Wednesday':
	$myPic ="caramel-salted-latte.jpg";
	$myDescription = "Carmel Salted latte is perfect for those cozy days. Warm up by the fire with this. Enjoy it with your boo.";
	$myColor = "#ccddcc";
	$myAltDescritpion = "Caramel salted latte";
	break;

	case 'Thursday':
	$myPic ="frap.jpg";
	$myDescription = "Fraps, perfect when you are looking for something sweet. It may have 1000 calories. It was sure damn delcious.";
	$myColor = "#2c3e50";
	$myAltDescritpion = "Frap";
	break;

	case 'Friday':
	$myPic ="espresso.jpg";
	$myColor ="#bdc3c7";
	$myDescription ="You're tired huh? wake up! with espresso.";
	$myAltDescritpion ="espresso";
	break;

	case 'Saturday':
	$myPic ="mocha.jpg";
	$myColor ="#16a085";
	$myDescription="Mocahs, for those days you want to sit by the fire brrr.";
	$myAltDescritpion ="Mocha";
	break;

	case 'Sunday':
	$myPic ="cappuccino.jpg";
	$myColor= "#8e44ad";
	$myDescription="You fancy huh? Well you should with this drink. Get your monocle you fancy S.O.B";
	$myAltDescritpion ="cappuccino";
	break;
}


?>








<?php include'includes/header.php';?>
<h1><?=$pageID?></h1>
<img src="images/<?=$myPic?>" alt="<?=$myAltDescritpion?>" id="coffee" />
<h1> <?=$myDay ?></h1>
        <p class="feature"><?=$myDay?> Coffee Special:</strong> </p>
<p><a href="daily.php?day=Sunday">Sunday</a></p>
<p><a href="daily.php?=Monday">Monday</a></p>
<p><a href="daily.php?day=Tuesday">Tuesday</a></p>
<p><a href="daily.php?day=Wednesday">Wednesday</a></p>
<p><a href="daily.php?day=Thursday">Thursday</a></p>
<p><a href="daily.php?day=Friday">Friday</a></p>
<p><a href="daily.php?day=Saturday">Saturday</a></p>

					
<?php include 'includes/footer.php';?>