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

            if(currentPage) {}
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
            console.log(currentPage);
            const backBtn = _$(`.back-button-${currentPage}`);
            const nextBtn = _$(`.next-button-${currentPage}`);

            // Show/hide back button
            if(backBtn != null) {
                backBtn.style.display = currentPage > 1 ? 'inline' : 'none';
            }

            // Update next button
            if(nextBtn != null) {
                nextBtn.style.display = currentPage < totalPages ? 'inline' : 'none';
            }
        }

        function validateBookingPage1() {
            if(bookingDetails.packageType != undefined) {
                navigate('next');
            } 
        }

        function validateBookingPage2() {
            const form = _$(".customer-booking-form");
            const inputs = form.querySelectorAll('input[required]');
            let isValid = true;

            bookingDetails.customerOverview = [];
        
            inputs.forEach((input, i) => {
                let errorMsg = validateInput(input) ? validateInput(input) : ""; 
    
                if(errorMsg.outerHTML != undefined) {
                    _$$(".form-group")[i].insertAdjacentHTML("beforeend", errorMsg.outerHTML);
    
                    isValid = false;
                } else {
                    bookingDetails.customerOverview.push({"name": input.name, "value": input.value});
                }
            });

            if(isValid) {
                navigate("next");
            }
        }

        function validateBookingPage3() {
            const eventType = _$("#eventType");
            const hrs = _$("#hours");
            const mins = _$("#minutes");
            const period = _$("#period");
            const venueName = _$("#venueName");
            const venueAddress = _$("#venueAddress");
            const eventDate = _$("#eventDate");

            let isValid = true;

            bookingDetails.eventDetails = [];
        // do for input, too.
            [
                eventType,
                hrs,
                mins,
                period
            ].forEach(element => {
                console.log(element);
                let errorMsg = validateSelect(element) ? validateSelect(element) : ""; 
    console.log(errorMsg);
                if(errorMsg.outerHTML != undefined) {
                    console.log(element.closest(".form-group"));
                    element.closest(".form-group").insertAdjacentHTML("beforeend", errorMsg.outerHTML);
    
                    isValid = false;
                } else {
                    bookingDetails.eventDetails.push({"name": element.name, "value": element.value });
                }
            });

            [
                eventDate,
                venueAddress,
                venueName
            ].forEach(element => {
                console.log(element);
               let errorMsg = validateInput(element) ? validateInput(element) : "";

               if(errorMsg.outerHTML != undefined) {
                    element.closest(".form-group").insertAdjacentHTML("beforeend", errorMsg.outerHTML);

                    isValid = false;
                } else {
                    bookingDetails.eventDetails.push({"name": element.name, "value": element.value});
                }

                console.log(bookingDetails);
            });

            let data = {
                bookingData: JSON.stringify({
                    firstName: bookingDetails.customerOverview[0].value,
                    lastName: bookingDetails.customerOverview[1].value,
                    email: bookingDetails.customerOverview[2].value,
                    phone: bookingDetails.customerOverview[3].value,
                    eventType: bookingDetails.eventDetails[0].value,
                    eventTime: `${bookingDetails.eventDetails[1].value}:${bookingDetails.eventDetails[2].value} ${bookingDetails.eventDetails[3].value}`,
                    eventDate: bookingDetails.eventDetails[4].value,
                    venueAddress: bookingDetails.eventDetails[5].value,
                    venueName: bookingDetails.eventDetails[6].value,
                    package: bookingDetails.packageType
                })
            };

            Utils.initFetch("POST", "/booking", data)
            .then(res => {
                if(isValid) {
                    navigate("next");
                }
                console.log(JSON.parse(res));

                res = JSON.parse(res);

                _$(".field-value-summary-name").innerText = res.firstName + " " + res.lastName;
                _$(".field-value-summary-phone").innerText = res.phone;
                _$(".field-value-summary-email").innerText = res.email;
                _$(".field-value-summary-start").innerText = res.eventDate + " at " + res.eventTime;
                _$(".field-value-summary-hours").innerText = 4;
                _$(".field-value-summary-package").innerText = res.package;
                _$(".field-value-summary-venue-name").innerText = res.venueName;
                _$(".field-value-summary-venue-address").innerText = res.venueAddress;
            })
        }

        function validateBookingPage4() {
            const terms = _$("#booking-terms");

            if(terms.checked) {
                navigate("next");
            }
        }

        export function nextBooking() {

            switch(currentPage) {
                case 1:
                    validateBookingPage1();
                break;

                case 2:
                    validateBookingPage2();
                break;

                case 3:
                    validateBookingPage3(); 
                break;

                case 4:
                    validateBookingPage4();
                break;

                case 5:

                break;

            }
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
  

        function validateInput(input) {
            const formGroup = input.closest('.form-group');
            let errorMessage = '';
    
            // Remove any existing error messages
            const existingError = formGroup.querySelector('.error-text');
            if (existingError) {
                existingError.remove();
            }
    
            // Trim the input value
            const value = input.value.trim();
    
            // Validation based on input type
            switch(input.type) {
                case 'text':
                    // Name validation (only letters and spaces)
                    if (value.length === 0) {
                        errorMessage = 'This field should not be empty.';
                    } 
                    break;
                
                case 'date':
                    // Name validation (only letters and spaces)
                    if (value.length === 0) {
                        errorMessage = 'This field should not be empty.';
                    } 
                    break;
    
                case 'email':
                    // Email validation with regex
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        errorMessage = 'Please enter a valid email address.';
                    }
                    break;
    
                case 'tel':
                    // Phone number validation (allows different formats)
                    const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
                    if (!phoneRegex.test(value)) {
                        errorMessage = 'Please enter a valid phone number.';
                    }
                    break;
            }
    
            // Add error message if validation fails
            if (errorMessage) {
                const errorElement = document.createElement('div');
                errorElement.classList.add('error-text');
                errorElement.textContent = errorMessage;
                errorElement.style.color = 'red';
                errorElement.style.fontSize = '0.8em';
                errorElement.style.marginTop = '5px';
                //formGroup.appendChild(errorElement);
                return errorElement;
            }
    
            return true;
        }

        function validateSelect(select) {
            const formGroup = select.closest('.form-group');
            let errorMessage = '';
    
            // Remove any existing error messages
            const existingError = formGroup.querySelector('.error-text');
            if (existingError) {
                existingError.remove();
            }
    console.log(select.value, "value: ", select.value === "");
            if (select.value === "") {
                errorMessage = 'Fill out required field.';
            } 
           
            // Add error message if validation fails
            if (errorMessage) {
                const errorElement = document.createElement('div');
                errorElement.classList.add('error-text');
                errorElement.textContent = errorMessage;
                errorElement.style.color = 'red';
                errorElement.style.fontSize = '0.8em';
                errorElement.style.marginTop = '5px';
                //formGroup.appendChild(errorElement);
                return errorElement;
            }
    
            return true;
        }


export function startBookingContact(e) {
    const form = _$(".get-started-contact-form");
    const inputs = form.querySelectorAll('input[required]');
    let isValid = true;

        inputs.forEach((input, i) => {
            let errorMsg = validateInput(input) ? validateInput(input) : ""; 

            if(errorMsg.outerHTML != undefined) {
                _$$(".form-group")[i].insertAdjacentHTML("beforeend", errorMsg.outerHTML);

                isValid = false;
            }
        });

        if(!isValid) {
            e.preventDefault();
        }
}