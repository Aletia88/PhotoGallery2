<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Gallery";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// $sql = "DROP TABLE IF EXISTS approved";

// if (mysqli_query($conn, $sql)) {
//     echo "Table 'approved' deleted successfully!<br>";
// } else {
//     echo "Error deleting table: " . mysqli_error($conn) . "<br>";
// }

$sqlCreateTable = "CREATE TABLE IF NOT EXISTS approved (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    profileimage VARCHAR(255) NOT NULL,
    uploadedimage VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sqlCreateTable)) {
    echo "Table 'approved' created successfully!<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
}

// Get the values from the AJAX request
$userName = $_POST['userName'];
$profilePhoto = $_POST['profilePhoto'];
$uploadedPhoto = $_POST['uploadedPhoto'];
$category = $_POST['category'];

$profilePhotoName = basename($profilePhoto);
$uploadedPhotoName = basename($uploadedPhoto);

// Insert the approved request into the "approved" table
$sqlInsertApproved = "INSERT INTO approved (username, profileimage, uploadedimage, category)
VALUES ('$userName', '$profilePhotoName', '$uploadedPhotoName', '$category')";
$deleteSql = "DELETE FROM requests WHERE username = '$userName' AND uploadedImages = '$uploadedPhoto'";

if (mysqli_query($conn, $sqlInsertApproved)) {
    echo "Approved request inserted into the 'approved' table successfully.";

    if (mysqli_query($conn, $deleteSql)) {
        echo "Request deleted from the 'requests' table successfully.";
    } else {
        echo "Error deleting request: " . mysqli_error($conn);
    }
} else {
    echo "Error inserting approved request: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

