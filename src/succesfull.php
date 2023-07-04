<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">

    <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="d.css">
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

        <div class="container text-start  mx-auto mt-10 p-6 bg-white rounded-lg shadow-xl max-w-xl ">
            <h1 class="text-center text-3xl mb-6 font-bold text-orange-500">Registration Successful</h1>
        <p class=" text-center text-2xl ">Your registration was successful. You can now log in using your credentials.</p>
        <p class=" text-center text-2xl my-10  ">
            <input class="bg-yellow-600 hover:bg-yellow-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-1/3 mb-4 text-center" type="submit" name="submit" value="login">  </p>
        </div>
    </form>
</body>
</html>

<?php 
    if(isset($_POST['submit'])){
        header("Location: login.php");

    }
    ?>