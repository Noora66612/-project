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
        
        if (color === "rgb(214, 76, 76)") {
            btn.style.color = "#524d4d";
        } else {
            btn.style.color = "#D64C4C";
        }
    });
});


const textarea = document.getElementById('review');
const placeholder = document.getElementById('placeholder');
const cancelButton = document.getElementById('cancel');
const submitButton = document.getElementById('submit');
const commentsContainer = document.getElementById('comments-container');


cancelButton.addEventListener('click', function() {
    textarea.value = '';
    placeholder.style.display = 'block';
    adjustHeight(); // 重置高度
});

submitButton.addEventListener('click', function() {
    const reviewText = textarea.value.trim();
    if (reviewText) {
        alert('送出評論: ' + reviewText); // 替換為實際的提交操作
        textarea.value = '';
        placeholder.style.display = 'block';
        adjustHeight(); 
    } else {
        alert('請輸入評論');
    }
});

function adjustHeight() {
    textarea.style.height = 'auto';
    textarea.style.height = (textarea.scrollHeight) + 'px';
}

function addComment(text, year) {
    const commentDiv = document.createElement('div');
    commentDiv.className = 'comment';

    const textDiv = document.createElement('div');
    textDiv.className = 'text';
    textDiv.textContent = text;

    const yearDiv = document.createElement('div');
    yearDiv.className = 'year';
    yearDiv.textContent = year;

    commentDiv.appendChild(textDiv);
    commentDiv.appendChild(yearDiv);
    commentsContainer.appendChild(commentDiv);
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





// script.js

document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('review');

    // 当textarea获得焦点时，清空placeholder
    textarea.addEventListener('focus', function() {
        textarea.setAttribute('placeholder', '');
    });

    // 当textarea失去焦点且为空时，恢复placeholder
    textarea.addEventListener('blur', function() {
        if (textarea.value.trim() === '') {
            textarea.setAttribute('placeholder', '留下我的評論...');
        }
    });

    // 如果textarea中有内容，隐藏placeholder
    if (textarea.value.trim() !== '') {
        textarea.setAttribute('placeholder', '');
    }
});


container.innerHTML = "";
items.forEach(function(item) {
    container.appendChild(item);
});
