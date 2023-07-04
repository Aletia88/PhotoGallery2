function classifyImages(category) {
  // Get all images in the gallery
  const images = document.querySelectorAll('.image-gallery img');

  images.forEach(image => {
    // If the selected category is 'all' or the image has the matching category, show it
    if (category === 'all' || image.dataset.category === category) {
      image.style.display = 'block';
    } else {
      // Otherwise, hide the image
      image.style.display = 'none';
    }
  });
}
