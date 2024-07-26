<?php
// Configuration
$db_host = 'localhost';
$db_username = 'your_username';
$db_password = 'your_password';
$db_name = 'your_database';

// Connect to database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define variables
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$baptism = $_POST['baptism'];
$membership = $_POST['membership'];

// Validate input data
if (empty($name) || empty($age) || empty($email) || empty($phone) || empty($address)) {
    echo "Please fill in all required fields.";
    exit;
}

// Insert data into database
$sql = "INSERT INTO jemaat (name, age, email, phone, address, baptism, membership) VALUES ('$name', '$age', '$email', '$phone', '$address', '$baptism', '$membership')";
if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();