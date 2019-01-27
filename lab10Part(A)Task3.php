<?php
/*
Part: A 
File Manipulation
Task:2
Append your roll number into a file and then read the file to check the output.
*/
$my_file = 'sample.txt';
$handle = fopen($my_file, 'a') 
or 
die('Cannot open file:  '.$my_file);
$data = '166sw158 16sw74 16sw162 16sw18 16sw182';
fwrite($handle, $data);
fclose($handle);
$myFile = 'sample.txt';
$handlerFile = fopen($myFile, 'r');
$data = fread($handlerFile,filesize($myFile));
echo $data;
fclose($handlerFile);
?>