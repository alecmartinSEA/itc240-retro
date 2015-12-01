<?php
//config.php

//This defines the current file name.


define('DEBUG',TRUE); #we want to see all errors

date_default_timezone_set('America/Los_Angeles'); #sets default date/timezone for this website

include 'common.php'; //stores all unsightly application functions, etc.
include 'MyAutoLoader.php'; //loads class that autoloads all classes in include folder
//database credentials
include 'credentials.php';

/* automatic path settings - use the following path settings for placing all code in one application folder */ 
define('VIRTUAL_PATH', 'http://alecmartin25/itc240/retro/'); # Virtual (web) 'root' of application for images, JS & CSS files
define('PHYSICAL_PATH', '/home/alemar167/alecmartin25.com/itc240/retro/'); # Physical (PHP) 'root' of application for file & upload reference
define('INCLUDE_PATH', PHYSICAL_PATH . 'includes/'); # Path to PHP include files - INSIDE APPLICATION ROOT

ob_start();  #buffers our page to be prevent header errors. Call before INC files or ANY html!
header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching









define('THIS_PAGE', basename($_SERVER ['PHP_SELF'])); 

//echo THIS_PAGE;

//this allows us to add unique info to our page

switch (THIS_PAGE){
	case "index.php":
		$title = "Home!";
		$pageID = "home";
		break;

	case "daily.php":
		$title = "Daily Spiecial!";
		$pageID = "Daily Special";
		break;

	case "template.php":
		$title = "Template!!";
		$pageID = "Template";
		break;

	case "contact.php":
		$title = "Contact!";
		$pageID = "Contact";
		break;

	case "survey.php":
		$title = "Survery!";
		$pageID = "survey";
		break;

	case "data1.php":
		$title = "data!";
		$pageID = "data";
		break;


default:
	$title = THIS_PAGE;
	$pageID = "Retro Diner";

} //end switch

//Here are our navigation pages:

$nav1['index.php'] = 'Home';
$nav1['template.php'] = 'Template';
$nav1['daily.php'] = 'Daily';
$nav1['data1.php'] = 'Data';
$nav1['contact.php'] = 'Contact';
$nav1['survery.php'] = 'Survery';


/* <li>
					<a href="blog.html">Blog</a>
				</li><ul class="navigation">
				<li>
					<a href="index.html">Home</a>
				</li>
				<li>
					<a class="active" href="about.html">About</a>
				</li>
				<li>
					<a href="burger.html">Menu</a>
				</li>
				<li>
					<a href="contact.html">Contact</a>
				</li>
				
*/ 


/*
foreach($nav1 as $link => $label){
	echo "Link is $link and label is $label <br />";
}
*/
//die;
/*
Creates links insides the header.php file
*/

/*<li><a href="LINK"> LABEL</a></li>
<li><a class="active" href="LINK">LABEL</a></li> */

function makeLinks($arr, $prefix='', $suffix='', $exception=''){

	$myReturn ='';
	foreach($arr as $link => $label){

		if(THIS_PAGE == $link)
		{

			$myReturn .= $exception . ' <li><a href=" ' . $link . '">' . $label . '</a>' . $suffix;

		}else{
			$myReturn .= $prefix . '<li> <a href=" ' . $link . '">' . $label . '</a>' . $suffix;

		}


		
	}

	return $myReturn;

} //end make links

//echo $title;

/*
Allows us to send an email that respects the server domain spoofing polices of 
hosts like DH.

$response = safeEmail($to, $subject, $message, $replyTo='','html');

if($response)
{
    echo 'hopefully HTML email sent!<br />';
}else{
   echo 'Trouble with HTML email!<br />'; 
}

*/
function safeEmail($to, $subject, $message, $replyTo = '',$contentType='text')
{
    $fromAddress = "Automated Email <noreply@" . $_SERVER["SERVER_NAME"] . ">";

    if(strtolower($contentType)=='html')
    {//change to html format
        $contentType = 'Content-type: text/html; charset=iso-8859-1';
    }else{
        $contentType = 'Content-type: text/plain; charset=iso-8859-1';
    }
    
    $headers[] = "MIME-Version: 1.0";//optional but more correct
    //$headers[] = "Content-type: text/plain; charset=iso-8859-1";
    $headers[] = $contentType;
    //$headers[] = "From: Sender Name <sender@domain.com>";
    $headers[] = 'From: ' . $fromAddress;
    //$headers[] = "Bcc: JJ Chong <bcc@domain2.com>";
    //$headers[] = "Reply-To: Recipient Name <receiver@domain3.com>";
    
    if($replyTo !=''){
        $headers[] = 'Reply-To: ' . $replyTo;   
    }
    
    
    $headers[] = "Subject: {$subject}";
    $headers[] = "X-Mailer: PHP/". phpversion();
    
    $headers = implode(PHP_EOL,$headers);

    
    return mail($to, $subject, $message, $headers);

}//end safeEmail()

function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
} 

//die;