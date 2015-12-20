<?php
require 'model/model.php';
require 'view/chat_rows.php';

if($parentArray = readMyData())
{
	$allChat = "";
	foreach($parentArray as $row)
	{
		$allChat .= getRow($row);
	}

	echo $allChat;
}
else
{
	echo "no chat yet!";
}

?>