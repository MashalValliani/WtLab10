
<?php
/*
Part: B
File Uploading
Task:2
A text file to the PHP server. Create HTML form controls for reading, writing, copying, renaming and deleting the uploaded text file.
*/

 // Create A Upload Folder Before Executing the code in htdocs
$currentDir = getcwd();
$uploadDirectory = "/uploads/";
if((!isset($_POST["delete"])) && (!isset($_POST["read"]))&& (!isset($_POST["rename"]))&& (!isset($_POST["copy"]))&& (!isset($_POST["write"])) ) {

	//echo $uploadPath;

	$done=0;
	$fileTmpName  = $_FILES["myfile"]['tmp_name'];
	$fileName = $_FILES["myfile"]['name'];
	$uploadPath = $currentDir . $uploadDirectory . basename($fileName); 

	if(isset($_POST["upload"])) {

	$didUpload = move_uploaded_file($fileTmpName, $uploadPath);
	    echo "File is valid, and was successfully uploaded.\n"; 
	$done=1;}

	else {
	    echo "Possible file upload attack!\n";
	        die(); //Ensure no more processing is done
	}    
}

if(isset($_POST["delete"])) {
	$filename= $_POST['filename'];
	unlink($filename);
	echo "File deleted";
} 

if(isset($_POST["read"])) {

	$filename= $_POST['filename'];
	echo "inside read method".$filename;
	$handlerFile = fopen($filename, 'r');
	$data = fread($handlerFile,filesize($filename));
	echo $data;
	fclose($handlerFile);
}
if(isset($_POST["rename"])) {
	$filename= $_POST['filename'];
	$old_name = $filename;
   	$new_name = "NewFile.txt" ; 
        if(file_exists($new_name))
        { 
           echo "Error While Renaming $old_name" ;
        }
        else
        {
           if(rename( $old_name, $new_name))
           { 
           echo "Successfully Renamed $old_name to $new_name" ;
           }
          else
          {
           echo "A File With The Same Name Already Exists" ;
          }
        }
    }
	
if(isset($_POST["copy"])) {

	$filename= $_POST['filename'];
	
	echo copy($filename,"copiedfile.txt");
}
if(isset($_POST["write"])) {
	$filename= $_POST['filename'];
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	$txt = "mashal valliani, saba khan\n";
	fwrite($myfile, $txt);
	echo "successfully written";
	fclose($myfile);
	
}
?>
 <html>
<head>
<title></title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
	<input type="hidden" value="<?php echo $uploadPath;?>" name="filename"/>
    <input type="submit" value="Read from file" name="read" id="read"> </br></br>
    <input type="submit" value="Write into file" name="write" id="write"> </br></br>
    <input type="submit" value="Copy file" name="copy" id="copy"> </br></br>
    <input type="submit" value="Rename file" name="rename" id="rename"> </br> </br>
    <input type="submit" value="Delete file" name="delete" id="delete"> </br> </br></form>
    </body> </html>
