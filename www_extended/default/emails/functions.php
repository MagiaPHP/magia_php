<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//require 'vendor/autoload.php';

function emails_send_email($id) {



    $email = emails_details($id);
    //SENDER
    $sender['id'] = $email["sender_id"];
    $sender['name'] = contacts_formated_name(contacts_field_id('name', $email["sender_id"]));
    $sender['lastname'] = contacts_formated_name(contacts_field_id('lastname', $email["sender_id"]));
    $sender['email'] = directory_by_contact_name($email["sender_id"], 'Email');
    //Reciver
    $reciver['id'] = $email["reciver_id"];
    $reciver['name'] = contacts_formated_name(contacts_field_id('name', $email["reciver_id"]));
    $reciver['lastname'] = contacts_formated_name(contacts_field_id('lastname', $email["reciver_id"]));
    $reciver['email'] = directory_by_contact_name($email["reciver_id"], 'Email');

    // EMAIL
    $subjet = $email["subjet"];
    $message = $email["message"];
    $message_no_html = $message;

    //
//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'mail.factux.be';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'info@factux.be';                     //SMTP username
        $mail->Password = '9+#DT~YG-v=K';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom($sender['email'], $sender['name'] . ' ' . $sender['lastname']);
        $mail->addAddress($reciver['email'], $reciver['name'] . ' ' . $reciver['lastname']);     //Add a recipient
//        $mail->addAddress('cloud@factux.be');               //Name is optional
        $mail->addReplyTo($sender['email'], $sender['name'] . ' ' . $sender['lastname']);
//        $mail->addCC('cc@example.com');
//        $mail->addBCC('bcc@example.com');
        //Attachments
//        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subjet;
//        $mail->Body = 'This is the HTML message body <b>in bold!</b>';
//        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//        
        $mail->Body = $message;
        $mail->AltBody = $message_no_html;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    //
    //
    //
    //
    //
}

// SEARCH
function emails_search_by_folder_reciver($folder, $reciver_id, $start = 0, $limit = 999) {
    global $db;

    $query = $db->prepare("SELECT * FROM emails ");

//    $query = $db->prepare("SELECT * FROM emails WHERE folder = :folder AND reciver_id= :reciver_id  ORDER BY id DESC LIMIT :start, :limit ");
//    $query->bindValue(':folder', $folder, PDO::PARAM_STR);
//    $query->bindValue(':reciver_id', $reciver_id, PDO::PARAM_INT);
//
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function emails_search_by_sender($sender_id, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare("SELECT * FROM emails WHERE sender_id= :sender_id AND father_id IS NULL ORDER BY id DESC LIMIT :start, :limit ");

    $query->bindValue(':sender_id', (int) $sender_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function emails_search_by_u_id($u_id, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare("SELECT * FROM emails WHERE reciver_id= :reciver_id  ORDER BY id DESC LIMIT :start, :limit ");

//    $query->bindValue(':folder', $folder, PDO::PARAM_STR);
    $query->bindValue(':reciver_id', (int) $u_id, PDO::PARAM_INT);

    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function emails_search_by_sender_or_reciver($u_id, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare("SELECT * FROM emails WHERE sender_id = :u_id OR reciver_id= :u_id ORDER BY id DESC LIMIT :start, :limit ");

//    $query->bindValue(':folder', $folder, PDO::PARAM_STR);
    $query->bindValue(':u_id', (int) $u_id, PDO::PARAM_INT);

    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function emails_search_by_reciver($u_id, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare("SELECT * FROM emails WHERE reciver_id = :u_id AND father_id IS NULL ORDER BY id DESC LIMIT :start, :limit ");

    $query->bindValue(':u_id', (int) $u_id, PDO::PARAM_INT);

    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function emails_total_messages_not_read_by_contact_id($u_id) {
    return 12;
}

// folders globals
// SEARCH
function emails_folders_globals($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `folder`,  `icon`,  `order_by`,  `status`    FROM `emails_folders` 
    WHERE `contact_id` IS NULL 
    ORDER BY folder
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':field', "field", PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
