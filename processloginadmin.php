<?php
require_once("Connect.php");

	if (isset($_POST['submit']))
		{
			$ausername=mysqli_real_escape_string($connection, $_POST['ausername']);
			$apassword=mysqli_real_escape_string($connection, $_POST['apassword']);
			
			$sql=mysqli_query($connection, "SELECT * FROM adminlogin WHERE  ausername = '$ausername' and apassword ='$apassword'");
			$row=mysqli_fetch_array($sql);
			$output=mysqli_num_rows($sql);
			

			if ($output > 0) 
				{			
					$_SESSION['ausername'] = $row['ausername'];
				echo '<script type = "text/javascript">';
				echo 'alert("You have sucessfully logged in, Welcome admin");';
				echo 'window.location.href = "adminpanel.html" ';
				echo '</script>';
            	
				}
			else
				{
					echo '<script type = "text/javascript">';
        			echo 'alert("Your user credentials are incorrect, please try again");';
        			echo 'window.location.href = "loginpage.html" ';
        			echo '</script>';
				}
        
		}
   ?>