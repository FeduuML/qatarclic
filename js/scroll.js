var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (document.body.scrollTop > 180 || document.documentElement.scrollTop > 180) {
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "50";
        } 
        else {
            document.getElementById("navbar").style.top = "-200px";
        }
        prevScrollpos = currentScrollPos;
    }
}