<?php

require_once 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Sanitizing Email Input
  $email = strtolower(filter_var($_POST['email'], FILTER_SANITIZE_STRING));

  // Check Email Entry
  if (empty($email) || ctype_space($email)) {
    http_response_code(400);
    $response = [
      'status' => 'error',
      'message' => 'email address is mandatory.',
    ];
    echo json_encode($response);
    exit();
  }

  // Validating Email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    $response = [
      'status' => 'error',
      'message' => 'invalid email address.',
    ];
    echo json_encode($response);
    exit();
  }

  // Mailchimp Marketing API Instance
  $mailchimp = new \MailchimpMarketing\ApiClient();

  // API Key & Server Prefix
  $mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY', // Replace this with your API Key
    'server' => 'YOUR_SERVER_PREFIX' // Replace this with your Server Prefix
  ]);

  // Auidence List ID
  $list_id = 'YOUR_LIST_ID'; // Replace this with your List ID

  // subscriber_hash is the MD5 hash of the lowercase email
  $subscriber_hash = md5($email);

  try {
    $contact = $mailchimp->lists->setListMember($list_id, $subscriber_hash, [
      'email_address' => $email,
      'status' => 'subscribed',
    ]);

    if (is_object($contact) && $contact->email_address == $email) {
      http_response_code(200);
      $response = [
        'status' => 'success',
        'message' => 'Great! You are subscribed successfully.',
      ];
      echo json_encode($response);
      exit();
    }
  } catch (Exception $e) {
    http_response_code(400);
    $response = [
      'status' => 'error',
      'message' => 'Sorry! Please enter another email.',
    ];
    echo json_encode($response);
    exit();
  }
} else {
  http_response_code(403);
  echo 'Page access not allowed.';
  exit();
}