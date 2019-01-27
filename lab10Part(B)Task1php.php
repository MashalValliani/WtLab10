<?php
$currentDir = getcwd();
$uploadDirectory = "/uploads/";
$fileName = $_FILES["myfile"]['name'];

$uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
$uploadOk = 1;

$fileTmpName  = $_FILES["myfile"]['tmp_name'];
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $errors     = array();
    $maxsize    = 2097152;
    $acceptable = array(
        'application/pdf',
        'image/jpeg',
        'image/jpg',
        'image/png'
    );

    if(($_FILES['myfile']['size'] >= $maxsize) || ($_FILES["myfile"]["size"] == 0)) {
        $errors[] = 'File too large. File must be less than 2 megabytes.';
    }

    if((!in_array($_FILES['myfile']['type'], $acceptable)) && (!empty($_FILES["myfile"]["type"]))) {
        $errors[] = 'Invalid file type. Only PDF, JPG and PNG types are accepted.';
    }

    if(count($errors) === 0) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        $uploadOk = 1;
        echo '<script>alert("Uploaded Successfully");</script>';
    } 
    else {
        foreach($errors as $error) {
            echo '<script>alert("'.$error.'");</script>';
            $uploadOk = 0;
        }

        die(); //Ensure no more processing is done
    }
}

?>