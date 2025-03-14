<?= $this->partial("header"); ?>

    <!-- <nav>
        <div class="nav-container">
            <a href="/">
                <img class="nav-logo" src="<?= $this->getImage("logo-small.svg") ?>" alt="brand logo">
            </a>
            <div class="menu-container">
                <span class="mobile-menu-button" data-few="toggleMobileMenu">Menu</span>
                
                <div class="mobile-menu-container">
                    <ul>
                        <li><a href="/" class="menu-item <?= $this->pageTitle === "Home" ? "active-page" : "" ?>">Home</a></li>
                        <li><a href="/process" class="menu-item <?= $this->pageTitle === "The Process" ? "active-page" : "" ?>">The process</a></li>
                        <li><a href="/#packages" class="menu-item">Packages</a></li>
                        <li><a href="/about" class="menu-item <?= $this->pageTitle === "About" ? "active-page" : "" ?>">About</a></li>
                        <li><a href="/contact" class="menu-item <?= $this->pageTitle === "Contact" ? "active-page" : "" ?>">Contact</a></li>
                        
                        <li class="booking-nav-item"><a href="/booking">Book</a></li>
                    </ul>
                </div>

                <div class="tab-menu-container">
                    <ul>
                        <li><a href="/" class="menu-item <?= $this->pageTitle === "Home" ? "active-page" : "" ?>">Home</a></li>
                        <li><a href="/process" class="menu-item <?= $this->pageTitle === "The Process" ? "active-page" : "" ?>">The process</a></li>
                        <li><a href="/#packages" class="menu-item">Packages</a></li>
                        <li><a href="/about" class="menu-item <?= $this->pageTitle === "About" ? "active-page" : "" ?>">About</a></li>
                        <li><a href="/contact" class="menu-item <?= $this->pageTitle === "Contact" ? "active-page" : "" ?>">Contact</a></li>
                        
                        <li class="booking-nav-item"><a href="/booking">Book</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
-->
<section class="hero-section">
    <div class="hero-media-container">
        <!-- WebP video source -->
        <video class="hero-media" src="<?= $this->getImage("hero5.webm") ?>" type="video/webm"  autoplay loop muted></video>
        <!-- Fallback image for unsupported browsers -->
        <!-- <img src="/path-to-fallback-image.jpg" alt="Hero Image"> -->
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>An experience to remember</h1>
        <p>Elevate your event with a photo booth experience that's all about fun, style, and lasting memories.</p>
        <div class="button-container">
            <a href="/booking" class="hero-cta-button"><span>Book</span></a>
        </div>
    </div>
</section>

