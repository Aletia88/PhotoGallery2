<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Upload</title>
    <!-- Include Tailwind CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css">
</head>
<body class="bg-gray-200">
    <div class="max-w-xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Display image form -->
        <form method="post" action="upload.php" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-medium mb-4">Upload Image</h2>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="image">
                    Select Image
                </label>
                <input type="file" name="image" id="image">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Upload Image
                </button>
            </div>
        </form>

        <!-- Display uploaded images -->
        <div class="mt-8">
            <h2 class="text-lg font-medium mb-4">Uploaded Images</h2>
            <div class="grid grid-cols-3 gap-4">
                <!-- <?php
                // Display uploaded images
                $files = glob("uploads/*.*");
                foreach ($files as $file) {
                    echo '<div class="bg-white p-4 rounded-lg shadow-lg"><img src="' . $file . '" class="h-56 w-full object-cover"></div>';
                }
                ?> -->
            </div>
        </div>
    </div>
</body>
</html>