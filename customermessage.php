<style>
table {
  width: 90%;
}

td, th {
  border: 3px solid;
  text-align: left;
  padding: 10px;
}



</style>

<?php
		require_once("Connect.php");
		

        error_reporting(E_ERROR | E_PARSE);
        $query = "SELECT * FROM contactforms";

		$result = mysqli_query($connection, $query);
		$num_rows = mysqli_num_rows($result);

		echo "<table class=\"table\">";
			echo "<tr>\n"
				 ."<th scope=\"col\">Full Name</th>\n"
				 ."<th scope=\"col\">Email</th>\n"
				 ."<th scope=\"col\">Subject</th>\n"
				 ."<th scope=\"col\">Message</th>\n"
				 ."</tr>\n";
if ($num_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$row["Name"]."</td>";
			echo "<td>".$row["Email"]."</td>";
			echo "<td>".$row["Subject"]."</td>";
			echo "<td>".$row["Message"]."</td>";
			echo "</tr>";
		}
}
echo "</table>";
?>