<?php
	$inp = $_REQUEST["name"];
	$l = $_REQUEST["lang"];
	if($l == "python")
	{
			//Create temp file.
		$myfile = fopen("Tutorfile.py", "w") or die("Unable to open file!");
		fwrite($myfile, $inp);
		fclose($myfile);
		shell_exec("python Tutorfile.py 1>op 2>err");
	}
	else if($l == "java")
	{
		$myfile = fopen("Tutorfile.java", "w") or die("Unable to open file!");
		fwrite($myfile, $inp);
		fclose($myfile);
		shell_exec("javac Tutorfile.java 2>err");
		shell_exec("java Tutorfile 1>op");
	} 
	else if($l == "nodejs")
	{
		$myfile = fopen("Tutorfile.js", "w") or die("Unable to open file!");
		fwrite($myfile, $inp);
		fclose($myfile);
		shell_exec("node Tutorfile.js  1>op 2>err");
	} 
	else if($l == "c")
	{
		$myfile = fopen("Tutorfile.c", "w") or die("Unable to open file!");
		fwrite($myfile, $inp);
		fclose($myfile);
		shell_exec("gcc Tutorfile.c 2>err");
		shell_exec("a.exe 1>op");
	} 
	if (file_get_contents('err'))
		echo file_get_contents('err');
	else
		echo file_get_contents('op');
?>