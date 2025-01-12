<?= $this->partial("header"); ?>
<nav>
    <img src="<?= $this->getImage("logo-small.png") ?>" alt="brand logo">
    <div>
        <span>Menu</span>
    </div>
</nav>

<section class="hero-section">
    <img src="<?= $this->getImage("") ?>" alt="Group enjoying a photo booth experience">
    <div class="hero-content">
        <h1>An experience to remember</h1>
        <p>Elevate your event with a photo booth experience that's all about fun, style, and lasting memories.</p>
        <a href="/booking" class="hero-cta-button">Book Now</a>
    </div>
</section>

<section class="home-section-1 intro">
    <h2>Unforgettable Moments.</h2>
    <p>
        Be it a wedding, a conference, a corporate event, a virtual meet-up, a brand launch, or a birthday celebration, we craft unforgettable, immersive moments.
    </p>
</section>
  
<section class="home-section-2 features-list">
    <h2>Features You'll Love:</h2>
    <ul>
      <li class="feature-item">
        <h4>High-Quality Camera</h4>
        <p>Professional DSLR camera for stunning photos</p>
      </li>
      <li class="feature-item">
        <h4>Digital Gallery</h4>
        <p>Access your photos online instantly</p>
      </li>
      <li class="feature-item">
        <h4>Instant Prints</h4>
        <p>Get your photos printed in seconds</p>
      </li>
      <li class="feature-item">
        <h4>Props Included</h4>
        <p>Fun props and accessories provided</p>
      </li>
      <li class="feature-item">
        <h4>Group Photos</h4>
        <p>Spacious booth fits up to 10 people</p>
      </li>
      <li class="feature-item">
        <h4>Social Sharing</h4>
        <p>Share directly to social media</p>
      </li>
    </ul>
</section>

<section class="home-section-3 open-air-booth">
    <h2>Our Open-Air Booth.</h2>
    <img src="" alt="">
    <p>Capture the crowd with our open-air booth! This setup allows for larger group photos and works well in any setting. Equipped with custom backdrops and a full selection of props, it’s a hit for parties, corporate events, and festivals.</p>
</section>

<section class="home-section-4 packages">
    <h2>Packages:</h2>
    <div class="package-list">
        <div class="package-item">
            <h3>Basic</h3>
            <p>2 hours of service</p>
            <p>Unlimited prints</p>
            <p>Online gallery</p>
            <p>Props included</p>
            <p>Custom backdrop</p>
            <p>Price: $300</p>
        </div>
        <div class="package-item">
            <h3>Standard</h3>
            <p>3 hours of service</p>
            <p>Unlimited prints</p>
            <p>Online gallery</p>
            <p>Props included</p>
            <p>Custom backdrop</p>
            <p>Price: $400</p>
        </div>
        <div class="package-item">
            <h3>Premium</h3>
            <p>4 hours of service</p>
            <p>Unlimited prints</p>
            <p>Online gallery</p>
            <p>Props included</p>
            <p>Custom backdrop</p>
            <p>Price: $500</p>
        </div>
    </div>
</section>

<section class="home-section-5 start-booking">
    <h2>Get started booking your next event</h2>
    <form action="#" class="get-started-contact-form">
        <fieldset>
            <div class="form-group">
                <label for="full-name">Full Name</label>
                <input type="text" id="full-name" name="full-name" placeholder="Enter your full name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>
            
            <button type="button">Start Booking</button>
        </fieldset>
    </form>
</section>

<section class="home-section-6 FAQ">
    <ul>
        <li>
            <h3>What types of photo booths do you offer?</h3>
            <p>We have a variety of photo booth options to suit different event styles and preferences. Our selection includes modern open air photo booths that are interactive with touch screen technology.  Our 360-degree photo booths offer a unique twist to your event. Each type of booth comes with a range of backdrops and props to choose from, ensuring a fun personalized experience for your guests.</p>
            <img src="" alt="expand icon">
        </li>
        <li>
            <h3>How does the rental process work?</h3>
            <p>Renting a photo booth is easy! Simply visit our website to browse our photo booth options and select the one that best fits your event. You can book directly online or give us a call to discuss your needs. We will ask for details about your event, such as the date, location, and duration of rental. A deposit is required to secure your booking, with the balance due before the event. We handle the delivery, setup, and removal of the booth, so everything is ready to go when your event starts.</p>
        </li>
        <li>
            <h3>How much space do we need?</h3>
            <p>While venue specifics can vary, we generally recommend allocating a 10' x 10' area for each booth to ensure optimal setup and operation.</p>
        </li>
        <li>
            <h3>Can I customize the photos?</h3>
            <p>Absolutely! We offer a variety of customization options to make your photo booth experience truly unique. You can choose from a selection of templates for your photos or work with our design team to create custom graphics that match your event’s theme. Customization can include text, logos, and colors. Additionally, our booths can be equipped with a selection of filters, and digital props, and some models offer green screen technology for virtually limitless backdrop possibilities. Every guest can share pictures by text, email, or QR code. In addition, a custom live gallery can be viewed and downloaded in real time with every guest’s photo.</p>
        </li>
        <li>
            <h3>Do you provide services outside of Charlotte?</h3>
            <p>We offer a 35 mile complimentary delivery zone for all of our clients. Let us know if your event location is outside the Charlotte perimeter and we will calculate your mileage fee for you.</p>
        </li>
    </ul>
</section>

<?= $this->partial("footer"); ?>
