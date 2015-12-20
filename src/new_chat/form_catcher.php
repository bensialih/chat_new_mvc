<?php
//our control
//form_catcher.php

require 'model/model.php';

function getPostTime()
{
	return date("Y-m-d h:i:s", time());
}


function checkData()
{
	$data_array = null;

	if((isset($_POST['username']))&&(isset($_POST['message'])))
	{
		if(($_POST['username']!="")&&($_POST['message']!=""))
		{
		$data_array = array("username"=>$_POST['username'], "message"=>$_POST['message'], "time"=>getPostTime() );
		}
	}

	return $data_array;
}

if($data_array = checkData())
{
	writeToFile($data_array);
}

header("Location: index.php");


?>
