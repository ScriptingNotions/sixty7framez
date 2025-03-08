<?= $this->partial("header"); ?>

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
        <div class="booking-item-1 booking-item page active" id="page1">
            <div class="package-list">
                <div class="package-item <?= $this->package === "standard" ? "active-package" : "" ?>" data-package="<?= $this->package ?>">
                    <h4>Standard</h4>
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
                    <div class="package-button-container">
                        <a class="booking-package-button button-style" data-few="selectPackage" data-package-type="standard" data-package-time="3">Select package</a>
                    </div>
                </div>

                <div class="package-item <?= $this->package === "memory-maker" ? "active-package" : "" ?>" data-package="<?= $this->package ?>">
                    <h4>Memory Maker</h4>
                    <p>$550</p>
                    <ul>
                        <li>Open-air booth and 360 booth</li>
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
                    <div class="package-button-container">
                        <a class="booking-package-button button-style" data-few="selectPackage"  data-package-type="memory-maker" data-package-time="3">Select package</a>
                    </div>
                </div>

                <div class="package-item <?= $this->package === "deluxe" ? "active-package" : "" ?>" data-package="<?= $this->package ?>">
                    <h4>Deluxe</h4>
                    <p>$750</p>
                    <ul>
                        <li>Open-air booth and 360 booth</li>
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
                    <div class="package-button-container">
                        <a class="booking-package-button button-style" data-few="selectPackage"  data-package-type="deluxe" data-package-time="4">Select package</a>
                    </div>
                </div>

                <div class="package-item <?= $this->package === "luxe" ? "active-package" : "" ?>" data-package="<?= $this->package ?>">
                    <h4>Luxe</h4>
                    <p>$1,100</p>
                    <ul>
                        <li>Open-air booth and 360 booth</li>
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
                    <div class="package-button-container">
                        <a class="booking-package-button button-style" data-few="selectPackage"  data-package-type="luxe" data-package-time="5">Select package</a>
                    </div>
                </div>
            </div>
            <div class="booking-navigation">
                <button type="button" class="next-button next-button-1" data-few="nextBooking">Next</button>
            </div>
        </div>

        <div class="booking-item-2 booking-item page" id="page2">
            <form class="customer-booking-form">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input 
                        type="text" 
                        id="firstName" 
                        name="firstName" 

                        value="<?= isset($this->bookingDetails["firstName"]) ? $this->bookingDetails["firstName"] : "" ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input 
                        type="text" 
                        id="lastName" 
                        name="lastName" 

                        value="<?= isset($this->bookingDetails["lastName"]) ? $this->bookingDetails["lastName"] : "" ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 

                        value="<?= isset($this->bookingDetails["email"]) ? $this->bookingDetails["email"] : "" ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 

                        value="<?= isset($this->bookingDetails["phone"]) ? $this->bookingDetails["phone"] : "" ?>"
                        required
                    >
                </div>

                
                <div class="form-group">
                    <label for="company">Company name</label>
                    <input 
                        type="text" 
                        id="companyName" 
                        name="companyName" 

                        value="<?= isset($this->bookingDetails["companyName"]) ? $this->bookingDetails["companyName"] : "" ?>"
                        required
                    >
                </div>
            </form>
            <div class="booking-navigation">
                <button type="button" class="back-button back-button-2" data-few="backBooking">Back</button>
                <button type="button" class="next-button next-button-2" data-few="nextBooking">Next</button>
            </div>
        </div>

        <div class="booking-item-3 booking-item page" id="page3">
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

                <div class="form-group eventTypeOther" style="display: none;">
                    <label for="eventTypeOther">Other</label>
                    <input name="eventTypeOther" id="eventTypeOther"></input>
                </div>

                <div id="calendar" class="form-group calendar">

                    <div class="calendar-header">
                        <span id="prevMonth"><img src="<?= $this->getIcon("chevron-left.svg") ?>" data-direction="-1" data-few="changeMonth" alt="arrow right icon"></span>
                        <h2 id="monthYear"></h2>
                        <span id="nextMonth"><img src="<?= $this->getIcon("chevron-right.svg") ?>"  data-direction="1" data-few="changeMonth" alt="arrow right icon"></span>
                        <span id="todayButton" data-few="goToToday">Today</span>
                    </div>

                    <div class="days-of-week"></div>
                    <div class="calendar-grid" id="calendarGrid"></div>
                    <div class="booking-date-error-msg"></div>
                    <div id="timeSelector" class="time-selector">
                        <select name="eventTime" id="time-select">
                            <option value="">Select a time</option>
                            <option value="07:00:00">7:00 AM</option>
                            <option value="07:30:00">7:30 AM</option>
                            <option value="08:00:00">8:00 AM</option>
                            <option value="08:30:00">8:30 AM</option>
                            <option value="09:00:00">9:00 AM</option>
                            <option value="09:30:00">9:30 AM</option>
                            <option value="10:00:00">10:00 AM</option>
                            <option value="10:30:00">10:30 AM</option>
                            <option value="11:00:00">11:00 AM</option>
                            <option value="11:30:00">11:30 AM</option>
                            <option value="12:00:00">12:00 PM</option>
                            <option value="12:30:00">12:30 PM</option>
                            <option value="13:00:00">1:00 PM</option>
                            <option value="13:30:00">1:30 PM</option>
                            <option value="14:00:00">2:00 PM</option>
                            <option value="14:30:00">2:30 PM</option>
                            <option value="15:00:00">3:00 PM</option>
                            <option value="15:30:00">3:30 PM</option>
                            <option value="16:00:00">4:00 PM</option>
                            <option value="16:30:00">4:30 PM</option>
                            <option value="17:00:00">5:00 PM</option>
                            <option value="17:30:00">5:30 PM</option>
                            <option value="18:00:00">6:00 PM</option>
                            <option value="18:30:00">6:30 PM</option>
                            <option value="19:00:00">7:00 PM</option>
                            <!-- <option value="19:30:00">7:30 PM</option>
                            <option value="20:00:00">8:00 PM</option> -->
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="venueName">Venue name</label>
                    <input type="text" id="venueName" name="venueName" required>
                </div>

                <div class="form-group">
                    <label for="venuePhone">Venue phone</label>
                    <input type="text" id="venuePhone" name="venuePhone" required>
                </div>

                <div class="form-group">
                    <label for="venueEmail">Venue email</label>
                    <input type="text" id="venueEmail" name="venueEmail" required>
                </div>

                <div class="form-group">
                    <label for="venueContact">Venue contact person</label>
                    <input type="text" id="venueContact" name="venueContact" required>
                </div>

                <div class="form-group">
                    <label for="venueAddress">Venue address</label>
                    <input type="text" id="venueAddress" name="venueAddress" required>
                </div>

                <div class="form-group">
                    <label for="venueCity">Venue city</label>
                    <input type="text" id="venueCity" name="venueCity" required>
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

        <div class="booking-item-4 booking-item page" id="page4">
            <div class="contract-container">

                <div class="service-contract">
                    <h2>SIXTY7 FRAMEZ PHOTO BOOTHS - SERVICE CONTRACT</h2>
                    <p>The following contract and its terms will set forth an agreement between Sixty7 Framez Photo Booths (Provider) and <span id="client-name"></span> (Client) the parties, for photo booth services and their event outline in the deposit. This written contract sets forth the full, written intention of both parties and supersedes all other written and/or oral agreements between the parties.</p>
                </div>

                <div class="terms-container">
                    <h1>TERMS & CONDITIONS</h1>
                    
                    <div class="section">
                        <h4>SERVICE PERIOD</h4>
                        <p>The Service Period will be from <strong><span class="contract-event-time-start"></span></strong> - <strong><span class="contract-event-time-end"></span></strong>: on <strong><span class="contract-date"></span></strong>. Provider agrees to have a Sixty7 Framez Photo Booth operational for a minimum of 80% during this period; occasionally, operations may need to be interrupted for maintenance of the Photo Booth or by the clients request.</p>
                    </div>
                    
                    <div class="section">
                        <h4>PAYMENT</h4>
                        <p>A non-refundable reservation fee in the amount of 50% of the total cost is due upon signing of this contract. The remaining amount is due 15 days in advance of Client's Event.</p>
                        <br>
                        <p>If the client uses the equipment for a time period in excess of the service period agreed to in the invoice below, the overage in rental time will be billed to the client at the following rates: $125 per hour.</p>
                        <br>
                        <p>Payment for any overage in time must be paid before additional hours are provided. Client agrees that in addition to any and all other legal rights and remedies Provider may have, Client will pay a $50.00 fee for any and all returned payments which Client may write to Provider as payment for any service by Provider or rental of Provider's equipment.</p>
                    </div>
                    
                    <div class="section">
                        <h4>ACCESS, SPACE & POWER FOR PHOTO BOOTH</h4>
                        <p>The Client shall provide Sixty7 Framez Photo Booths with safe and appropriate working conditions and a solid floor. The Client will arrange an appropriate 8′ x 8′ space and a minimum of 7.5′ of ceiling clearance for the Photo Booth at the event's venue. Client is responsible for providing power for the Photo Booth (110V, 10 amps, 3 prong outlet). Note: Power Adapter provided by Sixty7 Framez Photo Booth will be added as an ad-on service. Any delay in the performance or damage to the photo booth equipment due to improper power is the responsibility of the client.</p>
                    </div>
                    
                    <div class="section">
                        <h4>DATE CHANGES & CANCELLATIONS</h4>
                        <p>Any request for a date change must be made in writing at least thirty days in advance of the original event date. Change is subject to photo booth availability and receipt of a new Service Contract. If there is no availability for the alternate date, the non-refundable reservation fee shall be forfeited and event cancelled. If event is cancelled for any reason, the non-refundable reservation fee is forfeited.</p>
                    </div>
                    
                    <div class="section">
                        <h4>VENUE LOCATION CHANGES</h4>
                        <p>Any request for a venue location change must be made in writing at least 10 days in advance of the original event date. No travel fees for venues within 35 miles of our location. The provider will charge .45 per additional mile as measured by Google Maps driving directions from.</p>
                    </div>
                    
                    <hr>
                    
                    
                    <div class="section">
                        <h4>INDEMNIFICATION</h4>
                        <p>Client agrees to, and understands the following:</p>
                        <br>
                        <p class="indent">a) Client will indemnify provider against any and all liability related to Client's Event during or after Client's event. Client will indemnify Provider from the time of service and on into the future, against any liability associated with Client.</p>
                        <br>
                        <p class="indent">b) Client will indemnify Provider against any and all liability associated with the use of pictures taken within the Sixty7 Framez Photo Booth its representatives, employees or affiliates at Client's event.</p>
                    </div>
                    
                    <div class="section">
                        <h4>MODEL/MEDIA USAGE RELEASE OPTION</h4>
                        <p>Client agrees to, and understands the following: All guests using Sixty7 Framez Photo Booths hereby give the right and permission to copyright and use, photographic portraits, video, images, or pictures captured by Sixty7 Framez Photo Booth of any photo booth user who may be included intact or in part, made through any and all media now or hereafter known for illustration, art, promotion, advertising, trade, or any other purpose. In addition the client, hereby release, discharge and agree to save harmless Sixty7 Framez Photo Booths, from any liability, that may occur or be produced in the taking of said picture or in any subsequent processing thereof, as well as any publication thereof, including without limitation any claims for libel or invasion of privacy. If you do not agree circle no: NO</p>
                    </div>
                    
                    <div class="section">
                        <h4>MISCELLANEOUS TERMS</h4>
                        <p>If any provision of these terms shall be unlawful, void, or for any reason unenforceable under Contract Law, then that provision, or portion thereof, shall be deemed separate from the rest of this contract and shall not affect the validity and enforceability of any remaining provisions, or portions thereof. This is the entire agreement between Provider and Client relating to Sixty7 Framez Photo Booths herein and shall not be modified except in writing, signed by both parties. In the event of a conflict between parties, Client agrees to solve any arguments via arbitration. In the event Provider is unable to supply a working photo booth for at least 80% of the Service Period, Client shall be refunded a prorated amount based on the amount of service received.</p>
                        <br>
                        <p>If the printer fails to print out photos on site the Provider will be allowed to give a web site to the client where there guests can log onto and order prints free of charge with free shipping as well as the ability to download the digital files for their own use. If for reasons beyond our control the local distributor becomes sick or cannot perform we will ship the booth with instructions directly to the end user so they can set it up at their event and double the rental time period free of charge. If no service is received, Provider's maximum liability will be the return of all payments received from Client. Provider is not responsible for any consequential damages or lost opportunities upon breach of this agreement.</p>
                    </div>
                    
                    <div class="section">
                        <h4>DAMAGE TO PROVIDER'S EQUIPMENT</h4>
                        <p>Client acknowledges that the client shall be responsible for any damage or loss to the Provider's Equipment caused by: a) Any misuse of the Provider's Equipment by Client or its guests, or b) Any theft or disaster (including but not limited to fire, flood or earthquake).</p>
                    </div>
                    
                    <hr>
                    
                    <div class="section client-duties">
                        <h4>SUMMARY OF CLIENT DUTIES:</h4>
                        <div class="during-booking-container">
                            <p><strong>During booking:</strong></p>
                            <ol>
                                <li>Sign the contract.</li>
                                <li>Send the deposit via your preferred method immediately after signing the contract if applicable.</li>
                                <li>Fill out the photo template form at least 3 weeks before the event: http://www.radphotobooth.ca/photo-template/</li>
                            </ol>
                        </div>

                        <div class="weeks-before-container">
                            <p><strong>Two weeks before the event to avoid delays:</strong></p>
                            <ol start="4">
                                <li>Prepare the payment for the balance.</li>
                                <li>Arrange an appropriate 8′ x 8′ space with an outlet at least 10ft away, and a minimum of 7.5′ of ceiling clearance. Please notify the provider if any tables 6ft long will be provided for the Photo Booth at the event's venue.</li>
                            </ol>
                        </div>

                        
                        <p>Your event is NOT booked until the contract is signed and the deposit is received. Reservations are made on on a "first come, first served" basis.</p>
                            
                    </div>

                    <hr>

                    <div class="booking-details">
                        <h4>Client Information</h4>
                        <table>
                            <tr><td>Name</td><td id="contract-client-name"></td></tr>
                            <tr><td>Company</td><td id="contract-client-company"></td></tr>
                            <!-- <tr><td>Address</td><td id="contract-client-address"></td></tr> -->
                            <!-- <tr><td>City, State, Zip</td><td id="contract-client-city-state-zip"></td></tr> -->
                            <tr><td>Type of Event</td><td id="contract-client-event-type"></td></tr>
                            <tr><td>Package type</td><td id="contract-client-package-type"></td></tr>
                            <tr><td>Event date</td><td id="contract-client-event-date"></td></tr>
                            <tr><td>Event time</td><td id="contract-client-event-time"></td></tr>
                            <tr><td>Phone number</td><td id="contract-client-phone"></td></tr>
                            <tr><td>Email address</td><td id="contract-client-email"></td></tr>
                        </table>
                        
                        <h4>Venue Information</h4>
                        <table>
                            <tr><td>Name</td ><td id="contract-venue-name"></td></tr>
                            <tr><td>Address</td><td id="contract-venue-address"></td></tr>
                            <tr><td>Contact Person</td><td id="contract-venue-contact-person"></td></tr>
                            <tr><td>Email</td><td id="contract-venue-email"></td></tr>
                            <tr><td>Phone</td><td id="contract-venue-phone"></td></tr>
                        </table>

                    </div>

                    
                    <div class="section">
                        <p><strong>PROVIDER’S STANDARD PRICE LIST:</strong> The charges in this Agreement are based on the Provider’s Standard Price
                            List. This price list is adjusted periodically and future orders shall be charged at the prices in effect at the time
                            when the order is placed</p>
                        <br>
                        <p>By executing this contract as the Client, the individual signing, whether in a personal capacity or as an agent or representative, represents and warrants that they are at least twenty-five (25) years of age. Furthermore, if signing as an agent or representative, the signer affirms that they possess the authority to enter into this agreement on behalf of the entity they represent. Should they lack such authority, the signer personally assumes full responsibility and liability under the terms of this contract.</p>
                    </div>
                </div>
                </div>

                <div class="accept-contract-input">
                    <div class="form-group">
                        <label for="contract-signature">Full name</label>
                        <input 
                            type="text" 
                            id="contract-signature" 
                            name="contractSignature" 
                            required
                        >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            type="email" 
                            id="contract-email" 
                            name="contractEmail" 
                            required
                        >
                    </div>
                </div>
                <div class="checkbox-group contract-checkbox-group">
                    <input type="checkbox" id="booking-terms" name="booking-terms">
                    <div>
                        <span for="summary-terms">I have read and agree to the terms of this contract.</span>
                    </div>
                </div>

                <div class="booking-navigation">
                    <button type="button" class="back-button back-button-4" data-few="backBooking">Back</button>
                    <button type="button" class="next-button next-button-4" data-few="nextBooking">Next</button>
                </div>
            </div>

            <div class="booking-item-5 booking-item page" id="page5">

            <div id="checkout">
                <!-- Checkout will insert the payment form here -->
            </div>

        </div>
    </div>
</section>

<?= $this->partial("footer"); ?>
