var videos = ['myVideo1', 'myVideo2', 'myVideo3', 'myVideo4'];
var index = 0;

function playNext() {
    var currentVideo = document.getElementById(videos[index]);
    currentVideo.style.display = "none";
    index = (index + 1) % videos.length;
    var nextVideo = document.getElementById(videos[index]);
    nextVideo.style.display = "block";
    nextVideo.play();
}

var firstVideo = document.getElementById("myVideo1");
firstVideo.style.display = "block";
firstVideo.play();



document.addEventListener('mousemove', function (e) {
    const cursor = document.querySelector('.cursor');
    const sparkle = document.createElement('div');
    sparkle.classList.add('sparkle');
    cursor.appendChild(sparkle);
    sparkle.style.left = e.pageX + 'px';
    sparkle.style.top = e.pageY + 'px';

    setTimeout(() => {
        cursor.removeChild(sparkle);
    }, 1000);
});

const showpopupbtn =document.querySelector("login");

showpopupbtn.addEventListener("click",()=>{
document.body.classList.toggle("show-popup");

});
function loginpopup(){

document.getElementById('blurall').style.visibility='visible';}

function crossed(){
    document.getElementById('blurall').style.visibility='hidden';
}

 