<nav>
<?= $this->pageTitle ?>
    <div class="nav-container">
        <a href="/">
            <img class="nav-logo" src="<?= $this->getImage("logo-small.svg") ?>" alt="brand logo">
        </a>
        <div class="menu-container">
            <span class="mobile-menu-button" data-few="toggleMobileMenu">Menu</span>
            
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