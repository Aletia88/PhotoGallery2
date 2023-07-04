<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contactus.css">
    <title>Document</title>
</head>
<body>
    <div class="flex justify-between m-5 items-center gap-48">

   
        <a href="./index.php" class="">Photo Gallery</a>
        
        
        <nav >
      <ul class="flex gap-5 justify-center items-center">
        <li><a href="#" class="active">Home</a></li>
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
    

    <main>
        <h1>Contact Us</h1>
        <p>Have a question or comment? Fill out the form below to get in touch with us.</p>
        <form action="#" method="POST" class="form">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
    
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
    
          <label for="message">Message:</label>
          <textarea id="message" name="message" required></textarea>
    
          <button type="submit">Send</button>
        </form>


 </main>
        <div class="testimonials flex gap-16 w-[90vw] mx-10">
          <div class="testimonial w-1/3">
            <div class="flex items-center gap-5">

              <img src="images/photo.jpg" alt="Testimonial 1">
              <div>

                <p class="testimonial-author">- John Doe</p>
                <p>Software Engineer</p>
              </div>
            </div>
            <p class="testimonial-text">"I absolutely love this web gallery! The images are stunning and the user interface is so easy to navigate. Highly recommended!"</p>
          </div>
        
          <div class="testimonial w-1/3">
            <div class="flex items-center gap-5">
            <img src="images/photo1.webp" alt="Testimonial 2">
            <p class="testimonial-author">- Jane Smith</p>
              </div>
            <p class="testimonial-text">"As an aspiring photographer, this web gallery has been a great source of inspiration. The collection of images is diverse and awe-inspiring. Thank you!"</p>
          </div>
        
          <div class="testimonial w-1/3">
            <div class="flex items-center gap-5">
            <img src="images/photo-1629295895548-b2f7a39eb6dd.avif" alt="Testimonial 3">
            <p class="testimonial-author">- David Williams</p>
            </div>
            <p class="testimonial-text">"I've been using this web gallery to showcase my own photography portfolio, and it has been an amazing platform. The design is clean and elegant, allowing my images to shine."</p>
          </div>
        </div>

     
    
      <footer>
        <p>&copy; 2023 Web Gallery. All rights reserved.</p>
      </footer>
    
</body>
</html>