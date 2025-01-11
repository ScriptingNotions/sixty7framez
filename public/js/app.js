import * as Func from './functions.js';

document.addEventListener('DOMContentLoaded', () => {
    const _$ = document.querySelector.bind(document);
    const _$$ = document.querySelectorAll.bind(document);
    
    _$('body').onclick = (e) => {
        [...e.target.attributes].some(attr => {
            if(attr.name.startsWith("few:")) {
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