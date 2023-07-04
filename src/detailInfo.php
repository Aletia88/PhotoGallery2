








<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Gallery";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// SQL query to create the table
// $sql = "CREATE TABLE editProfile (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(100) NOT NULL,
//     linkedin VARCHAR(100),
//     twitter VARCHAR(100),
//     github VARCHAR(100),
//     facebook VARCHAR(100),
//     instagram VARCHAR(100),
//     phone VARCHAR(20),
//     profile_image VARCHAR(255)
// )";

// // Execute the query
// if (mysqli_query($conn, $sql)) {
//     echo "Table editProfile created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($conn);
// }

// Create a connection
// $conn = mysqli_connect($servername, $username, $password);

// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// // Create the database
// $sql = "CREATE DATABASE Gallery";

// if (mysqli_query($conn, $sql)) {
//     echo "Database Gallery created successfully";
// } else {
//     echo "Error creating database: " . mysqli_error($conn);
// }

// Function to sanitize the input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the form inputs
    $name = sanitizeInput($_POST["name"]);
    $linkedin = sanitizeInput($_POST["linkedin"]);
    $twitter = sanitizeInput($_POST["twitter"]);
    $github = sanitizeInput($_POST["github"]);
    $facebook = sanitizeInput($_POST["facebook"]);
    $instagram = sanitizeInput($_POST["instagram"]);
    $phone = sanitizeInput($_POST["phone"]);
    
    // // Insert the form data into the table
    // $sql = "INSERT INTO editProfile (name, linkedin, twitter, github, facebook, instagram, phone)
    //         VALUES ('$name', '$linkedin', '$twitter', '$github', '$facebook', '$instagram', '$phone')";

    // if (mysqli_query($conn, $sql)) {
    //     echo "Data inserted successfully";
    // } else {
    //     echo "Error inserting data: " . mysqli_error($conn);
    // }

    if (isset($_FILES["profile_image"]) && $_FILES["profile_image"]["error"] == 0) {
        // Check if the uploaded file is an image
        $imageFileType = strtolower(pathinfo($_FILES["profile_image"]["name"], PATHINFO_EXTENSION));
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");

        if (in_array($imageFileType, $allowedExtensions)) {
            // Move the uploaded file to the desired directory
            $targetDir = "uploads/"; // Specify the directory where you want to store the uploaded images
            $targetFile = $targetDir . basename($_FILES["profile_image"]["name"]);

            if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFile)) {
                // File upload successful, continue with database update

                // Get the image file name
                $profileImageName = basename($_FILES["profile_image"]["name"]);

                // Check if the user already has a record in the database
                $existingRecordQuery = "SELECT * FROM editProfile WHERE name = '$name'";
                $existingRecordResult = mysqli_query($conn, $existingRecordQuery);

                if (mysqli_num_rows($existingRecordResult) > 0) {
                    // Update the existing record
                    $updateQuery = "UPDATE editProfile SET linkedin = '$linkedin', twitter = '$twitter', github = '$github', facebook = '$facebook', 
                                    instagram = '$instagram', phone = '$phone', profile_image = '$profileImageName' WHERE name = '$name'";

                    if (mysqli_query($conn, $updateQuery)) {
                        // Data updated successfully
                        header("Location: profile.php");
                        exit;
                    } else {
                        echo "Error updating data: " . mysqli_error($conn);
                    }
                } else {
                    // Insert a new record
                    $insertQuery = "INSERT INTO editProfile (name, linkedin, twitter, github, facebook, instagram, phone, profile_image)
                                    VALUES ('$name', '$linkedin', '$twitter', '$github', '$facebook', '$instagram', '$phone', '$profileImageName')";

                    if (mysqli_query($conn, $insertQuery)) {
                        // Data inserted successfully
                        header("Location: profile.php");
                        exit;
                    } else {
                        echo "Error inserting data: " . mysqli_error($conn);
                    }
                }
            } else {
                echo "Error uploading the profile image.";
                exit;
            }
        } else {
            echo "Only JPG, JPEG, PNG, and GIF images are allowed.";
            exit;
        }
    } else {
        echo "Error: Profile image file is required.";
        exit;
    }
}

// Close the connection
mysqli_close($conn);
?>
