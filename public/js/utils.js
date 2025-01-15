// export const navigateTo = (url, callback) => {
//     if (window.location.pathname !== url && !isProcessing) {
//         isProcessing  = true;
//         // showProgressBar();
//         // updateProgressBar(10);  // Initial stage

//         const req = new Request(url, {
//             method: "GET",
//             mode: "cors"
//         });
    
//         fetch(req)
//             .then(response => {
//                 console.log(`Response received from: ${url}`, response);
//                 // updateProgressBar(50);  // Mid stage
//                 return response.text();
//             })
//             .then((response) => {
//                 console.log(`Response body parsed for: ${url}`);
//                 history.pushState(null, null, url);
//                 callback(response);
//                 // closeModal();
//                 // updateProgressBar(80);  // Before event handling
//                 setTimeout(() => {
//                     console.log(`Handling events for: ${url}`);
//                     // handleEvents();
//                     // Start observing the scroll anchor
//                     if(_$("#scroll-anchor")) {
//                         observer.observe(_$("#scroll-anchor"));
//                     }
                    
//                     // updateProgressBar(100);  // Final stage
//                     // setTimeout(hideProgressBar, 500); // Allow transition to complete before hiding
//                 }, 500);
//             })
//             .catch(err => {
//                 console.error(`Error during fetch to: ${url}`, err);
//                 // hideProgressBar();
//             })
//             .finally(() => {
//                 isProcessing = false;
//             });

//     }
// };

// export const navigatePop = (url, callback) => {
//     console.log(`Pop navigating to: ${url}`);
//     showProgressBar();
//     updateProgressBar(10);  // Initial stage

    
//     // Start observing the scroll anchor
//     observer.observe(_$("#scroll-anchor"));

//     const req = new Request(url, {
//         method: "GET",
//         mode: "cors"
//     });

//     fetch(req)
//         .then(response => {
//             console.log(`Response received from: ${url}`, response);
//             updateProgressBar(50);  // Mid stage
//             return response.text();
//         })
//         .then((response) => {
//             console.log(`Response body parsed for: ${url}`);
//             callback(response);
//             handleEvents();
//             closeModal();
//             updateProgressBar(100);  // Final stage
//             setTimeout(hideProgressBar, 500); // Allow transition to complete before hiding
//         })
//         .catch(err => {
//             console.error(`Error during fetch to: ${url}`, err);
//             hideProgressBar();
//         });
// };

var isProcessing = false;


export async function initFetch(method, url, data=null) {
    let options = {
        method: method,
        mode: "cors"
    };

    if (data !== null) {
        if (data instanceof FormData) {
            options.body = data;
        } else {
            let fd = new FormData();
            for (let key in data) {
                fd.append(key, data[key]);
            }
            options.body = fd;
        }
    }

    const req = new Request(url, options);
console.log(isProcessing);
    if(!isProcessing) {
        try {
            isProcessing = true;
            const result = await fetch(req);
            const response = await result.text();
            return response;
        } catch (error) {
            console.error('Error:', error);
            throw error;
        } finally {
            isProcessing = false;
        }
    }

}

export function disableScroll(scrollTop) {
    if (scrollTop >= 0) {
        _$('body').style.top = `${scrollTop}px`;

        _$('body').style.position = "fixed";

        _$('body').style.top = `-${scrollTop}px`;
        _$('body').style.left = `0px`;
        _$('body').style.right = `0px`;

    }
}

export function openModal(content) {
    console.log(typeof content);
    let modal = document.createElement('DIV');
    let modalUnderlay = document.createElement('DIV');
    let modalContent = document.createElement('DIV');

    disableScroll(window.scrollY);
    
    modal.id = "modal";
    modalUnderlay.classList.add("modal-underlay");
    modalContent.classList.add("modal-content");
    modal.classList.remove("closing");
    modal.style.display = "flex"; // Make the modal visible
    modal.appendChild(modalUnderlay);
    
    if(typeof content === "object") {
        modalContent.appendChild(content);
    }

    if(typeof content === "string") {
        modalContent.innerHTML =  content;
    }
    
    modal.appendChild(modalContent);
            console.log(modal);

        if(!_$('#modal')) {
            _$('body').appendChild(modal);
        }
}