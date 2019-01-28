<?php
/*
Part: A 
File Manipulation
Task:2
Convert a pdf file to a text file using PHP filing functions.
*/
$old_name = "file.pdf" ;
        $new_name = "FileNew.txt" ; 
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

 
?>