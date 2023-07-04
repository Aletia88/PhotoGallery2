<!DOCTYPE html>
<html>
<head>
    <title>Photo Upload Request</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <style>
        body {
            background-color: white;
            padding: 20px;
        }

        form {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 5px;
            margin: 0 auto;
            width: 80%;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 50%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #DAA624;
        }

        input[type="submit"] {
            background-color: #DAA624;
            color: #FFFFFF;
            border: none;
            padding: 10px;
            margin-top:20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Photo Upload Request</h2>
    <form action="request_process.php" method="POST" enctype="multipart/form-data">
        <label for="name">User Name:</label>
        <input type="text" name="name" required><br>

        <label for="photo">Upload Photo:</label>
        <input type="file" name="photo" accept="image/*" required>

        <input type="submit" value="Submit Request">
    </form>
 
</body>
</html>
