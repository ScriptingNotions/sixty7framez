import * as Func from './functions.js';

document.addEventListener('DOMContentLoaded', () => {
    
    _$('body').onclick = (e) => {
        console.log(e.target);
        // make click function file
        [...e.target.attributes].some(attr => {
            if(attr.name.startsWith("data-few:")) {
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
});