<?php
//model/Model.php
namespace new_chat\model;

class Model
{
	private $filename = "database.txt";
	public function __construct($filename = null)
	{
		if($filename)
			$this->filename = $filename;
	}


	public function writeToFile(array $child_array)
	{
		if($parent_array = $this->readMyData()){
		//add child array to parent array
		$parent_array[] = $child_array;
		}
		else{
		//file is empty
		//add parent array then add child
		$parent_array = array($child_array);
		}

	$this->commitToFile($parent_array);
	}

	public function commitToFile(array $parent_array){
	file_put_contents($this->filename, serialize($parent_array));
	}


	function readMyData(){
	$file_string = file_get_contents($this->filename);
	
	if($file_string!=""){
		$chat_object = unserialize($file_string);
		return $chat_object;
	}
	else{
		return null;
	}
	}
}
