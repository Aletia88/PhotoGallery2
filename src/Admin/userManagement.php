<!DOCTYPE html>
<html>
<head>
  <title>User Management</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19" rel="stylesheet">
  <style>
    /* Custom styles for the user management page */
    .container {
      max-width: 800px;
      margin: 0 auto;
    }
    
    .user-list {
      margin-top: 20px;
    }
    
    .user-item {
      display: flex;
      align-items: center;
      border-bottom: 1px solid #e2e8f0;
      padding: 10px 0;
    }
    
    .user-item:last-child {
      border-bottom: none;
    }
    
    .user-item .user-avatar {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 50%;
      margin-right: 10px;
    }
    
    .user-item .user-details {
      flex: 1;
    }
    
    .user-item .user-details h3 {
      margin: 0;
      font-size: 18px;
      font-weight: bold;
      color: #4c4c4c;
    }
    
    .user-item .user-details p {
      margin: 0;
      font-size: 14px;
      color: #777777;
    }
    
    .user-item .user-actions a {
      display: inline-block;
      background-color: #DAA624;
      color: #ffffff;
      padding: 6px 12px;
      border-radius: 4px;
      text-decoration: none;
      transition: background-color 0.3s ease;
      margin-right: 5px;
    }
    
    .user-item .user-actions a:hover {
      background-color: #DAA624;
    }
  </style>
</head>
<body>
  <div class="container mx-auto p-8">
    <h1 class="text-4xl font-bold mb-8">User Management</h1>
    
    <div class="user-list">
      <div class="user-item">
        <img class="user-avatar" src="../images/photo1.webp" alt="User 1">
        <div class="user-details">
          <h3>John Doe</h3>
          <p>john.doe@example.com</p>
        </div>
        <div class="user-actions">
          <a href="#">Edit</a>
          <a href="#">Delete</a>
        </div>
      </div>
      
      <div class="user-item">
        <img class="user-avatar" src="../images/photo.jpg" alt="User 2">
        <div class="user-details">
          <h3>Jane Smith</h3>
          <p>jane.smith@example.com</p>
        </div>
        <div class="user-actions">
          <a href="#">Edit</a>
          <a href="#">Delete</a>
        </div>
      </div>
      
      <!-- Add more user items here -->
      
    </div>
  </div>
</body>
</html>