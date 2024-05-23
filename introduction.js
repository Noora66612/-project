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
const cancelButton = document.getElementById('cancel');
const submitButton = document.getElementById('submit');
const commentsContainer = document.getElementById('comments-container');

cancelButton.addEventListener('click', function() {
    textarea.value = '';
    adjustHeight(); // 重置高度
});

submitButton.addEventListener('click', function() {
    const reviewText = textarea.value.trim();
    if (reviewText) {
        addComment(reviewText); // 添加評論
        saveComment(reviewText); // 保存評論到 localStorage
        textarea.value = '';
        adjustHeight(); 
    } else {
        alert('請輸入評論');
    }
});

function adjustHeight() {
    textarea.style.height = 'auto';
    textarea.style.height = (textarea.scrollHeight) + 'px';
}

function addComment(text) {
    const currentDate = new Date();
    const commentDate = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}`;
    const commentDiv = document.createElement('div');
    commentDiv.className = 'comment';

    const textDiv = document.createElement('div');
    textDiv.className = 'text';
    textDiv.textContent = text;

    const dateDiv = document.createElement('div');
    dateDiv.className = 'date';
    dateDiv.textContent = commentDate;

    commentDiv.appendChild(textDiv);
    commentDiv.appendChild(dateDiv);
    commentsContainer.appendChild(commentDiv);
}

function saveComment(text) {
    const comments = JSON.parse(localStorage.getItem('comments')) || [];
    const currentDate = new Date();
    const commentDate = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}`;
    comments.push({ text, date: commentDate });
    localStorage.setItem('comments', JSON.stringify(comments));
}

function loadComments() {
    const comments = JSON.parse(localStorage.getItem('comments')) || [];
    comments.forEach(comment => addComment(comment.text, comment.date));
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

// Load comments when the page loads
document.addEventListener('DOMContentLoaded', loadComments);

document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('review');

    // 當textarea獲得焦點時，清空placeholder
    textarea.addEventListener('focus', function() {
        textarea.setAttribute('placeholder', '');
    });

    // 當textarea失去焦點且為空時，恢復placeholder
    textarea.addEventListener('blur', function() {
        if (textarea.value.trim() === '') {
            textarea.setAttribute('placeholder', '留下我的評論...');
        }
    });

    // 如果textarea中有內容，隱藏placeholder
    if (textarea.value.trim() !== '') {
        textarea.setAttribute('placeholder', '');
    }
});
