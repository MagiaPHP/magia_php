<?php

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host = $config_mail_host;                    // Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
    $mail->Username = $config_mail_username;                     // SMTP username
    $mail->Password = $config_mail_password;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $mail->setFrom($config_company_email, $config_company_name);
    $mail->addAddress($reciver_email, "$reciver_name $reciver_lastname");     // Add a recipient
    //$mail->addAddress('rc@web.com') ;               // Name is optional
    $mail->addReplyTo($config_company_email, $config_company_name); // responder a 
    $mail->addBCC('test@web.com');
    //$mail->addBCC('bcc@example.com');
    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $email_Subject;
    $mail->Body = $email_Body;
    $mail->AltBody = $email_AltBody;
    $mail->MsgHTML($email_Body);

    $doc = $pdf->Output('file.pdf', 'S');
    $mail->AddStringAttachment($doc, "coello.pdf", 'base64', 'application/pdf');

    $mail->send();

    // header("location index.php?c=invoices&a=details&id=$id"); 
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}