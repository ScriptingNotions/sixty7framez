<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?= $this->pageTitle ? $this->pageTitle  . ' &ndash; ' . SITE_NAME : SITE_NAME; ?></title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- <link href="<?= $this->getStylesheet($this->pageFile); ?>" rel="stylesheet" id="main-css"> -->
    <link href="<?= $this->getStylesheet("reset"); ?>" rel="stylesheet">
    <link href="<?= $this->getStylesheet("style"); ?>" rel="stylesheet" id="main-css">
    <!-- //<link href="<?= $this->getImage("favicon.ico"); ?>" rel="icon">  -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->getIcon("favicon_io/apple-touch-icon.png"); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->getIcon("favicon-32x32.png"); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->getIcon("favicon_io/favicon-16x16.png"); ?>">
    <!-- <link rel="manifest" href="/site.webmanifest"> -->
    
</head>
<body>
<noscript>You need to enable JavaScript to run this app.</noscript>
    <nav>
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
    <main id="root">
        <section  class="main-content">
