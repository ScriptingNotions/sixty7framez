import * as Utils from "./utils.js";

const bookingDetails = new Object();
// Initialize Signature Pad
if(window.location.pathname.includes( "/booking" )) {
    var canvas = _$('#signature-pad');
    var signaturePad = new SignaturePad(canvas);
}


export function toggleFAQ(e) {
    //console.log(e);
    if(e.target.parentElement.children[1].style.maxHeight === "initial") {
        e.target.parentElement.children[1].style.maxHeight = "0px";
        e.target.style.transform = "rotate(0deg) translateY(-50%)";
    } else {
        e.target.parentElement.children[1].style.maxHeight = "initial";
        e.target.style.transform = "rotate(45deg) translateY(-50%)";
    }
}

export function scrambleString(str) {
    return btoa(encodeURIComponent(str).split('').reverse().join(''));
}

export function toggleMobileMenu(e) {
    // if(_$('.mobile-menu-container').style.display === "block") {
    //     _$('.mobile-menu-container').style.display = "none";
    //     _$('.mobile-menu-button').innerText = "Menu";
    // } else {
    //     _$('.mobile-menu-container').style.display = "block";
    //     _$('.mobile-menu-button').innerText = "Close";
    // }

    if(_$(".main-nav").style.display === "flex") {
        _$(".main-nav").style.display = "none";
        e.target.innerText = "Menu";
        
    } else {
        _$(".main-nav").style.display = "flex"; 
        e.target.innerText = "Close";
    }

}



        let currentPage = 1;
        const totalPages = 5;

        function navigate(direction) {
            let bookingPosition = ["Select a package", "Customer overview", "Event details", "Contract", "Payment"];

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
           // console.log(currentPage);
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

        function bookingPage1() {
            _$("#eventType").addEventListener('change', (e) => {
               // console.log(e.target.value);
                if (e.target.value === "Other") {
                    _$(".eventTypeOther").style.display = "flex";
                } 
                // If using a standard select element
                else if (e.target.value === "Other") {
                    _$(".eventTypeOther").style.display = "flex";
                }
                else {
                    _$(".eventTypeOther").style.display = "none";
                    _$("#eventTypeOther").value = "";

                }
            });

            _$$(".package-item").forEach(el => {
                if(el.classList.contains("active-package")){
                    bookingDetails.packageType = el.dataset.package;
                    bookingDetails.packagePrice = el.dataset.packagePrice;
                    bookingDetails.packageTime = el.dataset.packageTime;
                }
            });

            if(bookingDetails.packageType != undefined) {
                navigate('next');
            } 
        }

        function bookingPage2() {
            const form = _$(".customer-booking-form");
            const inputs = form.querySelectorAll('input[required]');
            let isValid = true;

            if(_$("#companyName").value != "") {
                let errorMsg = validateInput(_$("#companyName")) ? validateInput(_$("#companyName")) : ""; 
    
                if(errorMsg.outerHTML != undefined) {
                    _$("#companyName").parentElement.insertAdjacentHTML("beforeend", errorMsg.outerHTML);
    
                    isValid = false;
                }
    
                let inputName = _$("#companyName").name;
    
                bookingDetails[inputName] = _$("#companyName").value.replace(/^\w/, c => c.toUpperCase()) ;
            }

            inputs.forEach((input, i) => {
                let errorMsg = validateInput(input) ? validateInput(input) : ""; 
    
                if(errorMsg.outerHTML != undefined) {
                    _$$(".form-group")[i].insertAdjacentHTML("beforeend", errorMsg.outerHTML);
    
                    isValid = false;
                } else {
                    let inputName = input.name;

                    bookingDetails[inputName] = input.value.replace(/^\w/, c => c.toUpperCase());
                }
            });

            if(isValid) {
                navigate("next");
            }
        }

        function bookingPage3() {
            const eventType = _$("#eventType");
            const eventTypeOther = _$("#eventTypeOther");
            const timeSelect = _$("#time-select");
            //const venueName = _$("#venueName");
            // const venueAddress = _$("#venueAddress");
            // const venueCity = _$("#venueCity");
            // const venueState = _$("#venueState");
            // const venueZip = _$("#venueZip");
            // const venuePhone = _$("#venuePhone");
            // const venueEmail = _$("#venueEmail");
            // const venueContact = _$("#venueContact");

            let isValid = true;

            [
               // venueState,
                timeSelect,
                eventType
            ].forEach(element => {
                //console.log(element);
                let errorMsg = validateSelect(element) ? validateSelect(element) : ""; 
  
                if(errorMsg.outerHTML != undefined) {
                    //console.log(element.closest(".form-group"));
                    element.closest(".form-group").insertAdjacentHTML("beforeend", errorMsg.outerHTML);
    
                    isValid = false;
                } else {
                    let inputName = element.name;

                    bookingDetails[inputName] = element.value;
                }
            });

            [
                eventTypeOther,
                // venueZip,
                // venueCity,
                // venueAddress,
                // venueName,
                // venuePhone,
                // venueEmail,
                // venueContact
            ].forEach(element => {
                //console.log(element);
               let errorMsg = validateInput(element) ? validateInput(element) : "";

               if(errorMsg.outerHTML != undefined) {
                    element.closest(".form-group").insertAdjacentHTML("beforeend", errorMsg.outerHTML);

                    isValid = false;
                } else {
                    let inputName = element.name;

                    bookingDetails[inputName] = element.value.replace(/^\w/, c => c.toUpperCase()) ;
                }

                //console.log(bookingDetails);
            });

            if(bookingDetails.eventDate === undefined || bookingDetails.eventTime === undefined) {
                isValid = false;
            }

            if(bookingDetails.eventDate === undefined) {
                const errorElement = document.createElement('div');
                errorElement.classList.add('error-text');
                errorElement.textContent = "Please select a date.";
                errorElement.style.color = 'red';
                errorElement.style.fontSize = '0.8em';
                errorElement.style.marginTop = '5px';

                _$(".booking-date-error-msg").innerHTML = errorElement.outerHTML;
            }

            //console.log(isValid);

            if(isValid) {
                const dateString = bookingDetails.eventDate;
                const date = new Date(dateString.split("-")[0], dateString.split("-")[1] - 1, dateString.split("-")[2]);

                const readableDate = date.toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                let startTime = new Date();
                startTime.setHours(bookingDetails.eventTime.split(":")[0], bookingDetails.eventTime.split(":")[1], 0 , 0).toExponential;
//console.log(bookingDetails.packageTime



                let endTime = new Date(startTime);
                endTime.setHours(startTime.getHours() + +bookingDetails.packageTime);

                endTime = endTime.toLocaleTimeString('en-US', { 
                    hour: 'numeric', 
                    minute: '2-digit', 
                    hour12: true 
                  });

                startTime = startTime.toLocaleTimeString('en-US', { 
                    hour: 'numeric', 
                    minute: '2-digit', 
                    hour12: true 
                  });

                _$(".contract-event-time-start").innerText = startTime;

                _$(".contract-event-time-end").innerText = endTime;
                _$("#contract-client-name").innerText = bookingDetails.firstName + " " + bookingDetails.lastName;
                _$("#contract-client-phone").innerText = bookingDetails.phone;
                _$("#contract-client-email").innerText = bookingDetails.email;
                _$("#contract-client-event-time").innerText = startTime;
                //_$(".field-value-summary-hours").innerText = bookingDetails.packageTime;
                _$("#contract-client-package-type").innerText = bookingDetails.packageType;
               // _$("#contract-venue-name").innerText = bookingDetails.venueName;
               // _$("#contract-venue-address").innerText = bookingDetails.venueAddress + " " + bookingDetails.venueCity + ", " + bookingDetails.venueState + " " + bookingDetails.venueZip;
                _$("#contract-client-company").innerText = bookingDetails?.companyName != undefined ? bookingDetails.companyName : "";
                _$("#contract-client-event-type").innerText = bookingDetails.eventType === "Other" ? bookingDetails.eventTypeOther : bookingDetails.eventType;
                // _$("#contract-venue-contact-person").innerText = bookingDetails.venueContact;
                // _$("#contract-venue-email").innerText =  bookingDetails.venueEmail;
                // _$("#contract-venue-phone").innerText =   bookingDetails.venuePhone;
                _$("#contract-client-event-date").innerText =   readableDate;
                _$(".contract-date").innerText = readableDate;

                bookingDetails.readableDate = readableDate;
                bookingDetails.contractStartTime = startTime;
                bookingDetails.contractEndTime = endTime;
                bookingDetails.eventType = bookingDetails.eventType === "Other" ? bookingDetails.eventTypeOther : bookingDetails.eventType;

                navigate("next");

            }

        }

        async function bookingPage4() {
            let isValid = true;

            let contractSignature = _$("#contract-signature");
            // let contractEmail = _$("#contract-email");

            const terms = _$("#booking-terms");

            _$(".loader-container").innerHTML = '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>';

            [
                contractSignature
            ].forEach(element => {
                //console.log(element);
               let errorMsg = validateInput(element) ? validateInput(element) : "";

               if(errorMsg.outerHTML != undefined) {
                    element.closest(".form-group").insertAdjacentHTML("beforeend", errorMsg.outerHTML);

                    isValid = false;
                } else {
                    let inputName = element.name;

                    bookingDetails[inputName] = element.value.replace(/^\w/, c => c.toUpperCase()) ;
                }

                //console.log(bookingDetails);
            });

 

            if(terms.checked && isValid && !signaturePad.isEmpty()) {
                navigate("next");

                bookingDetails.signature = signaturePad.toDataURL();
                //console.log(bookingDetails);
                    // Initialize Stripe.js
                    const stripe = Stripe('pk_test_51R0tekLvK2KcNfItZJRXusWNBMqRxRdGZsM0ZUj4wldHkLA0DXIvxs7RY5KgASU9cXbLxLYX1KaWmThYsfX8VuRy00QlO0u3M2');

                    // Fetch Checkout Session and retrieve the client secret
                    const fetchClientSecret = async () => {
                        try {
                            const response = await Utils.initFetch("POST", "/booking-payment", bookingDetails);
                            // Parse the response once
                            //console.log(JSON.parse(response));
                            const data = JSON.parse(response);

                            
                            if (!data.clientSecret) {
                                throw new Error('Client secret not found in response');
                            }

                            _$(".loader-container").innerHTML = "";
                            
                            return data.clientSecret; // Return just the string, not the object
                        } catch (error) {
                            //console.error('Error fetching client secret:', error);
                            throw error;
                        }
                    }
                    
                    // Initialize Checkout
                    const checkout = await stripe.initEmbeddedCheckout({
                        clientSecret: await fetchClientSecret(), // Changed to directly await the function,
                        onComplete: async () => {
                            _$("#checkout").style.display = "none";
                            _$(".loader-container").innerHTML = '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>';
                            
                            try {
                                // Get the checkout session ID
                                const sessionId = checkout.embeddedCheckout.checkoutSessionId;
                                //console.log(checkout.embeddedCheckout.checkoutSessionId);
                                // Verify payment status with your server
                                const verificationResponse = await Utils.initFetch("POST", "/verify-payment", {
                                    session_id: sessionId
                                });

                                const verificationResult = JSON.parse(verificationResponse);
                                //console.log(verificationResult);
                                if (verificationResult.success) {
                                    // TODO: Now booking your event
                                    //_$("#checkout").innerHTML = "<span>Booking your event...</span>";

                                    // Payment successful book event
                                    bookingDetails.orderId = verificationResult.order_id;
                                    bookingDetails.sessionId = verificationResult.checkout_session.id;

                                   // console.log(bookingDetails);
                                    let data = JSON.stringify(bookingDetails);
                                    let bookEvent = await Utils.initFetch("POST", "/book-event", {
                                        data
                                    });  

                                   // console.log(bookEvent);
                                    bookEvent = JSON.parse(bookEvent);
                                   // console.log(bookEvent);
                                    if(bookEvent.uploaded) {
                                        _$(".loader-container").innerHTML = "";
                                        _$("#checkout").style.display = "flex";
                                    }

                                } else {
                                    // Payment failed or pending
                                   // console.error('Payment verification failed:', verificationResult.error);
                                   // navigate("/booking/error");
                                }
                                
                                // Cleanup
                            } catch (error) {
                               // console.error('Error in checkout completion:', error);
                            }
                        }
                    });
                    
                    _$("#checkout").innerHTML = "";
                    
                    // Mount Checkout
                    checkout.mount('#checkout');

                    //console.log("checkout: ", checkout);
          
                
            }
        }

        function bookingPage5() {
            Utils.initFetch("GET", "/booking-payment");
        }

        export function nextBooking() {

            switch(currentPage) {
                case 1:
                    bookingPage1();
                break;

                case 2:
                    bookingPage2();
                break;

                case 3:
                    bookingPage3(); 
                break;

                case 4:
                    bookingPage4();
                break;

                case 5:
                    bookingPage5();
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
        
        export function selectPackage(e) {
            let packagePrice = e.target.dataset.packagePrice;

            _$$(".package-item").forEach(element => {
                element.classList.remove("active-package");
            });

            e.target.parentElement.parentElement.classList.add("active-package");

            bookingDetails.packageType = e.target.dataset.packageType;
            bookingDetails.packageTime = e.target.dataset.packageTime;
            bookingDetails.packagePrice = packagePrice;

           // console.log(bookingDetails);
        }
  

        function validateInput(input) {
            const formGroup = input.closest('.form-group');
            let errorMessage = '';
    
            //console.log("Display: ", input.style.display);

            if(formGroup.style.display != "none") {
        
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

                if (input.tagName.toLowerCase() === "textarea") {
                    if (input.value.length === 0) {
                        errorMessage = 'This field should not be empty.';
                    } 
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
    //console.log(select.value, "value: ", select.value === "");
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

        if(_$("#companyName").value != "") {
            let errorMsg = validateInput(_$("#companyName")) ? validateInput(_$("#companyName")) : ""; 

            if(errorMsg.outerHTML != undefined) {
                _$("#companyName").parentElement.insertAdjacentHTML("beforeend", errorMsg.outerHTML);

                isValid = false;
            }

            let inputName = _$("#companyName").name;

            bookingDetails[inputName] = _$("#companyName").value.replace(/^\w/, c => c.toUpperCase()) ;
        }

        inputs.forEach((input, i) => {
            let errorMsg = validateInput(input) ? validateInput(input) : ""; 

            if(errorMsg.outerHTML != undefined) {
                _$$(".form-group")[i].insertAdjacentHTML("beforeend", errorMsg.outerHTML);

                isValid = false;
            }

            let inputName = input.name;

            bookingDetails[inputName] = input.value.replace(/^\w/, c => c.toUpperCase()) ;

        });

        if(isValid) {
            let str = bookingDetails.firstName + "-" + bookingDetails.lastName + "-" + bookingDetails.email + "-" + bookingDetails.phone + "-" + bookingDetails.companyName;

            str = scrambleString(str);

            window.location.href = `/booking/${str}`;
        }

}




// const bookedEvents = [
//     {
//         start: {
//             dateTime: '2025-01-26T10:00:00-00:00',
//             timeZone: 'America/Los_Angeles'
//         },
//         end: {
//             dateTime: '2025-01-26T11:00:00-00:00',
//             timeZone: 'America/Los_Angeles'
//         }
//     },
//     {
//         start: {
//             dateTime: '2025-01-27T12:30:00-00:00',
//             timeZone: 'America/Los_Angeles'
//         },
//         end: {
//             dateTime: '2025-01-27T17:30:00-00:00',
//             timeZone: 'America/Los_Angeles'
//         }
//     }

// ];


let currentDate = new Date();
let selectedDate = null;
let bookedEvents = [];

const monthYearEl = _$('#monthYear');
const calendarGridEl = _$('#calendarGrid');
const selectedDateDisplayEl = _$('#selectedDateDisplay');

export function changeMonth(e) {
    //console.log("ff");
    let delta = parseInt(e.target.dataset.direction);
    let date = new Date();

    //console.log(date.getMonth());
    //console.log(currentDate.getMonth());
    //console.log(delta);

    if(date.getMonth() < currentDate.getMonth()) {
        currentDate.setMonth(currentDate.getMonth() + delta);
        renderCalendar();
    } else if(delta > 0) {
        currentDate.setMonth(currentDate.getMonth() + delta);
        renderCalendar();
    }
}

export function goToToday() {
    currentDate = new Date();
    renderCalendar();
}

export function renderCalendar() {
    if(bookedEvents.length === 0) {
        Utils.initFetch("GET", "/events").then(res => {
            //console.log(JSON.parse(res));
            bookedEvents = JSON.parse(res);
        });
    }

    updateMonthYear();
    generateCalendarDays();
}

export function updateMonthYear() {
    const monthYear = currentDate.toLocaleString('default', { 
        month: 'long', 
        year: 'numeric' 
    });
    monthYearEl.textContent = monthYear;
}

export function generateCalendarDays() {
    calendarGridEl.innerHTML = '';
    _$(".days-of-week").innerHTML = "";

    const weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    weekdays.forEach(day => {
        const dayEl = document.createElement('div');
        dayEl.classList.add("day-of-week");
        dayEl.textContent = day;
        _$(".days-of-week").appendChild(dayEl);
    });

    //calendarGridEl.appendChild(dayOfWeek);

    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);

    for (let i = 0; i < firstDay.getDay(); i++) {
        calendarGridEl.appendChild(document.createElement('div'));
    }

    for (let day = 1; day <= lastDay.getDate(); day++) {
        const dateContainer = document.createElement('div');
        const dateEl = document.createElement('span');
        const currentDate = new Date(year, month, day);

        dateEl.textContent = day;
        dateEl.style.position = "absolute";
        dateEl.style.top = "5px";
        dateEl.style.right = "5px";
        dateEl.style.fontSize = "14px";
        dateContainer.classList.add('calendar-day');
        dateContainer.style.position = "relative";

        let date = new Date();

        if(currentDate > date.setDate(date.getDate() + 2) + 2) {
            dateContainer.dataset["few"] = "selectDate";
            dateContainer.dataset["date"] = currentDate;
        } else {
            dateContainer.style.backgroundColor = "#f6f6f6";
        }

        if (selectedDate && 
            currentDate.toDateString() === selectedDate.toDateString()) {
            dateEl.classList.add('selected');
            bookingDetails.eventDate = new Date(currentDate).toISOString().slice(0, 10);
            //console.log(bookingDetails);
        }

        // //console.log(currentDate.toDateString());
        // console.log(new Date().toDateString());

        if(new Date().toDateString() === currentDate.toDateString()) {
            dateEl.classList.add('current-day');
        }

        dateContainer.innerHTML = dateEl.outerHTML;

        calendarGridEl.appendChild(dateContainer);
    }
}

function subtractHours(time, hours) {
    const date = new Date(`1970-01-01T${time}`);
    date.setHours(date.getHours() - hours);
    //console.log(date.toTimeString().slice(0, 8));
    // Format the result back to HH:MM:SS
    return date.toTimeString().slice(0, 8);
}

function addHours(time, hours) {
    const date = new Date(`1970-01-01T${time}`);
    date.setHours(date.getHours() + hours);
    // Format the result back to HH:MM:SS
    return date.toTimeString().slice(0, 8);
}

function compareTime(time1, time2) {
    const [h1, m1, s1] = time1.split(':').map(Number);
    const [h2, m2, s2] = time2.split(':').map(Number);
    
    if (h1 < h2) return true;
    if (h1 > h2) return false;
    
    // If hours are equal, compare minutes
    if (m1 < m2) return true;
    if (m1 > m2) return false;
    
    // If minutes are equal, compare seconds
    return s1 < s2;
}

export function selectDate(e) {  
    let date = new Date(e.target.dataset.date);  
    const month = date.getMonth() + 1; // +1 because months are 0-indexed
    const day = date.getDate();
    const year = date.getFullYear();

    let disabledCount = 0;
    let t = `${month}, ${day}, ${year}`; 

    [..._$("#time-select").options].forEach(el => {
        el.style.display = "initial";
    });

    bookedEvents.forEach((event, i) => {

        let u = `${new Date(event.start.dateTime).getMonth() + 1}, ${new Date(event.start.dateTime).getDate()}, ${new Date(event.start.dateTime).getFullYear()}`;
        // if user selects a date that has events, block the booked event times
        if(t === u) {
            [..._$("#time-select").options].forEach(el => {
                // subtract package time plus 2 hours from the start time of the booked event
                if(
                    el.value >= subtractHours(bookedEvents[i].start.dateTime.split("T")[1].split("-")[0], +bookingDetails.packageTime + 2)
                    && 
                    el.value <= addHours(bookedEvents[i].end.dateTime.split("T")[1].split("-")[0], 2)
                ) {
                    disabledCount++;
                    el.style.display = "none";
                } else {
                    el.style.display = "initial";
                }
//console.log([..._$("#time-select").options].length, disabledCount + 1);
                if([..._$("#time-select").options].length === disabledCount + 1) {
                    _$(".booking-date-error-msg").innerText = "There is no available time for that date.";
                } else {
                    _$(".booking-date-error-msg").innerText = "";
                }
                
            });
        }
    });

    bookingDetails.eventDate = date;
    _$("#time-select").value = "";
    selectedDate = date;
    renderCalendar();
}

export function submitContactMsg() {
    let contactName = _$("#contact-full-name");
    let contactEmail = _$("#contact-email");
    let contactMsg = _$("#contact-message");
    let contactPhone = _$("#contact-phone");
    let honeypot = _$("#contact-website");
    let turnstileResponse = _$("input[name='cf-turnstile-response']").value;

    let isValid = true;

    if(honeypot.value != "") {
        isValid = false;
    }

    [
        contactName,
        contactEmail,
        contactMsg,
        contactPhone
    ].forEach(input => { 
        let errorMsg = validateInput(input) ? validateInput(input) : ""; 

        if(errorMsg.outerHTML != undefined) {
            input.closest(".form-group").insertAdjacentHTML("beforeend", errorMsg.outerHTML);

            isValid = false;
        }
    });

    let data = {
        name: contactName.value,
        email: contactEmail.value,
        phone: contactPhone.value,
        message: contactMsg.value,
        honeypot: honeypot.value,
        turnstileResponse: turnstileResponse.value
    };

    //console.log(turnstileResponse);

    if(isValid && turnstileResponse != "") {   
        // validate turnstile response

        _$(".contact-section-2").innerHTML = '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>';

        Utils.initFetch("POST", "/contact", data).then(res => {
            //console.log(res);
            res = JSON.parse(res);

            if(res.message_sent) {
               
                _$(".contact-section-2").innerHTML = res.message_HTML;
            }
        });
    }

}

if(calendarGridEl != undefined) {
    renderCalendar();
}

export function clearSignature() {

    var canvas = _$('#signature-pad');
    var signaturePad = new SignaturePad(canvas);

    signaturePad.clear();
}

