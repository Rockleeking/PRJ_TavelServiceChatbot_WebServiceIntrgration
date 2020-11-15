<?php
require __DIR__.'/../autoload.php';
$sentiment = new \PHPInsight\Sentiment();
$string="";
if(isset($_GET)){
	$string=$_GET['o'];

$scores = $sentiment->score($string);
$class = $sentiment->categorise($string);
$val=1;
$ret="";
foreach($scores as $key =>$value){
	if((1-$value)<$val){
		$val=(1-$value);
		$ret=$key;
	}
}
if($ret=="pos"){
	$ret= "Positive";
	echo " Thank you for your $ret response, you look in a good mood.";
}else if($ret=="neg"){
	$ret="Negative";
	echo "We are sorry for your $ret response, please clam down your mood.";
}else if($ret=="neu"){
	$ret="Neutral";
	echo " The Feedback is $ret";
}else{
echo " The Feedback is $ret";
}
}
?>
