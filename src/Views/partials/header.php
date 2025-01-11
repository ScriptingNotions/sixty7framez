<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?= $this->pageTitle ? $this->pageTitle  . ' &ndash; ' . SITE_NAME : SITE_NAME; ?></title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="<?= $this->getStylesheet($this->pageFile); ?>" rel="stylesheet" id="main-css">
    <link href="<?= $this->getStylesheet("styles"); ?>" rel="stylesheet" id="main-css">
    <link href="<?= $this->getStylesheet("reset"); ?>" rel="stylesheet">
    <!-- <link href="<?= $this->getImage("favicon.ico"); ?>" rel="icon"> -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->getIcon("favicon_io/apple-touch-icon.png"); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->getIcon("favicon_io/favicon-32x32.png"); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->getIcon("favicon_io/favicon-16x16.png"); ?>">
    <!-- <link rel="manifest" href="/site.webmanifest"> -->
    
</head>
<body>
    <main id="root">
        <section id="main-content">