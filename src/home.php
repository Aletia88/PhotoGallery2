<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Photo Gallery</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19"rel="stylesheet"> -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="d.css">
</head>

<body class="bg-white">
    <div class="fixed bg-white w-screen z-20">
        <div class="flex nav justify-between  z-20 m-5 items-center gap-48">


            <a href="./index.php" class="">Photo Gallery</a>
            <div class="search-container">
                <input type="text" id="search-bar" placeholder="Search..." class="border border-gray-200 rounded-md">
            </div>

            <nav>
                <ul class="flex gap-5 justify-center items-center">
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="./About.php">About</a></li>
                    <li><a href="./contactUs.php">Contact Us</a></li>
                    <li><a href="./Help.php">Help</a></li>
                    <!-- <li><a href="./index.php">Logout</a></li> -->

                    <!-- <li> <a href="./Admin/index.php"><img src="./images/profile.webp" width="35" alt=""></a> </li> -->
                    <?php
        session_start();
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            // User is logged in
            echo '<li><a href="./logout.php">Logout</a></li>';
            echo '<li><a href="./profile.php"><img src="./images/profile.webp" width="35" alt=""></a></li>';
        } else {
            // User is logged out
            echo '<li><a href="./login.php">Login</a></li>';
            echo '<li><a href="./register.php">Register</a></li>';
        }
        ?>

                    <!-- <li> <a href="profile.php"><img src="./images/profile.webp" width="35" alt=""></a> </li> -->

                </ul>
            </nav>
        </div>
        <div class="bg h-screen">

            <div class="waves h-screen">
            </div>
        </div>
        <div class="gallery">
            <nav class="gallery-nav mb-5">
                <ul>
                    <li><a href="#" class="active">All</a></li>
                    <li><a href="#">Nature</a></li>
                    <li><a href="#">Animals</a></li>
                    <li><a href="#">City</a></li>
                    <li><a href="#">Food</a></li>
                    <li><a href="#">Calture</a></li>
                </ul>
            </nav>
            <br>
        </div>
    </div>

    <div class="bg ">

        <div class="waves ">
        </div>
    </div>


    <div class="body  mt-36  m-20 gap-10">


        <div class="grid grid-cols-3 gap-16 w-full">
            <?php
            // Database connection code
            $servername = "localhost"; // Change this if your database server is different
            $username = "root"; // Change this to your MySQL username
            $password = ""; // Change this to your MySQL password
            $database = "Gallery";

            $conn = mysqli_connect($servername, $username, $password, $database);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve image sources from the approved table
            $sql = "SELECT * FROM approved";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];
            $category = $row['category'];

            $sql2 = "SELECT  phone, facebook, linkedin, instagram, twitter FROM editprofile WHERE name = '$username'";
            $result2 = mysqli_query($conn, $sql2);

            // Check if there are any results
            if (mysqli_num_rows($result) > 0) {
                // Loop through the results and display the images
                while ($row = mysqli_fetch_assoc($result)) {
                    $imageSrc = $row['uploadedimage'];
                    ?>

                    <div class="relative index ">
                        <img src="<?php echo ("./uploads/" . $imageSrc); ?>" alt="" data_catagory="<?php echo $category ?>">
                        <div class="disc absolute  left-10 bottom-5 w-64 ">

                            <?php
                            if (mysqli_num_rows($result2) > 0) {

                                
                                $row2 = mysqli_fetch_assoc($result2);
                                $facebookLink = $row2['facebook'];
                                $bio = $row2['phone'];
                                $linkedinLink = $row2['linkedin'];
                                $instagramLink = $row2['instagram'];
                                $twitterLink = $row2['twitter'];

                                // Use the retrieved values in your HTML code
                                ?>
                                <div class="bg-white rounded-sm gap-4 p-2">
                                    <div class="flex gap-4">
                                        <img src="<?php echo $profileImage; ?>" alt="" class="rounded-full w-8 border-black">
                                        <div class="text-sm">
                                            <p>
                                                <?php echo $bio; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <ul class="flex gap-2 justify-center">
                                        <li><a href="<?php echo $facebookLink; ?>"><img src="./images/facebook.png" alt=""
                                                    class="rounded-full w-5"></a></li>
                                        <li><a href="<?php echo $linkedinLink; ?>"><img src="./images/linked.png" alt=""
                                                    class="rounded-full w-5"></a></li>
                                        <li><a href="<?php echo $instagramLink; ?>"><img src="./images/insta.jpg" alt=""
                                                    class="rounded-full w-5"></a></li>
                                        <li><a href="<?php echo $twitterLink; ?>"><img src="./images/twitter.png" alt=""
                                                    class="rounded-full w-5"></a></li>
                                    </ul>
                                </div>
                                <?php
                                
                            } else {
                                echo "No data found.";
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }

            mysqli_close($conn);
            ?>

        </div>


    </div>





    

    
    <script src="app.js"></script>
  <script src="classify.js"></script>

  <script>
    // Function to handle the click on category links
    function handleCategoryClick(event) {
          event.preventDefault();
          const selectedCategory = event.target.dataset.category;
          classifyImages(selectedCategory);
        }
      
        // Add event listeners to category links
        const categoryLinks = document.querySelectorAll('.gallery-nav a');
        categoryLinks.forEach(link => {
          link.addEventListener('click', handleCategoryClick);
        });
      
        // Initial classification with 'all' category
        classifyImages('all');
  </script>
</body>

</html>