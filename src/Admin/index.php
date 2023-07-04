<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Gallery";

// Create a new connection
$conn = mysqli_connect($servername, $username, $password);

// Check the connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Select the database
mysqli_select_db($conn, $dbname);

// Fetch image approval requests from the requests table
$sqlFetchRequests = "SELECT * FROM requests";
$resultFetchRequests = mysqli_query($conn, $sqlFetchRequests);

?>

<!DOCTYPE html>
<html>

<head>
  <title>Web Gallery Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19" rel="stylesheet">
  <style>
    /* Custom styles for the admin side */
    .container {
      max-width: 800px;
      margin: 0 auto;
    }

    .section {
      border: 1px solid #e2e8f0;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 8px;
      transition: box-shadow 0.3s ease;
    }

    .section:hover {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .section h2 {
      margin-bottom: 10px;
      color: #4c4c4c;
    }

    .section p {
      margin-bottom: 20px;
      color: #777777;
    }

    .section a {
      display: inline-block;
      background-color: #DAA624;
      color: #ffffff;
      padding: 10px 20px;
      border-radius: 4px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .section a:hover {
      background-color: #DAA624;
    }

    .image-request {
      border-bottom: 1px solid #e2e8f0;
      padding: 10px 0;
      display: flex;
      align-items: center;
    }

    .image-request img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 50%;
      margin-right: 10px;
    }

    .image-request .details {
      flex: 1;
    }

    .image-request .approve-button {
      background-color: #DAA624;
      color: #ffffff;
      padding: 6px 12px;
      border-radius: 4px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .image-request .approve-button:hover {
      background-color: #DAA624;
    }

    .fullscreen-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }

    .fullscreen-image {
      max-width: 90%;
      max-height: 90%;
    }

    .close-button {
      position: absolute;
      top: 10px;
      right: 10px;
      color: #fff;
      font-size: 24px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="container mx-auto p-8">
    <h1 class="text-4xl font-bold mb-8">Web Gallery Admin</h1>

    <div class=" mt-4 ">
      <div class="section mb-4">
        <h2 class="text-2xl font-bold mb-4">Image Management</h2>
        <p>Upload, delete, and update gallery images.</p>
        <a href="imageManagement.php">Go to Image Management</a>
      </div>

      <div class="section mb-4">
        <h2 class="text-2xl font-bold mb-4">User Management</h2>
        <p>Manage user accounts and permissions.</p>
        <a href="userManagement.php">Go to User Management</a>
      </div>

      <div class="section">
    <h2 class="text-2xl font-bold mb-4">Image Approval Requests</h2>

    <div id="approved-message" class="approved-message" style="display: none;">
    Approved! The request has been successfully approved.
</div>

<?php
// Check if there are image approval requests
if (mysqli_num_rows($resultFetchRequests) > 0) {
    // Loop through each request and display the details
    while ($row = mysqli_fetch_assoc($resultFetchRequests)) {
        $userName = $row['username'];
        $uploadedPhotoName = $row['uploadedImages'];
        $profilePhoto = $row['profilePhoto'];
        ?>
        <div class="image-request">
            <img src="<?php echo ("../uploads/upload_requests/" . $profilePhoto); ?>" alt="User Avatar">
            <div class="details">
                <p><strong><?php echo $userName; ?></strong> has requested to upload an image.</p>
                
                <select name="category" id="dropdownList">
                    <option value="Nature">Nature</option>
                    <option value="Animal">Animal</option>
                    <option value="City">City</option>
                    <option value="Food">Food</option>
                    <option value="Culture">Culture</option>
                </select>
                <button class="approve-button" onclick="approveRequest('<?php echo $userName; ?>', '<?php echo $profilePhoto; ?>', '<?php echo $uploadedPhotoName; ?>')">Approve</button>

                <a href="<?php echo "../uploads/" . $uploadedPhotoName; ?>" class="show-image-button">Show Image</a>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p>No image approval requests found.</p>";
}
?>

</div>
</div>
</div>
</body>

<script>
function approveRequest(userName, profilePhoto, uploadedPhoto) {
    // Get the selected category value
    var categoryDropdown = document.getElementById("dropdownList");
    var category = categoryDropdown.value;
    
    // Make an AJAX request to insert the approved request into the "approved" table
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "insert_approved.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            // Request successful, response received
            document.getElementById('approved-message').style.display = 'block';
            setTimeout(function() {
                document.getElementById('approved-message').style.display = 'none';
            }, 10000);

            var requestElement = document.getElementsByClassName('image-request')[0];
            requestElement.parentNode.removeChild(requestElement);
        }
    };
    xhr.send("userName=" + userName + "&profilePhoto=" + profilePhoto + "&uploadedPhoto=" + uploadedPhoto + "&category=" + category);
}

// Get all the show image buttons
var showImageButtons = document.querySelectorAll('.show-image-button');

// Attach click event listener to each show image button
showImageButtons.forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault();

        // Get the image URL from the button's href attribute
        var imageUrl = this.getAttribute('href');

        // Create a new image element
        var imageElement = document.createElement('img');
        imageElement.src = imageUrl;
        imageElement.alt = 'Requested Image';

        // Create the fullscreen overlay element
        var overlayElement = document.createElement('div');
        overlayElement.className = 'fullscreen-overlay';

        // Create the close button element
        var closeButton = document.createElement('span');
        closeButton.innerHTML = '&times;';
        closeButton.className = 'close-button';

        // Append the image and close button to the overlay
        overlayElement.appendChild(imageElement);
        overlayElement.appendChild(closeButton);

        // Append the overlay to the document body
        document.body.appendChild(overlayElement);

        // Add click event listener to the close button
        closeButton.addEventListener('click', function() {
            // Remove the overlay from the document body
            document.body.removeChild(overlayElement);
        });
    });
});
</script>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
