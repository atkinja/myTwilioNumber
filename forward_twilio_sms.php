<?php
header('Content-Type: text/xml');
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

$mycell=$_GET['myCell'];
$myTwilioNumber=$_REQUEST['To'];


$newBody = str_replace("&","and",$_REQUEST['Body']);


if ($_REQUEST['From'] == $mycell ) {
	$pos = strpos($newBody, ",");
	if ($pos !== false) {
		$pieces = explode(",", $newBody);
		$recipient=$pieces[0]; // phone number
		$msg_body=$pieces[1]; // body
	} else {
		$recipient=$_REQUEST['From'];	
		$msg_body="Incorrect format. It needs to be:  Recipient Number, Message";
	}


} else {
	$recipient = $mycell;
	if ($_REQUEST['MediaUrl0']) {
		$msg_body = "<Body>" . $_REQUEST['From'] . ": " . $newBody . "</Body>";
		$mediaFile = "<Media>" . $_REQUEST['MediaUrl0'] . "</Media>";
	} else  {
		$msg_body = $_REQUEST['From'] . ": " . $newBody;
	}
}


$sender = $myTwilioNumber;


?>
<Response>
  <Message from="<?=$sender ?>" to="<?=$recipient ?>">
	<?=$msg_body ?>
	<?=$mediaFile ?>
  </Message>
</Response>

