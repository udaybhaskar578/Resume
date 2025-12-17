<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use SparkPost\SparkPost;
use Symfony\Component\HttpClient\HttplugClient;

// Replace this with your own email address
$siteOwnersEmail = 'user@website.com';

if($_POST) {

   $name = trim(stripslashes($_POST['contactName']));
   $email = trim(stripslashes($_POST['contactEmail']));
   $subject = trim(stripslashes($_POST['contactSubject']));
   $contact_message = trim(stripslashes($_POST['contactMessage']));

   // Check Name
	if (strlen($name) < 2) {
		$error['name'] = "Please enter your name.";
	}
	// Check Email
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Please enter a valid email address.";
	}
	// Check Message
	if (strlen($contact_message) < 15) {
		$error['message'] = "Please enter your message. It should have at least 15 characters.";
	}
   // Subject
	if ($subject == '') { $subject = "Contact Form Submission"; }

   // Set Message
   $message = "Email from: " . $name . "<br />";
	$message .= "Email address: " . $email . "<br />";
   $message .= "Message: <br />";
   $message .= nl2br(htmlspecialchars($contact_message));
   $message .= "<br /> ----- <br /> This email was sent from your site's contact form. <br />";

   if (!$error) {
		try {
			// Use Symfony HTTP Client
			$httpClient = new HttplugClient();
			$sparky = new SparkPost($httpClient, ['key' => getenv('SPARKPOST_API_KEY')]);
			
			// Set async to false for synchronous requests
			$sparky->setOptions(['async' => false]);
			
			// Get sandbox domain from environment or use default
			$sandboxDomain = getenv('SPARKPOST_SANDBOX_DOMAIN') ?: 'sparkpostbox.com';
			
			$promise = $sparky->transmissions->post([
				'options' => [
					'sandbox' => true
				],
				'content' => [
					'from' => 'testing@' . $sandboxDomain,
					'subject' => $subject,
					'html' => $message,
					'reply_to' => $email
				],
				'recipients' => [
					[
						'address' => [
							'email' => $siteOwnersEmail
						]
					]
				]
			]);
			
			// Wait for the response
			$response = $promise->wait();
			
			if ($response->getStatusCode() == 200) {
				echo "OK";
			} else {
				echo "Something went wrong. Please try again.";
			}
		} catch (\Exception $e) {
			// For development, you might want to log the error
			// For production, just show a generic message
			echo "Something went wrong. Please try again.";
		}
	} else {
		$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
		
		echo $response;
	}
}

?>