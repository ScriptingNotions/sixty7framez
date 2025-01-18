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



let currentPage = 1;
        const totalPages = 5;

        function navigate(direction) {
            let bookingPosition = ["Select a package", "Customer overview", "Event detaials", "Summary", "Payment"];

            // Hide current page
            _$(`#page${currentPage}`).classList.remove('active');

            // Update current page number
            if (direction === 'next' && currentPage < totalPages) {
                currentPage++;
            } else if (direction === 'back' && currentPage > 1) {
                currentPage--;
            }

            let progressBarWidth = _$(".booking-progress-bar").getBoundingClientRect().width;
            _$(".booking-progress").style.width = (progressBarWidth / totalPages) * currentPage + "px";

            // Show new current page
            _$(`#page${currentPage}`).classList.remove('active');
            _$(`#page${currentPage}`).classList.add('active');

            _$(".booking-position").innerText = bookingPosition[currentPage - 1];
            // Update button visibility
            updateButtons();
        }

        function updateButtons() {
            const backBtn = _$(".back-button");
            const nextBtn = _$(".next-button");

            // Show/hide back button
            backBtn.style.display = currentPage > 1 ? 'inline' : 'none';

            // Update next button
            nextBtn.style.display = currentPage < totalPages ? 'inline' : 'none';
        }


        export function nextBooking() {
            navigate('next');
        }

        export function backBooking() {
            navigate('back');
        }