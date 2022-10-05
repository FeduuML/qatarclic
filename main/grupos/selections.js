var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("header").style.top = "0";
        } 
        else {
            document.getElementById("header").style.top = "-250px";
        }
        prevScrollpos = currentScrollPos;
    }
}