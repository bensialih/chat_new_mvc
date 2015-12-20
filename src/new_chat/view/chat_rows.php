<?php
//view/chat_row.php
function getRow($row_array)
{
	return sprintf("<p>%s , %s , %s</p>", $row_array['time'], $row_array['username'], $row_array['message']);
}

?>