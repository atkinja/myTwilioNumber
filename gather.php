<?php
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

echo "<Response>";
$formatted = implode(',',str_split($_REQUEST['Digits']));
echo "<Say> Calling...," . $formatted . "</Say>";
echo "<Dial callerId=\"" . $_GET['myTwilioNumber'] . "\">"; 
echo "+" . $_REQUEST['Digits'];
echo "</Dial>";
echo "</Response>";
