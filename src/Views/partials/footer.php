        
        </section>
        <footer>
            <div class="footer-content">
                <div class="footer-content-1">
                    <img src="<?= $this->getImage("logo-small.svg") ?>" alt="brand logo">
                </div >
                <div class="footer-content-2">
                    <ul>
                        <li><a href="https://www.facebook.com/people/Sixty7-Framez-Photo-Booth-Events/61565025722424/"><img src="<?= $this->getIcon("facebook-fill.svg") ?>" alt="facebook icon"></a></li>
                        <li><a href="https://www.instagram.com/sixty7framez_pb/"><img src="<?= $this->getIcon("instagram-line.svg") ?>" alt="instagram icon"></a></li>
                    </ul>
                </div>
                <div class="footer-content-3">
                    <p>&copy; <?= date("Y") ?> Sixty7Framez Photo Booth Events. All rights reserved.</p>
                </div>
            </div>
        </footer>

    </main>
    <script>
        const _$ = document.querySelector.bind(document);
        const _$$ = document.querySelectorAll.bind(document);
    </script>
    <script
        src="https://challenges.cloudflare.com/turnstile/v0/api.js?onload=onloadTurnstileCallback"
        defer
        ></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="<?= $this->getScript("app"); ?>" type="module"></script>
</body>
</html>