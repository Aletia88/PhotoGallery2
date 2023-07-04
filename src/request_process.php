<?php
// Database connection
$servername = "localhost";  // Change this if your database server is different
$username = "root";  // Change this to your MySQL username
$password = "";  // Change this to your MySQL password
$database = "Gallery";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the "requests" table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS Gallery.requests (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    uploadedImages VARCHAR(255) NOT NULL,
    profilePhoto VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table 'requests' created successfully!<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
}

// Handle form submission
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['name'];

    // Check if the username exists in the editProfile table
    $checkUsernameSql = "SELECT name FROM editProfile WHERE name = '$username'";
    $resultUsername = mysqli_query($conn, $checkUsernameSql);
    
    if (mysqli_num_rows($resultUsername) > 0) {
        // Username exists, continue processing the form data
        $uploadedImages = $_FILES['photo']['name'];
        $sqlProfilePhoto = "SELECT profile_image FROM editProfile LIMIT 1";
        $resultProfilePhoto = mysqli_query($conn, $sqlProfilePhoto);
        
        $row = mysqli_fetch_assoc($resultProfilePhoto);
        $profilePhoto = $row['profile_image'];
        
        // Move the uploaded file to a desired location (e.g., a folder named "uploads")
        $targetDir = "uploads/upload_requests/";
        $targetFile = $targetDir . basename($_FILES['photo']['name']);
        
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
            echo "File uploaded successfully!<br>";
            
            // Insert the form data into the "requests" table
            $insertSql = "INSERT INTO Gallery.requests (username, uploadedImages, profilePhoto) VALUES ('$username', '$uploadedImages', '$profilePhoto')";
            
            if (mysqli_query($conn, $insertSql)) {
                echo "Request submitted successfully!";
            } else {
                echo "Error submitting request: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading file!<br>";
        }
    } else {
        echo "Invalid username. Please enter a valid username.";
    }
}




mysqli_close($conn);
?>

