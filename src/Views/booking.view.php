<?= $this->partial("header"); ?>

<?= $this->partial("nav"); ?>

<section class="booking-section-1">
    <h2>Booking <span>.</span></h2>
    <p>Ready to make your event unforgettable? Fill out the form below, and we’ll be in touch soon!</p>

    <div class="booking-progress-container">
        <div class="booking-progress-bar">
            <div class="booking-progress"></div>
        </div>

        <p class="booking-position">Booking position</p>
    </div>


    

    <div class="booking-questionaire-container">
        <?= $this->bookingContent; ?>
    </div>
</section>

<?= $this->partial("footer"); ?>