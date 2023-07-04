<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $targetDirectory = 'uploads/';
  $targetFile = $targetDirectory . basename($_FILES['photo']['name']);

  // Check if the uploaded file is a valid photo
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
  $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

  if (in_array($imageFileType, $allowedExtensions)) {
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
      // File uploaded successfully
      // Save the file information to the database
      $photoName = basename($_FILES['photo']['name']);
      savePhotoToDatabase($photoName);
    } else {
      // Error uploading file
      echo 'Error uploading the file.';
    }
  } else {
    // Invalid file type
    echo 'Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.';
  }
}

function savePhotoToDatabase($photoName) {
  $servername = "localhost";
  $username = "your_username";
  $password = "your_password";
  $dbname = "your_database_name";

  // Create a connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute the SQL query
  $sql = "INSERT INTO photos (name) VALUES ('$photoName')";
  if ($conn->query($sql) === true) {
    // Photo saved to the database successfully
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the connection
  $conn->close();
}
