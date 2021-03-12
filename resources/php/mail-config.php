<?php
/**
 * mail-config.php
 * This file contains your reCAPTCHA API keys and your recipient's email addresses.
 *
 * @param string $siteKey your public reCAPTCHA API key
 * @param string $secret your secret reCAPTCHA API key
 * @param string $mailgunDomain your mailgun private api key.
 * @param string $mailgunApiKey your mailgun domain relay.
 * @param array $MAIL_RECIPIENTS array of email addresses and corresponding recipient names to send form responses to
 *
 * @author PatrickL NMTechnology
 *
 * This file contains sensitive information and should ALWAYS be gitignored!
 **/

//mailgun API Key authorization

$mailgunApiKey = "ab0fb83d81e279f5233b2695de4ed67c-3d0809fb-8a8f00a2";
$mailgunDomain = "sandboxea7d25e830b44c7b8902ab8e1e9f8fb9.mailgun.org";


// your Google reCAPTCHA keys here
// your Google reCAPTCHA keys here
$siteKey = '6LeQOiUaAAAAAKFMZr3FD88EEbGVABvgw4pMYUny';
$secret = '6LeQOiUaAAAAADNjbvmfVLDycIOfJeI0YclmlFkG';

/**
 * attach the recipients to the message
 * notice this an array that can include or omit the the recipient's real name
 * use the recipients' real name where possible; this reduces the probability of the Email being marked as spam
 **/
$MAIL_RECIPIENTS = [ "patrick@nmtis.com" => "Patrick"];
$MAIL_RECIPIENT = ["patrick@nmtis.com"];
