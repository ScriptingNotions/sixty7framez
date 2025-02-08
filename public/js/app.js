import * as Func from './functions.js';
import { initFetch } from './utils.js';

document.addEventListener('DOMContentLoaded', () => {
    
    _$('body').onclick = (e) => {
        console.log(e.target);
        // make click function file
        [...e.target.attributes].some(attr => {
            if(attr.name.startsWith("data-few")) {
                let funcNames = attr.value.split(",");
                
                if(funcNames.length > 0) {
                    funcNames.forEach(funcName => {
                        Func[funcName](e);
                    });
                } else {
                    let funcName = attr.value;

                    Func[funcName](e);
                }
            }
        });

        if(e.target.matches("[data-url]")) {

        }
    }

    
    const carousel = _$("#carousel");

    if(window.location.pathname.includes( "/booking" )) {
        _$$(".package-item").forEach(element => {
            if(element.classList.contains("active-package")) {
                console.log(element); 
                element.scrollIntoView(true);
            } else {
                return;
                _$("#carousel").scrollTo({
                    left: 0,
                    behavior: "smooth"
                });
            }
        });





        if(carousel.getBoundingClientRect().width === 310) {
return;
            carousel.style.height = _$$(".package-item")[0].getBoundingClientRect().height + 10 + "px";

            const roundDownToTen = (num) => Math.floor(num / 10) * 10;

            carousel.onscrollend = (e) => {
                let packageIndex =  ((roundDownToTen(carousel.scrollLeft) + roundDownToTen(carousel.getBoundingClientRect().width)) / roundDownToTen(carousel.getBoundingClientRect().width)) - 1;
                carousel.style.height = _$$(".package-item")[packageIndex].getBoundingClientRect().height + 10 + "px";
            };
        }

        carousel.onscrollend = (e) => {
            console.log(carousel.scrollLeft);
            console.log(carousel.getBoundingClientRect().width);
        };


    }



    
    

});