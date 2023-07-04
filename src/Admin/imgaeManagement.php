<!DOCTYPE html>
<html>
<head>
  <title>Image Management</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19" rel="stylesheet">
  <style>
    /* Custom styles for the image management page */
    .container {
      max-width: 800px;
      margin: 0 auto;
    }
    
    .image-list {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 20px;
    }
    
    .image-item {
      position: relative;
      overflow: hidden;
      border-radius: 8px;
    }
    
    .image-item img {
      width: 100%;
      height: auto;
      object-fit: cover;
    }
    
    .image-item .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    
    .image-item:hover .overlay {
      opacity: 1;
    }
    
    .image-item .overlay-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }
    
    .image-item .overlay-content a {
      display: inline-block;
      background-color: #4f46e5;
      color: #ffffff;
      padding: 10px 20px;
      border-radius: 4px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }
    
    .image-item .overlay-content a:hover {
      background-color: #3e35b1;
    }
  </style>
</head>
<body>
  <div class="container mx-auto p-8">
    <h1 class="text-4xl font-bold mb-8">Image Management</h1>
    
    <div class="image-list">
      <div class="image-item">
        <img src="image1.jpg" alt="Image 1">
        <div class="overlay">
          <div class="overlay-content">
            <a href="#">Delete</a>
          </div>
        </div>
      </div>
      
      <div class="image-item">
        <img src="image2.jpg" alt="Image 2">
        <div class="overlay">
          <div class="overlay-content">
            <a href="#">Delete</a>
          </div>
        </div>
      </div>
      
      <!-- Add more image items here -->
      
    </div>
  </div>
</body>
</html>