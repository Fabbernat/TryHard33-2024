<?php
session_start();

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "web_db";

$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query subscribed users
$sql = "SELECT email FROM newslettersubscribers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Email: " . $row["email"]. "<br>";
    }
} else {
    echo "No subscribed users.";
}
$conn->close();