<?php
// ... Your database connection and other code ...

if (isset($_POST['username'])) {
    $username = $_POST['username'];

    // Check if the username already exists
    $checkUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $checkUsernameQuery);

    if (mysqli_num_rows($result) > 0) {
        // Username already exists
        echo "exists";
    } else {
        // Username is available
        echo "available";
    }
}
?>
