<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="about.css">
    <title>Document</title>
</head>
<body>
    <div class="flex justify-between m-5 items-center gap-48">

   
        <a href="./index.php" class="">Photo Gallery</a>
      
        <nav >
      <ul class="flex gap-5 justify-center items-center">
        <li><a href="/" class="active">Home</a></li>
        <li><a href="./About.php">About</a></li>
        <li><a href="./contactUs.php">Contact Us</a></li>
        <li><a href="./Help.php">Help</a></li>

        <?php
                session_start();
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                    echo '<li><a href="./logout.php">Logout</a></li>';
                    echo '<li><a href="./profile.php"><img src="./images/profile.webp" width="35" alt=""></a></li>';
                }else{
                    echo '<li><a href="./login.php">Login</a></li>';
                    echo '<li><a href="./register.php">Register</a></li>';
                    session_destroy();
                }
                ?>
        
        <!-- <li><a href="./login.php">Login/Signin</a></li> -->
        <!-- <li> <a href="./Admin/index.php"><img src="./images/profile.webp" width="35" alt=""></a> </li> -->

        <!-- <li> <a href="profile.php"><img src="./images/profile.webp" width="35" alt=""></a> </li> -->

      </ul>
    </nav>
      </div>
    
      <main class="flex w-screen">
        <div class="container w-3/4">
            <h1>About Us</h1>
            <p>Welcome to Web Gallery, your number one source for all things art. We're dedicated to showcasing the best artwork from around the world, ranging from traditional paintings to modern digital art.</p>
            <p>Our team is passionate about art and we strive to provide our visitors with a unique and visually stunning online experience. We believe that everyone should have access to great art, regardless of their location or budget.</p>
            <p>At Web Gallery, we work with artists from all over the world to bring you a diverse range of styles and techniques. Our curators carefully select each piece of art to ensure that it meets our high standards for quality and creativity.</p>
            <p>In addition to our online gallery, we also offer a range of services for artists and art enthusiasts alike. Whether you're looking to buy or sell art, or simply learn more about the art world, we have something for you.</p>
            <p>We're committed to providing exceptional customer service and fostering a community of art lovers. Thank you for choosing Web Gallery as your go-to destination for all things art. If you have any questions or feedback, please don't hesitate to contact us.</p>
        </div>

        <div class="grid grid-rows-4 grid-flow-col gap-x-4 mt-10 rounded w-1/3 ">
            <img src="./images/coffe.jpg" alt="" class="row-start-1  h-64 rounded-lg mt-5 ">
            <img src="./images/photo-1629295895548-b2f7a39eb6dd.avif" alt="" class="h-64 rounded-lg mt-5">
           

                <img src="./images/coffe2.jpg" alt="" class="row-start-1  h-64 rounded-lg ">
            
            <img src="./images/photo1.webp" alt="" class="h-64 rounded-lg">
        </div>
    </main>

</body>
</html>