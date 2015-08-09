<?php
	include('init.php');

	$stmt = $conn->prepare("INSERT INTO students (student_id, name) VALUES (?, ?)");
	$stmt->bind_param("ss", $student_id, $name);
	
	$student_id = "120041";
	$name = "Chai Wei Thang";
	$stmt->execute();
	echo "<p>New records created successfully</p>";



	

	$stmt = $conn->prepare("INSERT INTO attendance (date, has_attended, student_id) VALUES (?, ?, ?)");
	$stmt->bind_param("sis", $date, $has_attended, $student_id);
	
	$date =  date("Y-m-d H:i:s");
	$has_attended = true;
	$student_id = "120041";
	$stmt->execute();
	echo "<p>New records created successfully</p>";
	
	$stmt = $conn->prepare("SELECT * FROM attendance");
	$stmt->execute();
	
	$results = $stmt->get_result();
	
?>