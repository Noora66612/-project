document.getElementById("menu-icon").addEventListener("click", function() {
    document.getElementById("mySidebar").classList.toggle("active");
});

document.getElementById("close-btn").addEventListener("click", function() {
    document.getElementById("mySidebar").classList.toggle("active");
});

document.addEventListener("click", function(event) {
    var sidebar = document.getElementById("mySidebar");
    var menuIcon = document.getElementById("menu-icon");

    if (!sidebar.contains(event.target) && !menuIcon.contains(event.target)) {
        sidebar.classList.remove("active");
    }
});

document.addEventListener("scroll", function(event) {
    var sidebar = document.getElementById("mySidebar");
    var menuIcon = document.getElementById("menu-icon");

    if (!sidebar.contains(event.target) && !menuIcon.contains(event.target)) {
        sidebar.classList.remove("active");
    }
});

var btns = document.querySelectorAll(".btn1");
btns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        var computedStyle = window.getComputedStyle(btn);
        var color = computedStyle.getPropertyValue("color");
        
        if (color === "rgb(214, 76, 76)") {
            btn.style.color = "#524d4d";
        } else {
            btn.style.color = "#D64C4C";
        }
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


container.innerHTML = "";
items.forEach(function(item) {
    container.appendChild(item);
});


