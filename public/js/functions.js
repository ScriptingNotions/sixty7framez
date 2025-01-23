import * as Utils from "./utils.js";

const bookingDetails = new Object();

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

        const carousel = _$("#carousel");
        const scrollAmount = 296; // Card width (250px) + gap (16px)
        const roundDownToTen = (num) => Math.floor(num / 10) * 10;

        export function prevCarousel() {
            carousel.scrollBy({
                left: -scrollAmount,
                behavior: "smooth"
            });

            // setTimeout(() => {
            //     let packageIndex =  ((roundDownToTen(carousel.scrollLeft) + roundDownToTen(carousel.getBoundingClientRect().width)) / roundDownToTen(carousel.getBoundingClientRect().width)) - 1;
            //     console.log(_$$(".package-item")[packageIndex]);
            //     carousel.style.height = _$$(".package-item")[packageIndex].getBoundingClientRect().height + 10 + "px";
            // }, 500);
        }

        export function nextCarousel() {
            _$("#carousel").scrollBy({
                left: scrollAmount,
                behavior: "smooth"
            });

 

            // setTimeout(() => {
            //     console.log(carousel.offsetWidth, carousel.scrollLeft, roundDownToTen(carousel.getBoundingClientRect().width), );
            //     let packageIndex = ((roundDownToTen(carousel.scrollLeft) + roundDownToTen(carousel.getBoundingClientRect().width)) / roundDownToTen(carousel.getBoundingClientRect().width)) - 1;

            //     console.log(_$$(".package-item")[packageIndex]);
            //     carousel.style.height = _$$(".package-item")[packageIndex].getBoundingClientRect().height + 10 + "px";
            // }, 500);
        }
        
        export function selectCarouselPackage(e) {
            _$$(".package-item").forEach(element => {
                element.classList.remove("active-package");
            });

            e.target.parentElement.classList.add("active-package");

            bookingDetails.packageType = e.target.dataset.packageType;

            console.log(bookingDetails);
        }
  

export function basicInputValidation(value) {
    if (value.trim() === '') {
        return false;
    } else {
        return true;
    }
}

export function emailValidation(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      return false;
    } else {
        return true;
    }
}

export function phoneValidation() {
    if (!phone.match(/^\d+$/)) {
        return false;
    } else {
        return true;
    }
}