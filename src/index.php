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

   
    <a href="./inde.php" class="">Photo Gallery</a>
    <div class="search-container">
      <input type="text"  id="search-bar" placeholder="Search..." class="border border-gray-200 rounded-md">
    </div>
    
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
  
  <div class="h-screen bg-white  z-23 relative top-48 flex justify-center ml-20">
    

      <h1 class="text-5xl border-r-2 h-1/2 border-5 border-black pt-5 font-bold w-1/3 p-10">Ethopian Photo Gallery <span class=" shadow-md  ">your number one source for all things art</span> </h1>
      
   <p></p>
   <div class="w-3/4 flex justify-center ">

   
   <div class="join  w-1/2 h-1/2   items-center flex-col p-5  text-black justify-between  flex shadow rounded-lg ">
    <p class=" text-center text-2xl ">your number one source for all things art</p>
    <div class="flex flex-col ">

      <button class="text-white rounded-lg py-3 px-16 mb-2"> <a href="login.php">Sign In</a> </button> 
      <button  class="text-white rounded-lg py-3 px-16 "> <a href="register.php">Join Us</a> </button>
    </div>
   </div>
  </div>
</div>



<!-- <img src="images/flag.jpg" alt="Mountain Top " class="w-full "> -->

 


<div class="body    m-20 gap-10">
      <div class="relative h-96 index item1">

        <!-- <img  src="./images/coffe.jpg"  alt=""> -->
        <div class="disc absolute  left-10 bottom-5 w-64 ">
          <div class="bg-white rounded-sm  gap-4 p-2">
            <div class="flex gap-4">
              <img src="./images/profile.png" alt="" class="rounded-full w-8 border-black ">
              <div class="text-sm ">

                <p>photographer</p>
                <!-- <p>date</p> -->
              </div>
            </div>
            <ul class="flex gap-2 justify-center">
              <li><a href=""><img src="./images/facebook.png" alt="" class=" rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/linked.png" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/insta.jpg" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/twitter.png" alt="" class="rounded-full w-5"></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="relative index item2">

        <img src="./images/coffe.jpg"  alt="">
        <div class="disc absolute  left-10 bottom-5 w-64 ">
          <div class="bg-white rounded-sm  gap-4 p-2">
            <div class="flex gap-4">
              <img src="./images/profile.png" alt="" class="rounded-full w-8 border-black ">
              <div class="text-sm ">

                <p>photographer</p>
                <!-- <p>date</p> -->
              </div>
            </div>
            <ul class="flex gap-2 justify-center">
              <li><a href=""><img src="./images/facebook.png" alt="" class=" rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/linked.png" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/insta.jpg" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/twitter.png" alt="" class="rounded-full w-5"></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="relative index ">
        <img src="./images/photo-1629295895548-b2f7a39eb6dd.avif" alt="">
        <div class="disc absolute  le ft-10 bottom-5 w-64 ">
          <div class="bg-white rounded-sm  gap-4 p-2">
            <div class="flex gap-4">
              <img src="./images/profile.png" alt="" class="rounded-full w-8 border-black ">
              <div class="text-sm ">

                <p>photographer</p>
                <!-- <p>date</p> -->
              </div>
            </div>
            <ul class="flex gap-2 justify-center">
              <li><a href=""><img src="./images/facebook.png" alt="" class=" rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/linked.png" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/insta.jpg" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/twitter.png" alt="" class="rounded-full w-5"></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="relative index ">

        <img src="./images/photo.jpg"  alt="">
        <div class="disc absolute  left-10 bottom-5 w-64 ">
          <div class="bg-white rounded-sm  gap-4 p-2">
            <div class="flex gap-4">
              <img src="./images/profile.png" alt="" class="rounded-full w-8 border-black ">
              <div class="text-sm ">

                <p>photographer</p>
                <!-- <p>date</p> -->
              </div>
            </div>
            <ul class="flex gap-2 justify-center">
              <li><a href=""><img src="./images/facebook.png" alt="" class=" rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/linked.png" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/insta.jpg" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/twitter.png" alt="" class="rounded-full w-5"></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="relative index ">

        <img src="./images/coffe.jpg"  alt="">
        <div class="disc absolute  left-10 bottom-5 w-64 ">
          <div class="bg-white rounded-sm  gap-4 p-2">
            <div class="flex gap-4">
              <img src="./images/profile.png" alt="" class="rounded-full w-8 border-black ">
              <div class="text-sm ">

                <p>photographer</p>
                <!-- <p>date</p> -->
              </div>
            </div>
            <ul class="flex gap-2 justify-center">
              <li><a href=""><img src="./images/facebook.png" alt="" class=" rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/linked.png" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/insta.jpg" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/twitter.png" alt="" class="rounded-full w-5"></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="relative index ">
        <img src="./images/po.jpg" alt="">
        <div class="disc absolute  le ft-10 bottom-5 w-64 ">
          <div class="bg-white rounded-sm  gap-4 p-2">
            <div class="flex gap-4">
              <img src="./images/profile.png" alt="" class="rounded-full w-8 border-black ">
              <div class="text-sm ">

                <p>photographer</p>
                <!-- <p>date</p> -->
              </div>
            </div>
            <ul class="flex gap-2 justify-center">
              <li><a href=""><img src="./images/facebook.png" alt="" class=" rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/linked.png" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/insta.jpg" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/twitter.png" alt="" class="rounded-full w-5"></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="relative index ">

        <img src="./images/flag.jpg"  alt="">
        <div class="disc absolute  left-10 bottom-5 w-64 ">
          <div class="bg-white rounded-sm  gap-4 p-2">
            <div class="flex gap-4">
              <img src="./images/profile.png" alt="" class="rounded-full w-8 border-black ">
              <div class="text-sm ">

                <p>photographer</p>
                <!-- <p>date</p> -->
              </div>
            </div>
            <ul class="flex gap-2 justify-center">
              <li><a href=""><img src="./images/facebook.png" alt="" class=" rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/linked.png" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/insta.jpg" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/twitter.png" alt="" class="rounded-full w-5"></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="relative index ">

        <img src="./images/coffe4.jpg " alt="">
        <div class="disc absolute  left-10 bottom-5 w-64 ">
          <div class="bg-white rounded-sm  gap-4 p-2">
            <div class="flex gap-4">
              <img src="./images/profile.png" alt="" class="rounded-full w-8 border-black ">
              <div class="text-sm ">

                <p>photographer</p>
                <!-- <p>date</p> -->
              </div>
            </div>
            <ul class="flex gap-2 justify-center">
              <li><a href=""><img src="./images/facebook.png" alt="" class=" rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/linked.png" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/insta.jpg" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/twitter.png" alt="" class="rounded-full w-5"></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="relative index ">

        <img src="./images/coffe3.jpg " alt="">
        <div class="disc absolute  left-10 bottom-5 w-64 ">
          <div class="bg-white rounded-sm  gap-4 p-2">
            <div class="flex gap-4">
              <img src="./images/profile.png" alt="" class="rounded-full w-8 border-black ">
              <div class="text-sm ">

                <p>photographer</p>
                <!-- <p>date</p> -->
              </div>
            </div>
            <ul class="flex gap-2 justify-center">
              <li><a href=""><img src="./images/facebook.png" alt="" class=" rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/linked.png" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/insta.jpg" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/twitter.png" alt="" class="rounded-full w-5"></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="relative index ">
        <img src="./images/coffe2.jpg" alt="">
        <div class="disc absolute  le ft-10 bottom-5 w-64 ">
          <div class="bg-white rounded-sm  gap-4 p-2">
            <div class="flex gap-4">
              <img src="./images/profile.png" alt="" class="rounded-full w-8 border-black ">
              <div class="text-sm ">

                <p>photographer</p>
                <!-- <p>date</p> -->
              </div>
            </div>
            <ul class="flex gap-2 justify-center">
              <li><a href=""><img src="./images/facebook.png" alt="" class=" rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/linked.png" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/insta.jpg" alt="" class="rounded-full w-5"></a></li>
              <li><a href=""><img src="./images/twitter.png" alt="" class="rounded-full w-5"></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div>

     
        
      </div>
      <div>

        
      </div>
      <div>

        
      </div>
      <div>

       
      </div>
      <div>

        
      </div>
      <div>

      
      </div>
      <div>

     
      </div>
    </div>



   

    <!-- <?php
      // Scan the directory for image files
      $dir = "images/";
      $images = glob($dir . "*.jpg");
      
      // Display each image in the gallery
      foreach ($images as $image) {
        echo "<a href='$image'><img src='$image' alt=''></a>";
      }
    ?> -->

  <script src="app.js"></script>
</body>
</html>