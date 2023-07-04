window.onload = function() {
    var photoInput = document.getElementById('photo-input');
    photoInput.addEventListener('change', handleFileSelect, false);
  
    function handleFileSelect(event) {
      var file = event.target.files[0];
      var formData = new FormData();
      formData.append('photo', file);
  
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'upload.php', true);
  
      xhr.onload = function() {
        if (xhr.status === 200) {
          console.log('Photo uploaded successfully!');
          // Handle success response if needed
        } else {
          console.log('Error uploading photo. Status code: ' + xhr.status);
          // Handle error response if needed
        }
      };
  
      xhr.send(formData);
    }
  };
  