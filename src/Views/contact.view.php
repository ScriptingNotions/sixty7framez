<?= $this->partial("header"); ?>

<div class="contact-container">
    <section class="contact-section-1">
        <h2>Contact <span>.</span></h2>
        <p>Ready to make your event unforgettable? Reach out with questions or to book your photo booth experience. Fill out the form below, and we’ll be in touch soon!</p>
    </section>

    <section class="contact-section-2">
            <form action="#" id="contact-form">
                <fieldset>
                    <div class="form-group honeypot" style="display: none;">
                        <label for="contact-website">Leave this field blank</label>
                        <input type="text" id="contact-website" name="contact-website">
                    </div>

                    <div class="form-group">
                        <label for="contact-full-name">Full Name</label>
                        <input type="text" id="contact-full-name" name="contact-full-name" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-email">Email</label>
                        <input type="email" id="contact-email" name="contact-email" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-phone">Phone</label>
                        <input type="tel" id="contact-phone" name="contact-phone" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-phone">Message</label>
                        <textarea name="contact-message" id="contact-message"></textarea>
                    </div>
                    <div class="cf-turnstile" data-sitekey="3x00000000000000000000FF"></div>
                    <div class="button-group">
                        <button type="button" data-few="submitContactMsg">Send</button>
                    </div>
                </fieldset>
            </form>
        
    </section>

    <section class="contact-section-3">
        <div class="contact-details">
            <div class="paper-plane-container">
                <img src="<?= $this->getIcon("paper-plane-line.svg") ?>" alt="paper airplane icon">
            </div>
            <p>4833 Berewick Town Center Dr. Suite #191 Charlotte, NC 28278</p>
            <p><a href="mailto:info@sixty7framezphotobooths.com?subject=Inquiry">info@sixty7framezphotobooths.com</a></p>
            <p><a href="tel:704-619-8698">704-619-8698</a></p>
        </div>
    </section>
</div>


<?= $this->partial("footer"); ?>