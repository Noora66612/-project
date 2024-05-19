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

var btns = document.querySelectorAll(".btn1");
btns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        var computedStyle = window.getComputedStyle(btn);
        var color = computedStyle.getPropertyValue("color");

        if (color === "rgb(214, 76, 76)") {  // Red
            btn.closest(".row").remove();  // Remove the entire row
        } else {
            btn.style.color = "#D64C4C";  // Red
        }
    });
});

function addToFavorites(storeId) {
    // Implement adding store to favorites (using localStorage or server-side storage)
    // Update UI to reflect the change
}

function sortFavorites() {
    var select = document.getElementById("sort-select");
    var sortingOrder = select.value;
    var container = document.querySelector(".n-content");
    var items = Array.from(container.getElementsByClassName("row"));

    items.sort(function(a, b) {
        var dateA = new Date(a.getAttribute("data-timestamp"));
        var dateB = new Date(b.getAttribute("data-timestamp"));

        if (sortingOrder === "oldesttonewest") {
            return dateA - dateB;
        } else if (sortingOrder === "newesttooldest") {
            return dateB - dateA;
        }
    });

    // Clear the container and append the sorted items
    container.innerHTML = "";
    items.forEach(function(item) {
        container.appendChild(item);
    });
}
