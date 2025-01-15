import * as Utils from "./utils.js";


export function toggleFAQ(e) {
    console.log(e);
    if(e.target.parentElement.children[1].style.maxHeight === "initial") {
        e.target.parentElement.children[1].style.maxHeight = "0px";
        e.target.style.transform = "rotate(0deg) translateY(-50%)";
    } else {
        e.target.parentElement.children[1].style.maxHeight = "initial";
        e.target.style.transform = "rotate(45deg) translateY(-50%)";
    }
}

export function toggleMobileMenu(e) {
    console.log("fre");
    if(_$('.mobile-menu-container').style.display === "block") {
        _$('.mobile-menu-container').style.display = "none";
        _$('.mobile-menu-button').innerText = "Menu";
    } else {
        _$('.mobile-menu-container').style.display = "block";
        _$('.mobile-menu-button').innerText = "Close";
    }
}
