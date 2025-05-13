<?php
// Database connection parameters
$server = "localhost";  // Change if hosted elsewhere
$username = "root";     // Your MySQL username
$password = "";         // Your MySQL password
$database = "zform22"; // Database name

// Establish the database connection
$conn = new mysqli($server, $username, $password, $database);

// Check for any connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using POST method
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $board = $_POST['board'];
    $stream = $_POST['stream'];
    $mark = $_POST['mark'];
    $date = $_POST['date'];

    // Prepare SQL statement to insert the data into the database
    $sql = "INSERT INTO form_data (fullname, gender, board, stream, mark, date_of_completion) 
            VALUES ('$fullname', '$gender', '$board', '$stream', '$mark', '$date')";

    // Execute the query and check if it was successful
    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
