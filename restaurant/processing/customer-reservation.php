<?php
		$reserved_by = $_POST['reserved_by'];
		$phone_number = $_POST['phone_number'];
		$party_size = $_POST['party_size'];
		$date = $_POST['date'];
		$time = $_POST['time'];

		$conn = mysqli_connect("localhost", "root", "", "restaurant_db");
		mysqli_query($conn, "INSERT INTO `reservation` (`reserved_by`, `phone_number`, `party_size`, `date`, `time`) VALUES ('".$reserved_by."', '".$phone_number."', '".$party_size."', '".$date."', '".$time."');");
		
		header("Location: ../reservation.php");
?>