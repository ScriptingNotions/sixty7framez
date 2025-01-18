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
            <div class="package-selection-container">
                <select name="package-selection" id="package-selection" placeholder="Select a package" value="<?= $this->package ?>">
                    <option value="standard-package">Standard</option>
                    <option value="memory-maker-package">Memory maker</option>
                    <option value="luxe-framez-package">Luxe framez</option>
                    <option value="deluxe-memory-package">Deluxe Memory</option>
                </select>
            </div>
            <div class="selected-package-container">
                <?= $this->renderView($this->component($this->package), []) ?> 
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
                        placeholder="Enter your first name"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input 
                        type="text" 
                        id="lastName" 
                        name="lastName" 
                        placeholder="Enter your last name"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Enter your email"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 
                        placeholder="Enter your phone number"
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
                    <input type="date" id="eventDate" name="eventDate" value="2025-01-08">
                </div>

                <div class="form-group">
                    <label for="venueName">Venue name</label>
                    <input type="text" id="venueName" name="venueName" value="Horton's">
                </div>

                <div class="form-group">
                    <label for="venueAddress">Venue address</label>
                    <input type="text" id="venueAddress" name="venueAddress" value="123 Main st, Charlotte, NC 28278">
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