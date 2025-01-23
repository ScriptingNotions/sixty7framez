<?= $this->partial("header"); ?>

<?= $this->partial("nav"); ?>

<section class="booking-section-1">
    <h2>Booking <span>.</span></h2>
    <p>Ready to make your event unforgettable? Fill out the form below, and we’ll be in touch soon!</p>

    <div class="booking-progress-container">
        <div class="booking-progress-bar">
            <div class="booking-progress"></div>
        </div>
        <p class="booking-position">Select a package</p>
    </div>

    <div class="booking-questionaire-container">
        <!-- < //$this->bookingContent; -->
        <div class="booking-item-1 page active" id="page1">
            <div class="package-list">
                <img id="carosel-prev" data-few:="prevCarousel" src="<?= $this->getIcon("chevron-left.svg") ?>" alt="Left icon">
                <div class="booking-package-container  carousel-container" id="carousel">
                    <div class="carousel">
                        <div class="package-item <?= $this->package === "standard" ? "active-package" : "" ?>">
                            <h3>Standard</h3>
                            <p>$375</p>
                            <ul>
                                <li>Tap to Start screen</li>
                                <li>Unlimited photo sessions</li>
                                <li>Unlimited digital photos </li>
                                <li>Live gallery with real-time photo access for guests</li>
                                <li>Instant sharing via Text/Email/QR Code</li>
                                <li>Setup/Breakdown</li>
                                <li>Drop-off service</li>
                                <li>3 hours</li>
                            </ul>
                            <button class="carousel-package" data-few:="selectCarouselPackage" data-package-type="standard">Select package</button>
                        </div>

                        <div class="package-item <?= $this->package === "memory-maker" ? "active-package" : "" ?>">
                            <h3>Memory Maker</h3>
                            <p>$550</p>
                            <ul>
                                <li>Open-air booth</li>
                                <li>Customized Tap to Start screen</li>
                                <li>Fun props (hats, glasses, signs, etc.)</li>
                                <li>Unlimited photo sessions</li>
                                <li>Unlimited digital photos</li>
                                <li>Live gallery with real-time photo access for guests</li>
                                <li>Instant sharing via Text/Email/QR Code</li>
                                <li>Setup/Breakdown</li>
                                <li>Optional drop-off service</li>
                                <li>3 hours</li>
                            </ul>
                            <button class="carousel-package" data-few:="selectCarouselPackage"  data-package-type="memory-maker">Select package</button>
                        </div>

                        <div class="package-item <?= $this->package === "deluxe" ? "active-package" : "" ?>">
                            <h3>Deluxe</h3>
                            <p>$750</p>
                            <ul>
                                <li>Open-air booth</li>
                                <li>Choice of premium backdrop</li>
                                <li>Premium props</li>
                                <li>Customized Tap to Start screen and LED Ring</li>
                                <li>Photo/GIF/Boomerang/Video</li>
                                <li>Select up to 2 each face effects & pose tips</li>
                                <li>Unlimited personalized photo templates (digital only)</li>
                                <li>100 personalized photo templates 2x6 prints</li>
                                <li>Live gallery with real-time photo access for guests</li>
                                <li>Instant sharing via Text/Email/QR Code</li>
                                <li>Setup/Breakdown</li>
                                <li>On-site attendant</li>
                                <li>4 hours</li>
                            </ul>
                            <button class="carousel-package" data-few:="selectCarouselPackage"  data-package-type="deluxe">Select package</button>
                        </div>

                        <div class="package-item <?= $this->package === "luxe" ? "active-package" : "" ?>" >
                            <h3>Luxe</h3>
                            <p>$1,100</p>
                            <ul>
                                <li>Open-air booth</li>
                                <li>Choice of premium backdrop</li>
                                <li>Custom prop set tailored to your event (theme options available)</li>
                                <li>Customized Tap to Start screen and LED Ring</li>
                                <li>Photo/GIF/Boomerang/Video</li>
                                <li>Select up to 2 each face effects & pose tips</li>
                                <li>Filter options - Black/White & Instant</li>
                                <li>Unlimited personalized photo templates (digital only)</li>
                                <li>200 personalized photo templates 2x6 prints</li>
                                <li>Live gallery with real-time photo access for guests</li>
                                <li>Instant sharing via Text/Email/QR Code</li>
                                <li>Social Sharing Station</li>
                                <li>Setup/Breakdown</li>
                                <li>On-site attendant</li>
                                <li>5 hours</li>
                            </ul>
                            <button class="carousel-package" data-few:="selectCarouselPackage"  data-package-type="luxe">Select package</button>
                        </div>

                    </div>
                </div>
                <img id="carousel-next" data-few:="nextCarousel" src="<?= $this->getIcon("chevron-right.svg") ?>" alt="Right icon">
            </div>
        </div>

        <div class="booking-item-2 page" id="page2">
            <form>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input 
                        type="text" 
                        id="firstName" 
                        name="firstName" 
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input 
                        type="text" 
                        id="lastName" 
                        name="lastName" 
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 
                        required
                    >
                </div>
            </form>
        </div>

        <div class="booking-item-3 page" id="page3">
            <form>
                <div class="form-group">
                    <label for="eventType">Event type</label>
                    <select id="eventType" name="eventType">
                        <option value="Wedding" selected>Wedding</option>
                        <option value="Birthday">Birthday</option>
                        <option value="Corporate">Corporate</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="eventDate">Event date</label>
                    <input type="date" id="eventDate" name="eventDate" >
                </div>

                <div class="form-group time-container">
                    <select name="hours" id="hours">
                        <option value="">Hour</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>

                    <select name="minutes" id="minutes">
                        <option value="">Minute</option>
                        <option value="00">00</option>
                        <option value="15">15</option>
                        <option value="30">30</option>
                        <option value="45">45</option>
                    </select>

                    <select name="period" id="period">
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="venueName">Venue name</label>
                    <input type="text" id="venueName" name="venueName" >
                </div>

                <div class="form-group">
                    <label for="venueAddress">Venue address</label>
                    <input type="text" id="venueAddress" name="venueAddress" >
                </div>
            </form>
        </div>

        <div class="booking-item-4 page" id="page4">
            <div class="field-group">
                <div class="field-label">Name</div>
                <div class="field-value-summary-name">Jane Doe</div>
            </div>

            <div class="field-group">
                <div class="field-label">Phone Number</div>
                <div class="field-value-summary-phone">980 555-5555</div>
            </div>

            <div class="field-group">
                <div class="field-label">Email</div>
                <div class="field-value-summary-email">janedoe@gmail.com</div>
            </div>

            <div class="field-group">
                <div class="field-label">Start</div>
                <div class="field-value-summary-start">20 July 2024 at 2pm</div>
            </div>

            <div class="field-group">
                <div class="field-label">Hours</div>
                <div class="field-value-summary-hours">4:00</div>
            </div>

            <div class="field-group">
                <div class="field-label">Package</div>
                <div class="field-value-summary-package">Basic</div>
            </div>

            <div class="field-group">
                <div class="field-label">Venue Name</div>
                <div class="field-value-summary-venue-name">Horton's</div>
            </div>

            <div class="field-group">
                <div class="field-label">Venue Address</div>
                <div class="field-value-summary-venue-address">123 Main st, Charlotte, NC 28278</div>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="terms" name="terms">
                <div>
                    <label for="summary-terms">I agree to terms and service</label>
                    <a href="#" class="learn-more-terms">Learn more</a>
                </div>
            </div>
        </div>

        <div class="booking-item-5 page" id="page5">

        </div>

        <div class="booking-navigation">
            <button type="button" class="back-button" data-few:="backBooking">Back</button>
            <button type="button" class="next-button" data-few:="nextBooking">Next</button>
        </div>

    </div>
</section>

<?= $this->partial("footer"); ?>