<?php
	$MCAST_PORT = 0xBEE2;
	$HOST = "localhost";
	$errno = 0;
	$errstr = "";

	$received = "RPNAK";
	$value = htmlspecialchars($_GET["value"]);

	$data = "";

	if ($value == "valve") {
		$data = "RPC:valve\n";
	} else if ($value == "fan") {
		$data = "RPC:fan\n";
	} else if ($value = "flow") {
		$data = "RPC:flow\n";
	} else {
		echo $received;
		exit();
	}
	
	$fp = fsockopen($HOST, $MCAST_PORT, $errno, $errstr, 10);
	fwrite($fp, $data);
	$received = fread($fp, 1024);
	fclose($fp);
	echo $received;
?>