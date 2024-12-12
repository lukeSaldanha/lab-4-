<?php
/**
 * Privacy Policy Page
 *
 * This page displays the privacy policy to inform users about data handling and security practices.
 *
 * PHP version 7.1
 *
 * @author Luke Saldanha
 * @date 2024-12-10
 * @title Privacy Policy
 */

// Include the database connection file
include 'includes/db_connection.php';  // Use the correct path to the file

/*
   Privacy Policy Page
   This page displays the privacy policy to inform users about data handling and security practices.
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata for the Privacy Policy Page -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learn about how we protect your personal data and ensure privacy.">
    <meta name="keywords" content="privacy, data protection, user data, security, GDPR, CCPA">
    <meta name="author" content="Luke Saldanha">
    <title>Privacy Policy</title>
    <!-- Add additional styles or scripts here -->
</head>
<body>
<!-- Include the header -->
<?php require 'includes/header.php'; ?>

<!-- Main Content Area -->
<main class="container">
    <h1>Privacy Policy</h1>

    <!-- Privacy Policy Statement -->
    <section>
        <h2>Introduction</h2>
        <p>
            We value your privacy and are committed to protecting your personal data. This Privacy Policy outlines how we collect,
            use, and protect your personal information when you interact with our website and services.
        </p>
    </section>

    <section>
        <h2>Information We Collect</h2>
        <p>
            We collect the following types of personal information:
        <ul>
            <li><strong>Personal Identification Information:</strong> Such as your name, email address, and contact details.</li>
            <li><strong>Payment Information:</strong> Information required to process payments for services.</li>
            <li><strong>Browsing Information:</strong> Data related to your activity on our site, including IP addresses, cookies, and device information.</li>
        </ul>
        </p>
    </section>

    <section>
        <h2>How We Use Your Information</h2>
        <p>
            The information we collect is used for the following purposes:
        <ul>
            <li>To provide and improve our services.</li>
            <li>To communicate with you regarding your account, transactions, and updates.</li>
            <li>To send promotional materials or offers with your consent.</li>
        </ul>
        </p>
    </section>

    <section>
        <h2>Your Data Protection Rights</h2>
        <p>
            You have the following rights regarding your personal data:
        <ul>
            <li><strong>Right to Access:</strong> You can request access to the personal information we hold about you.</li>
            <li><strong>Right to Rectification:</strong> You can request that we correct any inaccuracies in your data.</li>
            <li><strong>Right to Deletion:</strong> You can request that we delete your data when it is no longer necessary for the purposes it was collected.</li>
            <li><strong>Right to Object:</strong> You can object to the processing of your data in certain circumstances.</li>
        </ul>
        </p>
    </section>

    <section>
        <h2>Security Measures</h2>
        <p>
            We implement appropriate technical and organizational measures to protect your personal data. These measures include encryption
            of sensitive data and secure storage methods. However, no method of data transmission or storage is 100% secure, and we cannot
            guarantee absolute security.
        </p>
    </section>

    <section>
        <h2>Cookies and Tracking Technologies</h2>
        <p>
            We use cookies and similar technologies to improve your experience on our website. These tools help us understand your preferences,
            enhance functionality, and analyze how our site is used. You can manage your cookie preferences through your browser settings.
        </p>
    </section>

    <section>
        <h2>Third-Party Sharing</h2>
        <p>
            We do not sell, trade, or otherwise transfer your personal information to outside parties, except when necessary to provide our
            services, or when required by law.
        </p>
    </section>

    <section>
        <h2>Contact Us</h2>
        <p>
            If you have any questions or concerns regarding this Privacy Policy or how we handle your personal data, please feel free to
            <a href="contact.php">contact us</a>. We are here to assist you.
        </p>
    </section>
</main>

<!-- Include the footer -->
<?php require 'includes/footer.php'; ?>
</body>
</html>
