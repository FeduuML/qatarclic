const slider= document.querySelector("#slider");
let sliderSection = document.getElementsByClassName("slider-section");
let sliderSectionLast = sliderSection[sliderSection.length  -1];

const btnLeft = document.querySelector("#btn-left");
const btnRight = document.querySelector("#btn-right");
slider.style.marginLeft = "0%";

slider.insertAdjacentElement('afterbegin', sliderSectionLast);

function Next(){
    let sliderSectionFirst = document.getElementsByClassName("slider-section")[0];
    let mlTarget = slider.style.cssText;
    let regEx1 = new RegExp('^margin-left: ');
    let regEx2 = new RegExp('%.*$');
    let mlValue = parseInt(mlTarget.split(regEx1)[1].split(regEx2)[0]);
    let newVal = mlValue;
    newVal -= 100;
    switch(mlValue){
        case 0:
            slider.style.marginLeft = newVal+"%";
            break;
        case -100:
            slider.style.marginLeft = newVal+"%";
            break;
        default:
            slider.style.marginLeft = "0%";
            break;
    }
    slider.style.transition ="all 0.3s";
   
}

function Prev(){
    let sliderSectionLast = document.getElementsByClassName("slider-section")[sliderSection.length  -1];
    let mlTarget = slider.style.cssText;
    let regEx1 = new RegExp('^margin-left: ');
    let regEx2 = new RegExp('%.*$');
    let mlValue = parseInt(mlTarget.split(regEx1)[1].split(regEx2)[0]);
    let newVal = mlValue;
    newVal += 100;
    switch(mlValue){
        case 0:
            slider.style.marginLeft = "-200%";
            break;
        case -100:
            slider.style.marginLeft = newVal+"%";
            break;
        default:
            slider.style.marginLeft = newVal+"%";
            break;
    }
    slider.style.transition ="all 0.3s";
   
}


btnRight.addEventListener('click', function(){
    Next();
});

btnLeft.addEventListener('click', function(){
    Prev();
});
