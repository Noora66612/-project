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

document.addEventListener("DOMContentLoaded", function() {
    // 取得當前用戶的 account
    fetch('getAccount.php')
        .then(response => response.json())
        .then(data => {
            const account = data.account;
            initializeFavoriteButtons(account);
            loadFavorites(account);
            document.getElementById("sort-select").addEventListener("change", function() {
                loadFavorites(account);
            });
        });
});

function initializeFavoriteButtons(account) {
    document.querySelectorAll(".btn1").forEach(button => {
        button.addEventListener("click", function() {
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const img = button.getAttribute('data-img');
            const hours = button.getAttribute('data-hours');
            toggleFavorite(id, name, img, hours, account);
        });
    });
}

function loadFavorites(account) {
    fetchFavorites(account).then(favorites => renderFavorites(favorites));
}

function fetchFavorites(account) {
    return fetch(`favorites.php?account=${account}`)
        .then(response => response.json())
        .catch(error => {
            console.error('Error:', error);
            return [];
        });
}

function toggleFavorite(id, name, img, hours, account) {
    const action = isFavorite(id) ? 'remove' : 'add';
    
    fetch('favorites.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            action: action,
            account: account,
            restaurant_id: id,
            name: name,
            img: img,
            hours: hours,
        })
    })
    .then(response => loadFavorites(account))
    .catch(error => console.error('Error:', error));
}

function isFavorite(id) {
    const favorites = getFavorites();
    return favorites.some(fav => fav.restaurant_id === id);
}

function getFavorites(account) {
    // 發送請求獲取收藏列表
    fetch(`favorites.php?account=${account}`)
        .then(response => response.json())
        .then(data => {
            // 返回收藏列表數據
            return data;
        })
        .catch(error => {
            console.error('Error:', error);
            // 若請求失敗，返回空
            return [];
        });
}
function renderFavorites(favorites) {
    const container = document.querySelector('.n-content');
    container.innerHTML = '';

    const sortOrder = document.getElementById('sort-select').value;
    favorites.sort((a, b) => sortOrder === 'newesttooldest' ? new Date(b.timestamp) - new Date(a.timestamp) : new Date(a.timestamp) - new Date(b.timestamp));

    favorites.forEach(item => {
        const row = document.createElement('div');
        row.className = 'row';
        row.setAttribute('data-timestamp', item.timestamp);
        row.innerHTML = `
            <div class="row-img">
                <img src="${item.img}" alt="${item.name}">
            </div>
            <div class="row-content">
                <a href="#">${item.name}</a>
                <div class="opening-hour"> 
                    <i class="ri-time-line"></i>
                    營業時間：${item.hours}
                </div>
            </div>
            <div class="row-in">
                <div class="row-left">
                    <div class="phonenum">
                        <i class="ri-phone-line"></i>
                        電話：
                    </div>
                </div>
                <div class="row-right">
                    <Button onclick="toggleFavorite(${item.restaurant_id}, '${item.name}', '${item.img}', '${item.hours}', '${item.account}')" class="btn1"><i class="ri-heart-fill"></i></Button>
                </div>
            </div>
        `;
        container.appendChild(row);
    });
}

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
