<?php include "00_header.php"; ?>


<?php // include "nav_address.php";  ?>
<?php
// Gestion de mensajes cortos
sms($sms);

if ($error) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>

<h1><?php _t("Waiting"); ?></h1>


<div class="panel panel-default">
    <div class="panel-body">
        ---
    </div>
</div>



<?php
if (!$error) {
    shop_registre_next(1);
}
?>


<?php include "00_footer.php"; ?>



