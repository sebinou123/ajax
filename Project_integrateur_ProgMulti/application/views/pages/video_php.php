<?php
echo "to";
$q=$_GET["q"]; // La réponse du client

$xmlDoc = new DOMDocument();
$xmlDoc->load("VIDEO_XML.xml");

$x=$xmlDoc->getElementsByTagName('Q');

for($i=0; $i<=$x->length-1; $i++){
	if($x->item($i)->nodeType==1){
		if($x->item($i)->childNodes->item(0)->nodeValue == $q){
			$y=($x->item($i)->parentNode);
	 }
  }
}

$cd=($y->childNodes);

for($i=0; $i<$cd->length; $i++){
	if($cd->item($i)->nodeType==1){
		echo("<b>" . $cd->item($i)->nodeName . ":</b>");
		echo($cd->item($i)->childNodes->item(0)->nodeValue);
		echo("<br/>");
	}
	}?>