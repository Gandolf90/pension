<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'info@privat-pension-schwarzach.de';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $book_a_table = new PHP_Email_Form;
  $book_a_table->ajax = true;
  
  $book_a_table->to = $receiving_email_address;
  $book_a_table->from_name = $_POST['vorname'];
  $book_a_table->from_email = $_POST['email'];
  $book_a_table->subject = "Neue Reservierung für ihre Pension";

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $book_a_table->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $book_a_table->add_message( $_POST['vorname'], 'Vorname');
  $book_a_table->add_message( $_POST['nachname'], 'Nachname');
  $book_a_table->add_message( $_POST['email'], 'Email');
  $book_a_table->add_message( $_POST['telefon'], 'Phone');
  $book_a_table->add_message( $_POST['anreise'], 'Anreise', 4);
  $book_a_table->add_message( $_POST['abreise'], 'Abreise', 4);
  $book_a_table->add_message( $_POST['personen'], 'personen', 1);
  $book_a_table->add_message( $_POST['zimmer'], 'Zimmer');
  $book_a_table->add_message( $_POST['nachricht'], 'Nachricht');

  echo $book_a_table->send();
?>
