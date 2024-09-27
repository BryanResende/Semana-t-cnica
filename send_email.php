<?php
  // Configuration
  $to = 'bryanresende2020@gmail.com'; // recipient email address
  $subject = 'Contact Form Submission'; // email subject

  // Get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject_form = $_POST['subject'];
  $message = $_POST['body'];

  // Validate the form data
  if (empty($name) || empty($email) || empty($message)) {
    echo 'Please fill in all fields.';
    exit;
  }

  // Sanitize the form data
  $name = filter_var($name, FILTER_SANITIZE_STRING);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $subject_form = filter_var($subject_form, FILTER_SANITIZE_STRING);
  $message = filter_var($message, FILTER_SANITIZE_STRING);

  // Create the email body
  $body = "Name: $name\nEmail: $email\nSubject: $subject_form\nMessage: $message";

  // Send the email
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  if (mail($to, $subject, $body, $headers)) {
    echo 'Email sent successfully!';
  } else {
    echo 'Error sending email.';
  }
