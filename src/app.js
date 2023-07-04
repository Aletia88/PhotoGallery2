const images = document.querySelectorAll('img');

images.forEach(image => {
  image.addEventListener('mouseover', () => {
    image.style.border = '2px solid #333';
  });
  
  image.addEventListener('mouseout', () => {
    image.style.border = '1px solid #ccc';
  });
});

const navLinks = document.querySelectorAll('.gallery-nav a');

navLinks.forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    const filter = this.textContent.toLowerCase();
    const galleryItems = document.querySelectorAll('.gallery-item');
  
    galleryItems.forEach(item => {
      if (filter === 'all') {
        item.style.display = 'block';
      } else if (item.dataset.category === filter) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });
  
    navLinks.forEach(navLink => {
      navLink.classList.remove('active');
    });
  
    this.classList.add('active');
  });
});

const form = document.querySelector('form');

form.addEventListener('submit', (event) => {
  event.preventDefault();
  const email = document.querySelector('#email').value;
  const password = document.querySelector('#password').value;
  
  // TODO: Implement login logic here
  
  console.log(`Logged in as ${email}`);
});

// Get all accordion titles
const accordionTitles = document.querySelectorAll('.accordion-title');

// Loop through accordion titles and add click event listener to each
accordionTitles.forEach((title) => {
  
  // Add click event listener to title
  title.addEventListener('click', () => {
    
    // Toggle the icon
    title.children[1].classList.toggle('rotate');
    
    // Toggle the content
    const content = title.nextElementSibling;
    content.classList.toggle('hidden');
    
  });
  
});

// FAQ

//faq toggle stuff 
$('.togglefaq').click(function(e) {
  e.preventDefault();
  var notthis = $('.active').not(this);
  notthis.find('.icon-minus').addClass('icon-plus').removeClass('icon-minus');
  notthis.toggleClass('active').next('.faqanswer').slideToggle(300);
   $(this).toggleClass('active').next().slideToggle("fast");
  $(this).children('i').toggleClass('icon-plus icon-minus');
  });


  // search bar

  const searchBar = document.getElementById('search-bar');

searchBar.addEventListener('keyup', (event) => {
  const searchTerm = event.target.value.toLowerCase();
  const imageGallery = document.querySelectorAll('.image-gallery img');
  
  imageGallery.forEach((image) => {
    if (image.alt.toLowerCase().includes(searchTerm)) {
      image.style.display = 'inline-block';
    } else {
      image.style.display = 'none';
    }
  });
});

var WIDTH = window.innerWidth;
var HEIGHT = window.innerHeight;
var WAVEHEIGHT = 60;
var FREQUENCY = 200;
var SPEED = 4;

let xs = [];
let tick = 0;

function createWave() {
  for (var i = 0; i <= WIDTH; i++) {
    xs.push(i);
  }
}
createWave();

function animate() {
  let points = xs.map(x => {
    let y = HEIGHT / 2 + WAVEHEIGHT * Math.sin((x + tick) / FREQUENCY);
    return [x, y];
  });

  let path =
    "M" +
    points
      .map(p => {
        return p[0] + "," + p[1];
      })
      .join(" L") +
    "L " +
    WIDTH +
    "," +
    HEIGHT +
    " L " +
    0 +
    "," +
    HEIGHT +
    " Z";

  document.querySelector("path").setAttribute("d", path);
  tick += SPEED;
  requestAnimationFrame(animate);
}

animate();

window.addEventListener("resize", function() {
  WIDTH = window.innerWidth;
  HEIGHT = window.innerHeight;
  xs = [];
  createWave();
});
