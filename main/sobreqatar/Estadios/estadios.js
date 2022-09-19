const slider= document.querySelector("#slider");
let sliderSection = document.querySelectorAll("slider-section");
let sliderSectionLast = sliderSection[sliderSection.lenght -1];

const btnleft= document.querySelector("#btn-left");
const btnright= document.querySelector("#btn-right");

slider.insertAdjacentElement('afterbegin')

function next(){
    let sliderSectionFirst = document.querySelectorAll("slider-section")[0];
    slider.stile.marginLeft = "-200%";
    slider.stile.transition ="all 0.5s";
    setTimeout(function(){
        slider.style.transition = "none";
        slider.insertAdjacentElement('beforeend',sliderSectionfirst);
        slider.style.marginleft = "-100%"
    },500);
}

btnright.addEventListener('click',function(){
    Next();
});
