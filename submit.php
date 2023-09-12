<?php
// Establish a database connection (you should configure your database settings here)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $cars = implode(", ", $_POST["car"]); // Convert selected cars to a comma-separated string

    // Insert data into the database
    $sql = "INSERT INTO car_selection (name, phone, email, address, cars) VALUES ('$name', '$phone', '$email', '$address', '$cars')";

    if ($conn->query($sql) === TRUE) {
        echo "Data stored successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
