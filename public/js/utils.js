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