<div class="content">
    <section class="home-section-1 intro">
        <h2>Unforgettable Moments <span>.</span></h2>
        <p>
            Be it a wedding, a conference, a corporate event, a virtual meet-up, a brand launch, or a birthday celebration, we craft unforgettable moments.
        </p>
    </section>
    
    <section class="home-section-2 ">
        <h2>Features You'll Love <span>:</span></h2>
        <div class="features-list">
            <div class="feature-item">
                <div class="feature-details-container">
                    <img src="<?= $this->getIcon("camera-01.svg") ?>" alt="Camera icon">
                    <h4>High-Quality Camera</h4>
                </div>
                <p>Professional DSLR camera for stunning photos</p>
            </div>
            <div class="feature-item">
                <div class="feature-details-container">
                    <img src="<?= $this->getIcon("image-01.svg") ?>" alt="Image icon">
                    <h4>Digital Gallery</h4>
                </div>
                <p>Access your photos online instantly</p>
            </div>
            <div class="feature-item">
                <div class="feature-details-container">
                    <img src="<?= $this->getIcon("printer-01.svg") ?>" alt="Printer icon">
                    <h4>Instant Prints</h4>
                </div>
                <p>Get your photos printed in seconds</p>
            </div>
            <div class="feature-item">
                <div class="feature-details-container">
                    <img src="<?= $this->getIcon("cube-01.svg") ?>" alt="Cube icon">
                    <h4>Props Included</h4>
                </div>
                <p>Fun props and accessories provided</p>
            </div>
            <div class="feature-item">
                <div class="feature-details-container">
                    <img src="<?= $this->getIcon("users-01.svg") ?>" alt="Users icon">
                    <h4>Group Photos</h4>
                </div>
                <p>Spacious enough for 5- 8 people</p>
            </div>
            <div class="feature-item">
                <div class="feature-details-container">
                    <img src="<?= $this->getIcon("share-07.svg") ?>" alt="Share icon">
                    <h4>Social Sharing</h4>
                </div>
                <p>Share directly to social media</p>
            </div>
        </div>
    </section>

    <section class="home-section-3">
        <div class="open-air-booth">
            <h2>Our Open-Air Booth <span>.</span></h2>
            <img src="<?= $this->getImage("open-air.webp") ?>" alt="Group of women taking a photo in a photo booth">
            <p>Capture the fun with our Open-Air Photo Booth, the perfect addition to any event! Designed for flexibility and style, this booth creates high-quality photos with a sleek, modern setup that fits any venue. Unlike traditional enclosed booths, our open-air design allows for group shots, custom backdrops, and plenty of creative freedom. Guests can snap, pose, and instantly share their memories with digital and print options available. Whether it’s a wedding, corporate event, or birthday party, our Open-Air Photo Booth brings energy, engagement, and endless smiles to your celebration!</p>
        </div>
        <div class="booth-360">
            <h2>Our 360 Booth <span>.</span></h2>
            <img src="<?= $this->getImage("booth-1.webp") ?>" alt="Group of women taking a photo in a photo booth">
            <p>Step into the spotlight with our **360 Photo Booth**, the ultimate way to capture unforgettable moments! This immersive experience lets you and your guests stand on a platform while our rotating camera spins 360 degrees, creating stunning slow-motion, boomerang, or high-definition video clips. Perfect for weddings, corporate events, birthdays, and more, our booth adds a touch of glamour and excitement to any occasion. With instant social media sharing, and professional-quality results, our **360 Photo Booth** ensures your memories are captured in style. Get ready to strike a pose and make every moment a masterpiece!</p>
        </div>
    </section>

    <section id="packages" class="home-section-4 packages">
        <h2>Packages <span>:</span></h2>
        <div class="package-list">
            <div class="package-item standard">
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
                <div class="package-button-container">
                    <a href="/booking/package/standard" class="button-style">Start Booking</a>
                </div>
            </div>
            <div class="package-item memory-maker">
                <h3>Memory Maker</h3>
                <p>$550</p>
                <ul>
                    <li>Open-air booth and 360 booth</li>
                    <li>Choice of 1 standard backdrop</li>
                    <li>Customized Tap to Start screen</li>
                    <li>Photo/GIF/Boomerang</li>
                    <li>Fun props (hats, glasses, signs, etc.)</li>
                    <li>Unlimited photo sessions</li>
                    <li>Unlimited digital photos</li>
                    <li>50 personalized photo template 2x6 prints</li>
                    <li>Live gallery with real-time photo access for guests</li>
                    <li>Instant sharing via Text/Email/QR Code</li>
                    <li>On-site attendant</li>
                    <li>Setup/Breakdown</li>
                    <li>3 hours</li>
                </ul>
                <div class="package-button-container">
                    <a href="/booking/package/memory-maker" class="button-style">Start Booking</a>
                </div>
            </div>
            <div class="package-item deluxe">
                <h3>Deluxe</h3>
                <p>$750</p>
                <ul>
                    <li>Open-air booth and 360 booth</li>
                    <li>Choice of premium backdrop</li>
                    <li>Premium props</li>
                    <li>Customized Tap to Start screen and LED Ring</li>
                    <li>Photo/GIF/Boomerang</li>
                    <li>Select up to 2 face effects & pose tips</li>
                    <li>Unlimited personalized photo templates (digital only)</li>
                    <li>150 personalized photo templates 2x6 prints</li>
                    <li>Live gallery with real-time photo access for guests</li>
                    <li>Instant sharing via Text/Email/QR Code</li>
                    <li>Setup/Breakdown</li>
                    <li>On-site attendant</li>
                    <li>4 hours</li>
                </ul>
                <div class="package-button-container">
                    <a href="/booking/package/deluxe" class="button-style start-booking-button">Start Booking</a>
                </div>
            </div>
            <div class="package-item luxe">
                <h3>Luxe</h3>
                <p>$995</p>
                <ul>
                    <li>Open-air booth and 360 booth</li>
                    <li>Choice of premium backdrop</li>
                    <li>Custom prop set tailored to your event (theme options available)</li>
                    <li>Customized Tap to Start screen and LED Ring</li>
                    <li>Photo/GIF/Boomerang/Video</li>
                    <li>Select up to 2 each face effects & pose tips</li>
                    <li>Filter options - Black/White & Instant</li>
                    <li>Unlimited personalized photo templates (digital only)</li>
                    <li>Unlimited personalized photo templates 2x6 prints</li>
                    <li>Live gallery with real-time photo access for guests</li>
                    <li>Instant sharing via Text/Email/QR Code</li>
                    <li>Social Sharing Station</li>
                    <li>Setup/Breakdown</li>
                    <li>On-site attendant</li>
                    <li>5 hours</li>
                </ul>
                <div class="package-button-container">
                    <a href="/booking/package/luxe" class="button-style">Start Booking</a>
                </div>
            </div>
        </div>
    </section>

    <section class="home-section-5 start-booking">
        <div class="start-booking-container">
            <h2>Get started booking your next event</h2>
            <form action="/booking" method="POST" class="get-started-contact-form">
                <fieldset>
                    <div class="form-group">
                        <label for="home-first-name">First name</label>
                        <input type="text" id="home-first-name" name="firstName" required>
                    </div>

                    <div class="form-group">
                        <label for="home-last-name">Last name</label>
                        <input type="text" id="home-last-name" name="lastName" required>
                    </div>

                    <div class="form-group">
                        <label for="home-email">Email</label>
                        <input type="email" id="home-email" name="email"  required>
                    </div>
                    
                    <div class="form-group">
                        <label for="home-phone">Phone Number</label>
                        <input type="tel" id="home-phone" name="phone" required>
                    </div>

                    
                        
                    <div class="form-group">
                        <label for="company">Company name</label>
                        <input 
                            type="text" 
                            id="companyName" 
                            name="companyName" 

                            value=""
                        >
                    </div>

                    <div class="button-container">
                        <button type="button" data-few="startBookingContact">Start Booking</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </section>

    <section class="home-section-6 FAQ">
        <h2>FAQ <span>:</span></h2>
        <ul>
            <li>
                <h3>What types of photo booths do you offer?</h3>
                <p>We have a variety of photo booth options to suit different event styles and preferences. Our selection includes modern open air photo booths that are interactive with touch screen technology.  Our 360-degree photo booths offer a unique twist to your event. Each type of booth comes with a range of backdrops and props to choose from, ensuring a fun personalized experience for your guests.</p>
                <div class="faq-toggle-container" data-few="toggleFAQ">+</div>
            </li>
            <li>
                <h3>How does the rental process work?</h3>
                <p>Renting a photo booth is easy! Simply visit our website to browse our photo booth options and select the one that best fits your event. You can book directly online or give us a call to discuss your needs. We will ask for details about your event, such as the date, location, and duration of rental. A deposit is required to secure your booking, with the balance due before the event. We handle the delivery, setup, and removal of the booth, so everything is ready to go when your event starts.</p>
                <div class="faq-toggle-container" data-few="toggleFAQ">+</div>
            </li>
            <li>
                <h3>How much space do we need?</h3>
                <p>While venue specifics can vary, we generally recommend allocating a 10' x 10' area for each booth to ensure optimal setup and operation.</p>
                <div class="faq-toggle-container" data-few="toggleFAQ">+</div>
            </li>
            <li>
                <h3>Can I customize the photos?</h3>
                <p>Absolutely! We offer a variety of customization options to make your photo booth experience truly unique. You can choose from a selection of templates for your photos or work with our design team to create custom graphics that match your event’s theme. Customization can include text, logos, and colors. Additionally, our booths can be equipped with a selection of filters, and digital props, and some models offer green screen technology for virtually limitless backdrop possibilities. Every guest can share pictures by text, email, or QR code. In addition, a custom live gallery can be viewed and downloaded in real time with every guest’s photo.</p>
                <div class="faq-toggle-container" data-few="toggleFAQ">+</div>
            </li>
            <li>
                <h3>Do you provide services outside of Charlotte?</h3>
                <p>We offer a 35 mile complimentary delivery zone for all of our clients. Let us know if your event location is outside the Charlotte perimeter and we will calculate your mileage fee for you.</p>
                <div class="faq-toggle-container" data-few="toggleFAQ">+</div>
            </li>
        </ul>
    </section>
</div>
<?= $this->partial("footer"); ?>
