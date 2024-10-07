<?php include "00_header.php"; ?>

<?php // include "nav_address.php"; ?>

<?php
// Gestion de mensajes cortos
sms($sms);

if ($error) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>



5


<?php include "00_footer.php"; ?>


