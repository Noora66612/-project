document.getElementById("menu-icon").addEventListener("click", function() {
    document.getElementById("mySidebar").classList.toggle("active");
});

document.getElementById("close-btn").addEventListener("click", function() {
    document.getElementById("mySidebar").classList.toggle("active");
});

document.addEventListener("click", function(event) {
    var sidebar = document.getElementById("mySidebar");
    var menuIcon = document.getElementById("menu-icon");

    // Check if the click is outside the sidebar and the menu icon
    if (!sidebar.contains(event.target) && !menuIcon.contains(event.target)) {
        sidebar.classList.remove("active");
    }
});

document.addEventListener("scroll", function(event) {
    var sidebar = document.getElementById("mySidebar");
    var menuIcon = document.getElementById("menu-icon");

    // Check if the click is outside the sidebar and the menu icon
    if (!sidebar.contains(event.target) && !menuIcon.contains(event.target)) {
        sidebar.classList.remove("active");
    }
});

// Function to add restaurant to favorites
function addToFavorites(restaurantId) {
    // 使用Ajax将restaurantId发送到PHP脚本
    $.ajax({
        type: 'POST',
        url: 'add_to_favorites.php',
        data: { restaurant_id: restaurantId },
    });
}

// Add event listener to favorite buttons
document.querySelectorAll('.btn1').forEach(function(button) {
    button.addEventListener('click', function() {
        var restaurantId = this.getAttribute('data-id');
        addToFavorites(restaurantId);
    });
});

const searchInput = document.querySelector('.search-input');
const searchForm = document.querySelector('.search-form'); // Assuming the search form element

// Toggle search box visibility on search button click
document.querySelector('.search-btn').addEventListener('mousedown', function(event) {
  event.preventDefault(); // Prevent default behavior
  searchInput.classList.toggle('active');
});

// Close search box on click outside the search form
document.addEventListener('click', function(event) {
  if (!searchForm.contains(event.target) && searchInput.classList.contains('active')) {
    searchInput.classList.remove('active');
  }
});
