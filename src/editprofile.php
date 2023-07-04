<!DOCTYPE html>
<html>

<head>
    <title>User Information Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Handlee&family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-color: white;
        }

        h2 {
            color: #DAA624;
        }

        form {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 5px;
            width: 80%;
            margin: 80px 0;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 5px;
            border: 1px solid gray;
            border-radius: 5px;
            transition: border-color 0.3s ease;
            color: gray;
        }

        input[type="text"]:hover,
        input[type="file"]:hover {
            border-color: #DAA624;
            color: black;
        }

        input[type="file"] {
            border: none;
        }

        input[type="submit"] {
            background-color: #DAA624;
            color: #FFFFFF;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .grid-cols-2>div {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .grid-cols-2>div>label {
            width: 100px;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .header {

            padding: 20px;
            text-align: center;
            color: #DAA624;
        }

        .header {
            font-size: 36px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            font-family: 'Handlee', cursive;
        }

        .tooltip {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 300px;
            color: gray;
            text-align: center;
            border-radius: 5px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }


        
    </style>



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
    $sql = "SELECT * FROM editProfile";
    $result = mysqli_query($conn, $sql);

    // Check if there is a record
    if (mysqli_num_rows($result) > 0) {
        // Fetch the first row
        $row = mysqli_fetch_assoc($result);

        // Store the values in variables
        $name = $row['name'];
        $linkedin = $row['linkedin'];
        $twitter = $row['twitter'];
        $github = $row['github'];
        $facebook = $row['facebook'];
        $instagram = $row['instagram'];
        $phone = $row['phone'];
        $profileImage = $row['profile_image'];
    } else {
        // Set default values if no record found
        $name = '';
        $linkedin = '';
        $twitter = '';
        $github = '';
        $facebook = '';
        $instagram = '';
        $phone = '';
        $profileImage = '';
    }

    // Close the connection
    mysqli_close($conn);
    ?>


</head>

<body class="flex flex-col justify-center items-center">
    <h2 class='header'>User Information Form</h2>
    <form action="detailInfo.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="grid grid-cols-2 gap-8">
            <div class="flex gap-4 h-10 rounded-md">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $name; ?>" required><br><br>
            </div>
            <div>
                <label for="linkedin">LinkedIn:</label>
                <input type="text" name="linkedin" value="<?php echo $linkedin; ?>"><br><br>
            </div>
            <div>
                <label for="twitter">Twitter:</label>
                <input type="text" name="twitter" value="<?php echo $twitter; ?>"><br><br>
            </div>
            <div>
                <label for="github">GitHub:</label>
                <input type="text" name="github" value="<?php echo $github; ?>"><br><br>
            </div>
            <div>
                <label for="facebook">Facebook:</label>
                <input type="text" name="facebook" value="<?php echo $facebook; ?>"><br><br>
            </div>
            <div>
                <label for="instagram">Instagram:</label>
                <input type="text" name="instagram" value="<?php echo $instagram; ?>"><br><br>
            </div>
            <div class="tooltip">
                <label for="phone" class="tooltip">
                    bio:
                    <span class="tooltiptext text-sm ">Say something about yourself</span>
                </label>
                <input type="text" class="tooltip" name="phone" value="<?php echo $phone; ?>"><br><br>
            </div>
            <div>
                <label for="profile_image">Profile Image:</label>
                <img class="rounded-full" src="uploads/<?php echo $profileImage; ?>" alt="Profile Image" width="50px"
                    height="50px">
                <input type="file" name="profile_image" accept="image/*">
            </div>
        </div>

        <input type="submit" value="Submit">
    </form>



    </div>
    </div>

    <p class="error-message" id="social-media-error"></p>


    <script>
        function validateForm() {
            const linkedinInput = document.querySelector('input[name="linkedin"]');
            const twitterInput = document.querySelector('input[name="twitter"]');
            const githubInput = document.querySelector('input[name="github"]');
            const facebookInput = document.querySelector('input[name="facebook"]');
            const instagramInput = document.querySelector('input[name="instagram"]');
            const errorText = document.getElementById('social-media-error');

            if (!linkedinInput.value && !twitterInput.value && !githubInput.value && !facebookInput.value && !instagramInput.value) {
                errorText.textContent = "Please fill at least one of the social media fields.";
                return false;
            }

            return true;
        }
    </script>
</body>

</html>