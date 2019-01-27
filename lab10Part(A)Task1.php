<?php
/*
Part: A 
File Manipulation
Task:1
Read any text file and count the number of words using both 
str_word_count() method and explode() method 
(to convert string to array using a space separator) and compare the 
results. Also count the number of lines in the file.
*/
$file = "wt-lab-10.txt";
$str = file_get_contents($file) 
or 
die("Can not read from file");
echo $str ."<br>";
echo"<br>";
// read file into array
$array = file($file)
or 
die("Can not read from file");

//counts words using str_word_count
$numWords = str_word_count($str);
echo "Using str_word_count Counted " . $numWords . " word(s).<br>";

//counts words using explode()
$Words = explode (" ",$str);
$NoOfWords=count($Words);
echo "Using explode() Counted " . $NoOfWords . " word(s).<br>";

// count lines in the file
echo "Counted " . count($array) ." line(s). <br>";

?>