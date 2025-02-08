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
                <img id="carosel-prev" data-few="prevCarousel" src="<?= $this->getIcon("chevron-left.svg") ?>" alt="Left icon">
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
                            <button class="carousel-package" data-few="selectPackage" data-package-type="standard" data-package-time="3">Select package</button>
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
                            <button class="carousel-package" data-few="selectPackage"  data-package-type="memory-maker" data-package-time="3">Select package</button>
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
                            <button class="carousel-package" data-few="selectPackage"  data-package-type="deluxe" data-package-time="4">Select package</button>
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
                            <button class="carousel-package" data-few="selectPackage"  data-package-type="luxe" data-package-time="5">Select package</button>
                        </div>

                    </div>
                </div>
                <img id="carousel-next" data-few="nextCarousel" src="<?= $this->getIcon("chevron-right.svg") ?>" alt="Right icon">
            </div>
            <div class="booking-navigation">
                <button type="button" class="next-button next-button-1" data-few="nextBooking">Next</button>
            </div>
        </div>

        <div class="booking-item-2 page" id="page2">
            <form class="customer-booking-form">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input 
                        type="text" 
                        id="firstName" 
                        name="firstName" 

                        value="<?= $this->firstName ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input 
                        type="text" 
                        id="lastName" 
                        name="lastName" 

                        value="<?= $this->lastName ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 

                        value="<?= $this->email ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 

                        value="<?= $this->phone ?>"
                        required
                    >
                </div>
            </form>
            <div class="booking-navigation">
                <button type="button" class="back-button back-button-2" data-few="backBooking">Back</button>
                <button type="button" class="next-button next-button-2" data-few="nextBooking">Next</button>
            </div>
        </div>

        <div class="booking-item-3 page" id="page3">
            <form class="event-booking-form">
                <div class="form-group">
                    <label for="eventType">Event type</label>
                    <select id="eventType" name="eventType">
                        <option value="">Select an event time</option>
                        <option value="Wedding" selected>Wedding</option>
                        <option value="Birthday">Birthday</option>
                        <option value="Corporate">Corporate</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div id="calendar" class="form-group calendar">

                    <div class="calendar-header">
                        <span id="prevMonth" data-direction="-1" data-few="changeMonth">←</span>
                        <h2 id="monthYear"></h2>
                        <span id="nextMonth" data-direction="1" data-few="changeMonth">→</span>
                        <span id="todayButton" data-few="goToToday">Today</span>
                    </div>

                    <div class="calendar-grid" id="calendarGrid"></div>
                    <div class="booking-date-error-msg"></div>
                    <div id="timeSelector" class="time-selector">
                        <select name="eventTime" id="time-select">
                            <option value="">Select a time</option>
                            <option value="07:00:00-<?= $this->isDST ? "04:00" : "05:00" ?>">7:00 AM</option>
                            <option value="07:30:00-<?= $this->isDST ? "04:00" : "05:00" ?>">7:30 AM</option>
                            <option value="08:00:00-<?= $this->isDST ? "04:00" : "05:00" ?>">8:00 AM</option>
                            <option value="08:30:00-<?= $this->isDST ? "04:00" : "05:00" ?>">8:30 AM</option>
                            <option value="09:00:00-<?= $this->isDST ? "04:00" : "05:00" ?>">9:00 AM</option>
                            <option value="09:30:00-<?= $this->isDST ? "04:00" : "05:00" ?>">9:30 AM</option>
                            <option value="10:00:00-<?= $this->isDST ? "04:00" : "05:00" ?>">10:00 AM</option>
                            <option value="10:30:00-<?= $this->isDST ? "04:00" : "05:00" ?>">10:30 AM</option>
                            <option value="11:00:00-<?= $this->isDST ? "04:00" : "05:00" ?>">11:00 AM</option>
                            <option value="11:30:00-<?= $this->isDST ? "04:00" : "05:00" ?>">11:30 AM</option>
                            <option value="12:00:00-<?= $this->isDST ? "04:00" : "05:00" ?>">12:00 PM</option>
                            <option value="12:30:00-<?= $this->isDST ? "04:00" : "05:00" ?>">12:30 PM</option>
                            <option value="13:00:00-<?= $this->isDST ? "04:00" : "05:00" ?>">1:00 PM</option>
                            <option value="13:30:00-<?= $this->isDST ? "04:00" : "05:00" ?>">1:30 PM</option>
                            <option value="14:00:00-<?= $this->isDST ? "04:00" : "05:00" ?>">2:00 PM</option>
                            <option value="14:30:00-<?= $this->isDST ? "04:00" : "05:00" ?>">2:30 PM</option>
                            <option value="15:00:00-<?= $this->isDST ? "04:00" : "05:00" ?>">3:00 PM</option>
                            <option value="15:30:00-<?= $this->isDST ? "04:00" : "05:00" ?>">3:30 PM</option>
                            <option value="16:00:00-<?= $this->isDST ? "04:00" : "05:00" ?>">4:00 PM</option>
                            <option value="16:30:00-<?= $this->isDST ? "04:00" : "05:00" ?>">4:30 PM</option>
                            <option value="17:00:00-<?= $this->isDST ? "04:00" : "05:00" ?>">5:00 PM</option>
                            <option value="17:30:00-<?= $this->isDST ? "04:00" : "05:00" ?>">5:30 PM</option>
                            <option value="18:00:00-<?= $this->isDST ? "04:00" : "05:00" ?>">6:00 PM</option>
                            <option value="18:30:00-<?= $this->isDST ? "04:00" : "05:00" ?>">6:30 PM</option>
                            <option value="19:00:00-<?= $this->isDST ? "04:00" : "05:00" ?>">7:00 PM</option>
                            <option value="19:30:00-<?= $this->isDST ? "04:00" : "05:00" ?>">7:30 PM</option>
                            <option value="20:00:00-<?= $this->isDST ? "04:00" : "05:00" ?>">8:00 PM</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="venueName">Venue name</label>
                    <input type="text" id="venueName" name="venueName" >
                </div>

                <div class="form-group">
                    <label for="venueAddress">Venue address</label>
                    <input type="text" id="venueAddress" name="venueAddress" >
                </div>

                <div class="form-group">
                    <label for="venueCity">Venue city</label>
                    <input type="text" id="venueCity" name="venueCity" >
                </div>

                <div class="form-group">
                    <label for="venueState">Venue state</label>
                    <select id="venueState" name="venueState">
                        <option value="">Select a state</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="venueZip">Venue zip</label>
                    <input type="text" id="venueZip" name="venueZip" >
                </div>
            </form>
            <div class="booking-navigation">
                <button type="button" class="back-button back-button-3" data-few="backBooking">Back</button>
                <button type="button" class="next-button next-button-3" data-few="nextBooking">Next</button>
            </div>
        </div>

        <div class="booking-item-4 page" id="page4">
            <div class="field-group">
                <div class="field-label">Name</div>
                <div class="field-value-summary-name"><?= $this->firstName . " " . $this->lastName ?></div>
            </div>

            <div class="field-group">
                <div class="field-label">Phone Number</div>
                <div class="field-value-summary-phone"><?= $this->phone ?></div>
            </div>

            <div class="field-group">
                <div class="field-label">Email</div>
                <div class="field-value-summary-email"><?= $this->email ?></div>
            </div>

            <div class="field-group">
                <div class="field-label">Start</div>
                <div class="field-value-summary-start"><?= $this->eventTime ?></div>
            </div>

            <div class="field-group">
                <div class="field-label">Hours</div>
                <div class="field-value-summary-hours"><?= $this->eventTime ?></div>
            </div>

            <div class="field-group">
                <div class="field-label">Package</div>
                <div class="field-value-summary-package"><?= $this->package ?></div>
            </div>

            <div class="field-group">
                <div class="field-label">Venue Name</div>
                <div class="field-value-summary-venue-name"><?= $this->venueName ?></div>
            </div>

            <div class="field-group">
                <div class="field-label">Venue Address</div>
                <div class="field-value-summary-venue-address"><?= $this->venueAddress ?></div>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="booking-terms" name="booking-terms">
                <div>
                    <label for="summary-terms">I agree to terms and service</label>
                    <a href="#" class="learn-more-terms">Learn more</a>
                </div>
            </div>
            <div class="booking-navigation">
                <button type="button" class="back-button back-button-4" data-few="backBooking">Back</button>
                <button type="button" class="next-button next-button-4" data-few="nextBooking">Next</button>
            </div>
        </div>

        <div class="booking-item-5 page" id="page5">

        <div id="checkout">
            <!-- Checkout will insert the payment form here -->
        </div>

            <div class="booking-navigation">
                <button type="button" class="back-button back-button-5" data-few="backBooking">Back</button>
            </div>
        </div>
    </div>
</section>

<?= $this->partial("footer"); ?>