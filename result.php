<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>
    <title>Progress Bar</title>
</head>
<body>
<!-- Progress bar holder -->
<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
<!-- Progress information -->
<div id="information" style="width"></div>
<?php

$isbn = $_POST['isbn']; 
echo "ISBN: ".$isbn;

// Total processes
$total = 10;
// Loop through process
$cmd = "python /var/www/html/service/progressbar/process.py ".$isbn;
$proc = popen($cmd, 'r');

//rea one line of the last oparation, and do nothing
$i = (int) fread($proc, 4096);

while (!feof($proc)) {
    // Calculate the percentation
	$i = (int) fread($proc, 4096);
    $percent = intval($i/$total * 100)."%";    
	// Javascript for updating the progress bar and information
    echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="'.$percent.' processed.";
    </script>';

	// Send output to browser immediately
    flush();

	// Sleep one second so we can see the delay
    sleep(1);
	
	if($percent=="100%")
		break;
}

// Tell user that the process is completed
    echo '<script language="javascript">
    document.getElementById("information").innerHTML="Process completed!";
    </script>';
?>
</body>
</html>
