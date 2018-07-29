// myblog.js
var sw;
var btn = document.getElementById('findBtn');
var findbox = document.getElementById('findBlog');
function findSwitch() {
        if (sw == 'off') {
            // btn.textContent = '閉じる';
            btn.firstElementChild.setAttribute('src', 'img/findOff.png');
            findbox.style.display = "block";
            sw = 'on';
        } else if (sw == 'on') {
            // btn.textContent = '検索';
            btn.firstElementChild.setAttribute('src', 'img/find.png');
            findbox.style.display = "none";
            sw = 'off';
        }
        
}
window.onload = function() {
    sw = 'off';
    findbox.style.display = "none";
}
