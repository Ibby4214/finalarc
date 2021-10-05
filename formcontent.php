<?php

require_once ("Connect.php");

if(isset($_POST['Submit']))
{
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Subject = $_POST['Subject'];
    $Message = $_POST['Message'];
    

    if(!$connection)
    {
        echo '<script type = "text/javascript">';
        echo 'alert("Message failed, Click ok to return to contact page");';
        echo 'window.location.href = "contactpage.html" ';
        echo '</script>';
    }

    // If there is a connection, the following varibables will be inputted into the dedicated field in the table
    else
    {
        $query = "INSERT IGNORE INTO `contactforms`(`Name`, `Email`, `Subject`, `Message`) 
        VALUES ('$Name','$Email','$Subject','$Message')";

        $result = mysqli_query($connection,$query) or die('Error Querying Database.');

        // Return message for the user dictating that the form have been sucessfully submitted 
        mysqli_close($connection);

        echo '<script type = "text/javascript">';
        echo 'alert("Message sent, Click ok to return to contact page");';
        echo 'window.location.href = "contactpage.html" ';
        echo '</script>';
   }
   
}

?>
