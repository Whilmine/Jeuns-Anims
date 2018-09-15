window.onload = function() {
    document.getElementById("featuredimg").src =  document.getElementById("gallery_image_1_large").src;

};

function bigImg(x) {
document.getElementById("featuredimg").src = document.getElementById(x.id+"_large").src;
}