<!DOCTYPE html>
<?php

require_once ("Connect.php");

if(isset($_POST['Submit']))
{
    
    $pictures = addslashes(file_get_contents($_FILES['pictures']['tmp_name']));
    $caption = $_POST['caption'];

    if(!$connection)
    {
        echo "Sorry There was no connection Found, Please Try again";
    }

    // If there is a connection, the following varibables will be inputted into the dedicated field in the table
    else
    {
        $sql = "INSERT IGNORE INTO `galleryhub`(pictures, caption) 
        VALUES ('$pictures','$caption')";

        $result = mysqli_query($connection,$sql) or die('Error Querying Database.');

        // Return message for the user dictating that the form have been sucessfully submitted 
       // echo "Database entry sucessfull! You can use the following links to return to the catalogue page";
       if ($result)
       {
            header("location:galleryform.html");
            echo "Pass";
       }
       else
       {
           echo "Please check your input.";
       }
       

        mysqli_close($connection);
   }
}