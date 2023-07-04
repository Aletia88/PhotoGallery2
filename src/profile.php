<!DOCTYPE html>
<html>
<head>
  <title>Web Gallery Profile Page</title>
  <link rel="stylesheet" href="profile.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">


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

// Retrieve the data from the database
$sql = "SELECT name, profile_image, phone FROM editProfile";
$result = mysqli_query($conn, $sql);

// Check if there is a record

    // Fetch the first row
    $row = mysqli_fetch_assoc($result);

    // Store the values in variables
    $name = $row['name'];
    $phone = $row['phone'];
    $profileImage = $row['profile_image'];

mysqli_close($conn);
?>

</head>
<body>
  <div class="flex justify-between m-5 items-center gap-48">

   
    <a href="./index.php" class="">Photo Gallery</a>
  
    <nav >
      <ul class="flex gap-5">
        <li><a href="./index.php" class="active">Home</a></li>
        <li><a href="./About.php">About</a></li>
        <li><a href="./login.php">Login/Signin</a></li>
        <li><a href="./contactUs.php">Contact Us</a></li>
        <li><a href="./Help.php">Help</a></li>
      </ul>
    </nav>
  </div>
  <div class="pro flex flex-col items-center">
    <img src="uploads/<?php echo $profileImage; ?>"  alt="pro Image">
    <h1><?php echo $name ?></h1>
    <p><?php echo $phone ?></p>
    <button class="text-yellow-400 font-bold "> <a href="./editprofile.php">Edit Profile</a> </button>
  </div>
  
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["uploaded_images"])) {
    $targetDirectory = "uploads/"; // Specify the directory where you want to store the uploaded images

    // Iterate through each uploaded image
    foreach ($_FILES["uploaded_images"]["tmp_name"] as $key => $tmpName) {
        $fileName = $_FILES["uploaded_images"]["name"][$key];
        $targetFile = $targetDirectory . $fileName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is a valid image
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $allowedExtensions)) {
            // Move the uploaded file to the target directory
            move_uploaded_file($tmpName, $targetFile);

            // Display the uploaded image
            
            echo '<img src="' . $targetFile . '" alt="' . $fileName . '">';
        }
    }
}
?>

<div class="h-[50vh] bg-white">
    <div class="gal">
        <!-- Display uploaded images -->
        <?php
        $directory = "uploads/";
        $images = glob($directory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
        foreach ($images as $image) {
            $fileName = basename($image);
            echo '<img src="' . $image . '" alt="' . $fileName . '">';
        }
        ?>
    </div>

    <!-- Image upload form -->
    <form action="./request.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploaded_images[]" multiple accept="image/*">
        <button>
          
        </button><a href="./request.php"><input type="submit" value="Upload Images"></a>
        
    </form>
</div>


</body>
</html>
