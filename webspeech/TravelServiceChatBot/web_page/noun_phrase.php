<?php 
function RequestCURL($url,$header=array(),$postArr='') {
	$post = http_build_query($postArr, '&');
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HTTPHEADER,$header);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		if (!empty($post)) {
			curl_setopt($curl, CURLOPT_POST,true);
			curl_setopt($curl, CURLOPT_POSTFIELDS,$post);
			}
		$data = curl_exec($curl);
		curl_close($curl);
		return $data;
}

function query($text){
	// Content-Type: application/json
	$response = RequestCURL('https://textanalysis.p.rapidapi.com/spacy-noun-chunks-extraction', array(
	"X-Mashape-Key: 3de93acbaamsh1694cb8b9f768fap18c1bajsn02ca3ba6ddc1","Content-Type: application/x-www-form-urlencoded","Accept: application/json"), array(
	"text" => $text));
	return $response;
	}
//$response = RequestCURL('https://textanalysis.p.rapidapi.com/textblob-noun-phrase-extraction',array("X-Mashape-Key: 3de93acbaamsh1694cb8b9f768fap18c1bajsn02ca3ba6ddc1","Content-Type: application/x-www-form-urlencoded","Accept: application/json"), array("text" => "Natural language processing (NLP) deals with the application of computational models to text or speech data. Application areas within NLP include automatic (machine) translation between languages; dialogue systems, which allow a human to interact with a machine using natural language; and information extraction, where the goal is to transform unstructured text into structured (database) representations that can be searched and browsed in flexible ways. NLP technologies are having a dramatic impact on the way people interact with computers, on the way people interact with each other through the use of language, and on the way people access the vastamount of linguistic data now in electronic form. From a scientific viewpoint, NLP involves fundamental questions of how to structure formal models (for example statistical models) of natural language phenomena, and of how to design algorithms that implement these models."));
$text = $_GET['text'];
$i=query($text);
echo json_encode($i);
?>