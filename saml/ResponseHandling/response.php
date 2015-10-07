<?php 
	$currdate = date('Y-m-d H:i:s', time()-(60*60*7));
	$samlpath = "responsecapture.txt";
	file_put_contents($samlpath, $currdate, FILE_APPEND);
	file_put_contents($samlpath, print_r($_POST, true), FILE_APPEND);
	file_put_contents($samlpath, "\n", FILE_APPEND);
?>
<head>
</head>
<body>
<font size="+3"/>wahoo it's a response</font>

</body
