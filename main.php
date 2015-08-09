<!DOCTYPE html>
    <?php
        
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "mcs";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    
    
    echo "<p>Connected successfully</p>";
    
    $stmt = $conn-> prepare('SELECT * FROM attendance 
INNER JOIN students
ON students.student_id = attendance.student_id
WHERE attendance.student_id = ?');

    $stmt->bind_param("s", $student_id);
    $student_id = @$_POST['myId'];
    $stmt->execute();
    
    $results = $stmt->get_result();
    
    
    $stmt->close();
    $conn->close();
?>
    <head>
    </head>
    <body>

        <form action="" method="post">
        	<label>Find student attentance by student Id: </label><input type="text" name="myId"/>
        	<input type="submit" name="submit" />
        </form>

        <?php
            

            while($row = $results->fetch_assoc()){
                echo "<table border='1px'><tr><td>" . $row ['student_id'] . "<td>" .  $row['name'] . "<td>" . $row['date'] . '</td><td>' . $row['has_attended'] . "</tr></table>";
            }
        ?>
    </body>
</html>