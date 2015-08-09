<?php
	include('init.php');
	
	echo "<p>Connected successfully</p>";
	
	$stmt = $conn-> prepare("SELECT * FROM attendance WHERE student_id =?");

	$stmt->bind_param("s", $student_id);
	$student_id = @$_POST['myId'];
	$stmt->execute();
	
	$results = $stmt->get_result();
	
	while($row = $results->fetch_assoc()){
                echo "<table border='1px'><tr><td>" . $row ['student_id'] . "<td><td>" . $row['date'] . '</td><td>' . $row['has_attended'] . "</tr></table>";
            }
	$stmt->close();
	$conn->close();
?>


