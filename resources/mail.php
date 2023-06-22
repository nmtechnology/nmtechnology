<?php


/**
 * index.php
 *
 * This file handles secure mail transport using the Swiftmailer
 * library with Google reCAPTCHA integration.
 *
 * @author Patrick Leyba <pleyba4@cnm.edu>
 **/

// require all composer dependencies
require_once("vendor/autoload.php");

// require mail-config.php
require_once("mail-config.php");

use Mailgun\Mailgun;
use ReCaptcha\ReCaptcha;

// verify user's reCAPTCHA input
$recaptcha = new ReCaptcha($secret);
$resp = $recaptcha->verify($_POST["g-recaptcha-response"], $_SERVER["REMOTE_ADDR"]);

try {
    //if there's a reCAPTCHA error, throw an exception
    if(!$resp->isSuccess()) {
        throw(new Exception("reCAPTCHA error!"));
    }

    /**
     * Sanitize the inputs from the form: name, email, subject, and message.
     * This assumes jQuery (NOT Angular!) will be AJAX submitting the form,
     * so we're using the $_POST superglobal.
     **/

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    //$subject = filter_input(INPUT_POST, "subject", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);


    // create Swift message
    $swiftMessage = new Swift_Message();
    /**
     * Attach the sender to the message.
     * This takes the form of an associative array where $email is the key for the real name.
     **/
    $swiftMessage->setFrom([$email => $name]);
    /**
     * Attach the recipients to the message.
     * $MAIL_RECIPIENTS is set in mail-config.php
     **/
    $recipients = $MAIL_RECIPIENTS;
    $swiftMessage->setTo($recipients);
    // attach the subject line to the message
    $swiftMessage->setSubject("contact form was submitted");
    /**
     * Attach the actual message to the message.
     *
     * Here we set two versions of the message: the HTML formatted message and a
     * special filter_var()'d version of the message that generates a plain text
     * version of the HTML content.
     *
     * Notice one tactic used is to display the entire $confirmLink to plain text;
     * this lets users who aren't viewing HTML content in Emails still access your
     * links.
     **/
    $swiftMessage->setBody($message, "text/html");
    $swiftMessage->addPart(html_entity_decode($message), "text/plain");

    /**
     * Send the Email via the Mailgun API. The Mailgun API will handle the actual sending of the email.
     * Another option is to use smtp to have your server to send the email. This requires setting up an email server.
     * With containerized solutions it is easier to have a third party handle the actual  sending of email.
     *
     * The $mailgunApiKey and $mailgunDomain is set in mail-config.php
     */

    //Instantiate the mailgun api with your API credentials
    $mailgun = Mailgun::create($mailgunApiKey);

    //configure the mailgun object and send the email
    $mailgun->messages()->sendMime($mailgunDomain, $MAIL_RECIPIENT, $swiftMessage->toString(), []);


    // report a successful send!
    echo "<div class=\"alert alert-success\" role=\"alert\">Email successfully sent.</div>";

} catch(Exception $exception) {
    echo "<div class=\"alert alert-danger\" role=\"alert\"><strong>Oh snap!</strong> Unable to send email: " . $exception->getMessage() . " " . $exception->getFile() . "</div>";
}
