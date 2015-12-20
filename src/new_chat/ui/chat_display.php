<?php
//ui/chat_display.php
?>

<iframe src="iframe_get.php" width="600" height="150" id="chat_displayer" >
</iframe>
<br/>

<script>

function reloadIFrame() 
{
//	console.log("welcome");
	document.getElementById("chat_displayer").contentWindow.location.reload(true);
}

setInterval("reloadIFrame();", 1000);
</script>